<?php
use common\components\helpers\HYii as Y;
use settings\components\helpers\HSettings;

class ShopController extends Controller
{
	/**
	 * (non-PHPdoc)
	 * @see AdminController::filters()
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(), array(
			array('DModuleFilter', 'name'=>'shop'),
		));
	}
	
    public function actionIndex()
    {
        $settings = \Yii::app()->settings->get('ShopSettings');

    	$this->seoTags(array(
			'meta_h1' => $settings['meta_h1'] ? : $this->getHomeTitle(),
			'meta_title' => $settings['meta_title'] ? : $this->getHomeTitle(),
			'meta_key' => $settings['meta_key'],
			'meta_desc' => $settings['meta_desc'],
		));
        
        $dataProvider=Product::model()
        	->onShopIndex()
        	->visibled()
        	->cardColumns()
        	->scopeSort('shop_category')
        	->getDataProvider([], ['pageSize' => 15, 'pageVar'=>'p']);
        
       	$this->breadcrumbs->add($this->getHomeTitle());
        $this->render('shop', compact('dataProvider', 'settings'));
    }

    public function actionCategory($id)
    {
        $category = $this->loadModel('Category', $id);
        
        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Product']))
        	$model->attributes=$_GET['Product'];
        
        if(\Yii::app()->request->isAjaxRequest) {
        	$this->renderPartial('_products_listview', compact('model', 'category'), false, true);
        }
        else {
        	$brand=null;
        	if($brandId=Y::request()->getQuery('brand_id')) {
        		$brand=Brand::model()->actived()->previewColumns()->findByPk($brandId);
        	}

        	$this->prepareSeo($category->title);
	        $this->seoTags($category);
	        ContentDecorator::decorate($category, 'description');

	        $this->breadcrumbs->add($this->getHomeTitle(), '/shop');
	        $this->breadcrumbs->addByNestedSet($category, '/shop/category');
	        $this->breadcrumbs->add($category->title);
	        
	        $this->render('category', compact('model', 'category', 'brand') );
        }
    }

    /**
     * Action show a product page
     *
     * @param $id
     */
    public function actionProduct($id)
    {
        $product = Product::model()->visibled()->findByPk($id);

        $this->prepareSeo($product->meta_title?:$product->title);
        $this->seoTags($product);

        if (!$product)
            throw new CHttpException(404, Yii::t('shop','product_not_found'));

        $this->breadcrumbs->add($this->getHomeTitle(), '/shop');

        $category=null;
        if($categoryId=\Yii::app()->request->getParam('category_id')) {
        	$category=Category::model()->findByPk($categoryId);
        }
        if(!$category) {
        	$category=$product->category;
        }
        $this->breadcrumbs->addByNestedSet($category, '/shop/category');
        $this->breadcrumbs->add($category->title, array('/shop/category', 'id'=>$category->id));
        $this->breadcrumbs->add($product->title);
        
        $this->render('product', compact('product'));
    }
    
    public function getHomeTitle()
    {
    	return D::cms('shop_title',Yii::t('shop','shop_title'));
    }
}
