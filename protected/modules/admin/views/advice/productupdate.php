<?php $this->pageTitle = 'Редактирование совета - '. $this->appName; ?>

<h1>Редактирование совета</h1>

<?php echo $this->renderPartial('form_product_general', compact('model')); ?>


<?php Yii::app()->clientscript->registerScriptFile($this->module->assetsUrl.'/js/admin_shop.js'); ?>
