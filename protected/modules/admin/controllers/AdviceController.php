<?php
use YiiHelper as Y;
use AttributeHelper as A;

class AdviceController extends AdminController
{
    public function actionIndex()
    {
        $categories = $this->getCategories();
        $products   = Advice::model()->findAll();
        $this->render('index', compact('categories', 'products'));
    }

    /**
     * @param null $parent
     * @return mixed
     */
    private function getCategories($parent = null)
    {
        if ($parent) {
            $category = AdviceCategory::model()->findByPk($parent);
            return $category->children()->findAll();
        }

        return AdviceCategory::model()->roots()->findAll([
            'order'=>'ordering',
        ]);
    }

    public function actionCategoryCreate($parent_id = null)
    {
        $model = new AdviceCategory();

        if (isset($_POST['AdviceCategory'])) {
            $model->attributes = $_POST['AdviceCategory'];

            if ($parent_id) {
                $parent = AdviceCategory::model()->findByPk($parent_id);
                $model->appendTo($parent);
            } else {
                $model->saveNode();
            }

            if(isset($_POST['saveout'])) {
                Y::setFlash(Y::FLASH_SYSTEM_SUCCESS, Yii::t('AdminModule.shop', 'success.categoryCreatedWithName', ['{name}'=>$model->title]));
                $this->redirect(['category', 'id'=>$model->id]);
            } else {
                $this->redirect(['categoryUpdate', 'id'=>$model->id]);
            }
        }

        $this->render('categorycreate', compact('model'));
    }

    public function actionCategoryUpdate($id)
    {
        $model = $this->loadCategory($id);

        if (isset($_POST['AdviceCategory'])) {
            $model->attributes = $_POST['AdviceCategory'];

            if ($model->saveNode()) {
                if(isset($_POST['saveout'])) {
                    Y::setFlash(Y::FLASH_SYSTEM_SUCCESS, Yii::t('AdminModule.shop', 'success.categoryUpdatedWithName', ['{name}'=>$model->title]));
                    $this->redirect(['category', 'id'=>$model->id]);
                }
                $this->refresh();
            }
        }

        $this->render('categoryupdate', compact('model'));
    }

    public function actionCategory($id)
    {
        // @var boolean $modeRelatedHidden режим без отображения привязанных товаров
        $modeRelatedHidden=(bool)\Yii::app()->request->getQuery('hide_related', A::get($_COOKIE, 'adm_sw_hide_rel_prods', false));
        setcookie('adm_sw_hide_rel_prods', $modeRelatedHidden ? 1 : 0, 0, '/');

        $categories = $this->getCategories($id);
        $breadcrumbs = $this->getBreadcrumbs($id);

        $model = $this->loadCategory($id);

        if(!$model)
            throw new CHttpException(404, "Not found");

        $categoryIDs=[];
        $descendantsLevel=(int)D::cms('shop_category_descendants_level');
        if(!$modeRelatedHidden && $descendantsLevel) {
            $descendants=$model->descendants($descendantsLevel)->findAll(['index'=>'id', 'select'=>'id']);
            if($descendants)
                $categoryIDs=array_keys($descendants);
        }
        $categoryIDs[]=$model->id;

        $c = new CDbCriteria;
        $c->addInCondition('`t`.`category_id`', $categoryIDs, 'OR');

        $products = Advice::model()->findAll($c);

        $this->render('category', compact('model', 'categories', 'breadcrumbs', 'id', 'products', 'modeRelatedHidden'));
    }

    public function actionCategoryDelete($id)
    {
        $model = $this->loadCategory($id);
        $model->deleteNode();

        $this->redirect(array('advice/index'));
    }

    public function actionCategoryTotalDelete($id)
    {
        if(!$_GET['hash'] || (md5($id) !== $_GET['hash'])) {
            $this->redirect(array('advice/category', 'id'=>$id));
        }
        $category = $this->loadCategory($id);
        $descendants=$category->descendants()->findAll(['index'=>'id']);

        $categoryIDs=[];
        if($descendants) {
            $categoryIDs=array_keys($descendants);
        }
        $categoryIDs[]=$category->id;

        $criteria=new CDbCriteria;
        $criteria->addInCondition('`category_id`', $categoryIDs);

        $products=Advice::model()->findAll($criteria);
        if($products) {
            foreach($products as $product)
                $product->delete();
        }
        $category->deleteNode();

        $this->redirect(array('advice/index'));
    }

