<?php 
/** @var boolean $modeRelatedHidden режим без отображения привязанных товаров */
/**
 * @var $model AdviceCategory
 */

\Yii::app()->getModule('common');  

$this->pageTitle = D::cms('shop_title').' / Категория '. $model->title . ' - '. $this->appName; 
$breadcrumbs[] = $model->title;
$this->breadcrumbs = $breadcrumbs;
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->renderPartial('_categories', compact('categories', 'model')); ?>

<?php $this->renderPartial('_products', array('products'=>$products, 'category'=>$model, 'modeRelatedHidden'=>$modeRelatedHidden)); ?>