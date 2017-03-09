<?php
/**
 * @var $items array
 */

/**
 * @param $items array
 * @param $level int
 * @param $menuClass string
 * @return string
 */
function renderMenuItems($items, $level = 0, $menuClass = '') {
    $html = '';

    $ulOptions = [];

    if ($level) {
        $ulOptions['class'] = 'sub-menu__' . $level;
    } else {
        $ulOptions['class'] = $menuClass;
    }

    if ($level > 1) {
        $html .= CHtml::openTag('div', ['class' => 'sub-menu__area']);
    }

    $html .= CHtml::openTag('ul', $ulOptions);

    foreach ($items as $item) {
        $htmlOptions = [
            'class' => '',
        ];

        if (!empty($item['items'])) {
            $htmlOptions['class'] = 'have-sub';
        }

        if (isset($item['itemOptions']['class'])) {
            $htmlOptions['class'] = $htmlOptions['class'] . ' ' . $item['itemOptions']['class'];
        }

        $html .= CHtml::openTag('li', $htmlOptions);
        $html .= CHtml::link($item['label'], $item['url'], $item['linkOptions']);

        if (!empty($item['items'])) {
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

<?php echo renderMenuItems($items, 0, $this->menuClass); ?>
