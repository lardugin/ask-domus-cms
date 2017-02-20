<?$this->beginContent('//layouts/main')?>
	
	<div class="col-md-12">
		
		<?$this->widget('\ext\D\breadcrumbs\widgets\Breadcrumbs', array('breadcrumbs'=>$this->breadcrumbs->get()))?>
		
		<article id="content" class="content">
			<?=$content?>
		</article>
	</div>

<?$this->endContent()?>