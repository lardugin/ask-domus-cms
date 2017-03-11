<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'downloadFile'=>[
				'class'=>'\common\ext\file\actions\DownloadFileAction',
				'allowDirs'=>['files']
			]
		);
	}

    public function actionSitemap() {
        $title = 'Карта сайта';

        $this->prepareSeo($title);
        $this->breadcrumbs->add($title);

        $this->render('sitemap');
    }

	public function actionIndex()
	{
        $this->layout = 'index';

        $menuItem = CmsMenu::getInstance()->getDefault();

        if (!$menuItem)
            throw new CHttpException('404', 'Не найдена страница по умолчанию');

        if ($menuItem->options['model'] == 'page') {
            $page = Page::model()->findByPk($menuItem->options['id']);

            if (!$page)
                throw new CHttpException('404', 'Не найдена главная страница');

            $this->prepareSeo();
            $this->seoTags($page);
            ContentDecorator::decorate($page);

            $view=$page->view_template ?: 'page';
            $this->render($view, compact('page'));
        } elseif ($menuItem->options['model']=='shop') {
            $this->forward('shop/index');
        } elseif ($menuItem->options['model']=='event') {
            if (isset($menuItem->options['id'])) {
                $_GET['id'] = $menuItem->options['id'];
                $this->forward('site/event');
            } else
                $this->forward('site/events');
        } elseif ($menuItem->options['model']=='blog') {
            $_GET['id'] = $menuItem->options['id'];
            $this->forward('site/blog');
        } else {
            throw new CHttpException(404, 'Страница не определена');
        }
	}

    public function actionPage($id)
    {
        $this->layout = 'other';

        $page = Page::model()->findByPk($id);

        if (!$page) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($page->title);
        $this->seoTags($page);
        ContentDecorator::decorate($page);

        if($page->blog_id) {
        	$this->breadcrumbs->addByCmsMenu($page->blog);
        	$this->breadcrumbs->add($page->title);
        } else {
        	$this->breadcrumbs->addByCmsMenu($page, array(), true);
        }

        $view=$page->view_template ?: 'page';
        
        $this->render($view, compact('page'));
    }

    public function actionEvent($id)
    {
        $this->layout = 'other';

        $event = Event::model()->findByPk($id);

        if (!$event) {
            throw new CHttpException('404', Yii::t('events','event_not_found'));
        }

        $this->prepareSeo($event->title);
        ContentDecorator::decorate($event);
        
        $this->breadcrumbs->add($this->getEventHomeTitle(), '/novosti');
        $this->breadcrumbs->add($event->title);
        
        $this->render('event', compact('event'));
    }

    public function actionEvents()
    {
        $this->layout = 'other';

        $criteria = new CDbCriteria();
        $criteria->condition = 'publish = 1';
        $criteria->order     = 'created DESC';

        if ($year = Yii::app()->request->getQuery('year')) {
            $criteria->addCondition('YEAR(created) = ' . (int) $year);
        }

        $count = Event::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $events = Event::model()->findAll($criteria);

        $this->prepareSeo($this->getEventHomeTitle());

        foreach($events as $e) {
            ContentDecorator::decorate($e);
        }
        
        if ($year) {
            $this->breadcrumbs->add('Новости', ['site/events']);
            $this->breadcrumbs->add($year);
        } else {
            $this->breadcrumbs->add($this->getEventHomeTitle());
        }

        $this->render('events', compact('events', 'pages'));
    }

    public function actionBlog($id)
    {
        $this->layout = 'other';

        $blog = Blog::model()->findByPk($id);

        if (!$blog) {
            throw new CHttpException('404', Yii::t('blog','blog_not_found'));
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'blog_id = ?';
        $criteria->order     = 'created DESC';
        $criteria->params[]  = $id;

        $count = Page::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = Yii::app()->params['posts_limit'] ? Yii::app()->params['posts_limit'] : 7;
        $pages->applyLimit($criteria);

        $posts = Page::model()->findAll($criteria);

        $this->prepareSeo($blog->title);
        
        $this->breadcrumbs->addByCmsMenu($blog, array(), true);
        
        $this->render('blog', compact('blog', 'posts', 'pages'));
    }

    public function actionService($id)
    {
        $this->layout = 'other';

        $service = Service::model()->findByPk($id);

        if (!$service) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($service->title);
        $this->seoTags($service);
        ContentDecorator::decorate($service, 'description');

        $this->breadcrumbs->add('Услуги', ['/uslugi'], true);
        $this->breadcrumbs->add($service->title, array(), true);

        $this->render('service', [
            'model' => $service
        ]);
    }
    
    public function getEventHomeTitle()
    {
    	return D::cms('events_title', Yii::t('events','events_title'));
    }

    public function actionImportNews()
    {
        /*
        [0] => IE_XML_ID
        [1] => IE_NAME
        [2] => IE_ID
        [3] => IE_ACTIVE
        [4] => IE_ACTIVE_FROM
        [5] => IE_ACTIVE_TO
        [6] => IE_PREVIEW_PICTURE
        [7] => IE_PREVIEW_TEXT
        [8] => IE_PREVIEW_TEXT_TYPE
        [9] => IE_DETAIL_PICTURE
        [10] => IE_DETAIL_TEXT
        [11] => IE_DETAIL_TEXT_TYPE
        [12] => IE_CODE
        [13] => IE_SORT
        [14] => IE_TAGS
        [15] => IC_GROUP0
        [16] => IC_GROUP1
        [17] => IC_GROUP2
        */
        $file = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/export_file_526078.csv';

        if (($handle = fopen($file, "r")) !== false) {
            $i = 0;

            while (($row = fgetcsv($handle, 10000, ";")) !== false) {
                continue;

                if (!$i++) {
                    continue;
                }

                $created = implode('-', array_reverse(explode('.', $row[4])));

                $event = new Event();
                $event->title   = $row[1];
                $event->publish = $row[3] == 'Y' ? 1 : 0;
                $event->created = $created;
                $event->intro   = $row[7];
                $event->text    = $row[10];
                $event->alias   = $row[12];

                if ($row[6]) {
                    $event->enable_preview = 1;

                    $extension = array_pop(explode('.', $row[6]));

                    $filename = uniqid() . '.' . $extension;

                    copy('http://ask-domus.ru' . $row[6], $_SERVER['DOCUMENT_ROOT'] . '/images/event/' . $filename);

                    $event->preview = $filename;
                }

                if (!$event->save()) {
                    print_r($event->getErrors());
                    echo '<hr>';
                }
            }
        }

        fclose($handle);
    }

    public function actionAdviceImages()
    {
        die;
        ini_set('max_execution_time', 900);

        $advices = Advice::model()->findAll('id >= 100');

        foreach ($advices as $advice) {
            preg_match_all('/<img[^>]+>/i', $advice->description, $imgTags);

            $origImageSrc = [];

            for ($i = 0; $i < count($imgTags[0]); $i++) {
                preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);

                $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
            }

            foreach ($origImageSrc as $src) {
                $folderList = explode('/', $src);

                $newSrc = $this->str2url($src, false);

                unset($folderList[0]);
                array_pop($folderList);

                $currentFolder = $_SERVER['DOCUMENT_ROOT'];

                foreach ($folderList as $folder) {
                    $currentFolder = $currentFolder . '/' . $folder;

                    if (!is_dir($currentFolder)) {
                        mkdir($currentFolder);
                    }
                }

                @copy('http://ask-domus.ru' . $src, $_SERVER['DOCUMENT_ROOT'] . $newSrc);

                $advice->description = str_replace($src, $newSrc, $advice->description);
            }

            if ($origImageSrc) {
                $advice->save();
            }
        }
    }

    public function actionImportSovety()
    {
        /*
        [0] => IE_XML_ID
        [1] => IE_NAME
        [2] => IE_ID
        [3] => IE_ACTIVE
        [4] => IE_ACTIVE_FROM
        [5] => IE_ACTIVE_TO
        [6] => IE_PREVIEW_PICTURE
        [7] => IE_PREVIEW_TEXT
        [8] => IE_PREVIEW_TEXT_TYPE
        [9] => IE_DETAIL_PICTURE
        [10] => IE_DETAIL_TEXT
        [11] => IE_DETAIL_TEXT_TYPE
        [12] => IE_CODE
        [13] => IE_SORT
        [14] => IE_TAGS
        [15] => IP_PROP114
        [16] => IP_PROP115
        [17] => IP_PROP113
        [18] => IP_PROP118
        [19] => IP_PROP119
        [20] => IP_PROP120
        [21] => IP_PROP150
        [22] => IC_GROUP0
        [23] => IC_GROUP1
        [24] => IC_GROUP2
        */

        $file = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/export_file_901383.csv';

        if (($handle = fopen($file, "r")) !== false) {
            $i = 0;

            while (($row = fgetcsv($handle, 10000, ";")) !== false) {
                continue;

                if (!$i++) {
                    continue;
                }

                if (!$row[22]) {
                    continue;
                }

                $categoryID = $this->findAdviceCategory([$row[22], $row[23], $row[24]]);

                if (!$categoryID) {
                    print_r($row[1]);
                    echo '<hr>';
                    continue;
                }

                $advice = new Advice();

                $advice->title          = $row[1];
                $advice->alias          = $row[12];
                $advice->description    = $row[10];
                $advice->category_id    = $categoryID;

                $advice->meta_title     = $row[17];
                $advice->meta_key       = $row[16];
                $advice->meta_desc      = $row[15];

                if (!$advice->save()) {
                    $advice->alias .= '-' . substr(uniqid(), 3);

                    if (!$advice->save()) {
                        print_r($advice->title);
                        echo '<hr>';
                        print_r($advice->getErrors());
                    }
                }
            }
        }

        fclose($handle);
    }

    protected function findAdviceCategory($categories)
    {
        $category_id = false;
        $root = false;
        $level = 1;

        foreach ($categories as $key => $currentCategory) {
            if ($currentCategory) {
                $criteria = new CDbCriteria();

                $criteria->condition = 'title = :title AND level = ' . $level;

                $criteria->params = [
                    ':title' => $currentCategory,
                ];

                if ($category_id && $root) {
                    $criteria->addCondition('root = ' . $root);
                }

                $category = AdviceCategory::model()->find($criteria);

                if (!$category) {
                    $category = new AdviceCategory();
                    $category->title = $currentCategory;
                    $category->alias = $this->str2url($category->title);

                    if ($category_id) {
                        $parent = AdviceCategory::model()->findByPk($category_id);

                        if (!$category->appendTo($parent)) {
                            $category->alias = $this->str2url($category->title . '-' . substr(uniqid(), 3));

                            if (!$category->appendTo($parent)) {
                                return false;
                            }
                        }
                    } else {
                        if (!$category->saveNode()) {
                            $category->alias = $this->str2url($category->title . '-' . substr(uniqid(), 3));
                            $category->saveNode();

                            if (!$category->saveNode()) {
                                return false;
                            }
                        }
                    }
                }

                $category_id = $category->id;

                if ($level == 1) {
                    $root = $category_id;
                }

                $level++;
            }
        }

        return $category_id;
    }

    /**
     * @param $string string
     * @return string
     */
    protected function toWindows1251($string)
    {
        return iconv('UTF-8', 'WINDOWS-1251//TRANSLIT', $string);
    }

    /**
     * @param $string string
     * @return string
     */
    protected function toUTF8($string)
    {
        return iconv('WINDOWS-1251', 'UTF-8//IGNORE', $string);
    }

    protected function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            ' ' => '-',
        );
        return strtr($string, $converter);
    }

    protected function str2url($str, $replace = true) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        if ($replace) {
            $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        }
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }
}
