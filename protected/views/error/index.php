<? 
/** @var int $code код ошибки */ 
?>
<div class="content-box">
    <section class="container">
        <h1><?=\Yii::t('error', 'error')?> <?=$code?></h1>

        <p><?=\Yii::t('error', "error.{$code}")?></p>
    </section>
</div>
