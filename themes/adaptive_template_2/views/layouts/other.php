<?php
/**
 * @var $content string
 */
?>

<?php $this->beginContent('//layouts/main'); ?>

    <div class="content-box">
        <section class="container">
            <div id="page-inner-content">
                <?php $this->widget('\ext\D\breadcrumbs\widgets\Breadcrumbs', array('breadcrumbs' => $this->breadcrumbs->get())); ?>

                <?= $content ?>
            </div>
        </section>
    </div>

<?php $this->endContent(); ?>
