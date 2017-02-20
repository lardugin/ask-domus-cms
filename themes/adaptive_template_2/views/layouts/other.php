<?php $this->beginContent('//layouts/main'); ?>

    <div class="content-box">
        <section class="container">
            <?php $this->widget('\ext\D\breadcrumbs\widgets\Breadcrumbs', array('breadcrumbs' => $this->breadcrumbs->get())); ?>

            <?= $content ?>
        </section>
    </div>

<?php $this->endContent(); ?>
