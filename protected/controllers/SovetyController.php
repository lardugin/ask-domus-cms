<?php

class SovetyController extends Controller
{
    public $layout = 'other';

    public function actionIndex()
    {
        $id = 15;

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

        $this->render('index', [
            'page' => $page,
        ]);
    }

    public function actionCategory($id)
    {
        $model = AdviceCategory::model()->findByPk($id);

        if (!$model) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($model->title);
        $this->seoTags($model);
        ContentDecorator::decorate($model, 'description');

        $this->breadcrumbs->add('Советы', '/sovety');
        $this->breadcrumbs->addByNestedSet($model, '/sovety/category');
        $this->breadcrumbs->add($model->title);

        $this->render('category', [
            'model' => $model,
        ]);
    }

    public function actionAdvice($id)
    {
        $this->layout = 'other';

        $model = Advice::model()->findByPk($id);

        if (!$model) {
            throw new CHttpException('404', 'Страница не найдена');
        }

        $this->prepareSeo($model->title);
        $this->seoTags($model);
        ContentDecorator::decorate($model, 'description');

        $category = $model->category;

        $this->breadcrumbs->add('Советы', '/sovety');
        $this->breadcrumbs->addByNestedSet($category, '/sovety/category');
        $this->breadcrumbs->add($model->title, array('/sovety/category', 'id' => $category->id));
        $this->breadcrumbs->add($model->title);

        $this->render('advice', [
            'model' => $model,
        ]);
    }
}