    public function actionCategorySort()
    {
        if(Yii::app()->request->isAjaxRequest) {
            $data=json_decode(Yii::app()->request->getPost('data', json_encode(array())));
            if(is_array($data)) {
                $cases=array('ordering'=>'', 'root'=>'','lft'=>'','rgt'=>'','level'=>'');
                foreach($data as $item) {
                    array_walk($cases, function(&$expression,$attribute) use ($item) {
                        $expression.=' WHEN '.(int)$item->id.' THEN '.(int)$item->$attribute;
                    });
                }
                array_walk($cases, function(&$expression,$attribute) {
                    $expression="`t`.`{$attribute}`=CASE `t`.`id` {$expression} ELSE `t`.`{$attribute}` END";
                });

                $query='UPDATE `'.AdviceCategory::model()->tableName().'` as `t` SET '.implode(',',$cases);
                AdviceCategory::model()->getDbConnection()
                    ->createCommand($query)
                    ->execute();
                echo CJSON::encode(array('success'=>true));
            }
            else {
                echo CJSON::encode(array('success'=>false));
            }
            Yii::app()->end();
            die();
        }

        $this->pageTitle = D::cms('shop_title').' / Сортировка категорий';

        $this->render('category_sort');
    }

    public function actionProductCreate($category_id = null)
    {
        $last = Advice::model()->lastRecord()->find();
        $model = new Advice();

        if (isset($_POST['Advice'])) {
            $model->attributes = $_POST['Advice'];

            if ($model->save()) {

                if(isset($_POST['saveout'])) {
                    Y::setFlash(Y::FLASH_SYSTEM_SUCCESS, Yii::t('AdminModule.shop', 'success.productCreatedWithName', ['{name}'=>$model->title]));
                    $this->redirect(['category', 'id'=>$model->category_id]);
                }
                else {
                    $this->redirect(['productUpdate', 'id'=>$model->id]);
                }
            }
        }

        if ($category_id)
            $model->category_id = $category_id;
        else{
            if(count($last)>0)
                $model->category_id = $last->category_id;
        }

        $fixAttributes = array();

        $this->render('productcreate', compact('model', 'fixAttributes'));
    }

    public function actionProductUpdate($id, $price = null, $save = false)
    {
        $model = $this->loadProduct((int)$id);

        if($save) {
            $model->price = $price;
            $model->save(false);
            Yii::app()->end();
        }

        if (isset($_POST['Advice'])) {
            $model->attributes = $_POST['Advice'];
            if ($model->save()) {
                if(isset($_POST['saveout'])) {
                    Y::setFlash(Y::FLASH_SYSTEM_SUCCESS, Yii::t('AdminModule.shop', 'success.productUpdatedWithName', ['{name}'=>$model->title]));
                    $this->redirect(['category', 'id'=>$model->category_id]);
                }
            }
        }

        $this->render('productupdate', compact('model'));
    }

    public function actionProductDelete($id)
    {
        $model = $this->loadProduct($id);
        $categoryId=$model->category_id;
        $model->delete();

        $this->redirect(array('advice/category', 'id'=>$categoryId));
    }

    private function loadProduct($id)
    {
        $model = Advice::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'Продукт не найден');
        return $model;
    }

    public function getBreadcrumbs($id, $add_current = false)
    {
        $category = AdviceCategory::model()->findByPk((int)$id);

        $result = array();
        $result['Советы'] = array('advice/index');

        if($category){
            $parents = $category->ancestors()->findAll();

            foreach($parents as $p) {
                $result[$p->title] = array('advice/category', 'id'=>$p->id);
            }
            if($add_current){
                $result[$category->title] = array('advice/category', 'id'=>$category->id);
            }
        }

        return $result;
    }

    private function loadCategory($id)
    {
        $model = AdviceCategory::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'Категория не найдена');
        return $model;
    }
}