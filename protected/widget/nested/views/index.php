<?php
/**
 * @var $items array
 */

/**
 * @param $items array
 * @param $level int
 * @return string
 */
function renderMenuItems($items, $level = 0) {
    $html = '';

    $ulOptions = [];

    if ($level) {
        $ulOptions['class'] = 'sub-menu__' . $level;
    } else {
        $ulOptions['class'] = 'left-menu';
    }

    if ($level > 1) {
        $html .= CHtml::openTag('div', ['class' => 'sub-menu__area']);
    }

    $html .= CHtml::openTag('ul', $ulOptions);

    foreach ($items as $item) {
        $htmlOptions = [];

        if ($item['items']) {
            $htmlOptions['class'] = 'have-sub';
        }

        $html .= CHtml::openTag('li', $htmlOptions);
        $html .= CHtml::link($item['label'], $item['url'], $item['linkOptions']);

        if ($item['items']) {
            $html .= renderMenuItems($item['items'], $level + 1);
        }

        $html .=  CHtml::closeTag('li');
    }

    $html .=  CHtml::closeTag('ul');

    if ($level > 1) {
        $html .= CHtml::closeTag('div');
    }

    return $html;
}
?>

<?php echo renderMenuItems($items); ?>
