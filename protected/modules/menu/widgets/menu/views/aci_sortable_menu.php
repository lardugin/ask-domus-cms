<?php 
/** @var \menu\widget\AciSortableMenuWidget $this */
/** @var string $menu menu HTML code */ 
?>
<div class="aci-sortable-menu-widget-wrapper">
	<?php echo $menu; ?>
</div>

<script >
$(function() {
	// initialization
	AciSortableMenuWidget.init("<?php echo $this->id; ?>");
});
</script>