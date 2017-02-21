<?php
use reviews\models\Settings;
use common\components\helpers\HYii as Y;

/**
 * @var $data \reviews\models\Review
 */

$w=Settings::model()->tmb_width;
$h=Settings::model()->tmb_height;
?>

<div class="reviews__item">
	<div class="review__name"><?= $data->author; ?></div>
	<div class="review__date"><?= Y::formatDateVsRusMonth($data->create_time); ?></div>
	<div class="review__text">
		<?= $data->detail_text; ?>
	</div>
</div>