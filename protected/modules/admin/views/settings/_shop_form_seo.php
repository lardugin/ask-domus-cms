<?use common\components\helpers\HArray as A;?>
<h2>SEO</h2>
<?foreach(['meta_h1', 'meta_title','meta_key', 'meta_desc'] as $attribute) {
	$this->widget('\common\widgets\form\TextField', A::m(compact('form', 'model'), ['attribute'=>$attribute]));
}
?>