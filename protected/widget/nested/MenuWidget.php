<?php


class MenuWidget extends CWidget
{
    public $menuClass = 'left-menu';

    public $activeCategory = false;

    public $categoryPath = [];

    private $_items;

    public function run()
    {
        $this->_items = AdviceCategory::model()->findAll(array(
            'select' => 'id, title, lft, rgt, root, level, ordering',
            'order' => 'ordering, lft',
        ));

        $categoryPath = [];

        if ($this->activeCategory) {
            $category = AdviceCategory::model()->findByPk($this->activeCategory);

            $categoryPath[] = $category->id;

            if ($ancestors = $category->ancestors()->findAll()) {
                foreach ($ancestors as $ancestor) {
                    $categoryPath[] = $ancestor->id;
                }
            }
        }

        $this->categoryPath = $categoryPath;

        $items = $this->prepareTree();

        $this->render('index', [
            'items' => $items,
        ]);
    }

    private function prepareTree($level = 1, $parent = null)
    {
        $items = array();

        foreach($this->_items as $cat) {
            /* @var AdviceCategory|NestedSetBehavior $cat */

            if ($cat->level != $level)
                continue;

            if ($parent && !$cat->isDescendantOf($parent))
                continue;

            $item = array(
                'label' => $cat->title,
                'url' => array('sovety/category', 'id' => $cat->id),
                'linkOptions' => array(
                    'title' => $cat->getMetaATitle(),
                ),
                'itemOptions' => [],
            );

            if (!$cat->isLeaf()) {
                $item['items'] = $this->prepareTree($cat->level + 1, $cat);
            } else {
                $item['items'] = $this->getAdviceList($cat->id);
            }

            if (in_array($cat->id, $this->categoryPath)) {
                $item['itemOptions']['class'] = 'advice-category-active';
            }

            $items[] = $item;
        }

        return $items;
    }

    private function getAdviceList($catID)
    {
        $advices = Advice::model()->findAll([
            'condition' => 'category_id = :category_id',
            'order' => 'title',
            'params' => [
                ':category_id' => $catID,
            ]
        ]);

        $items = array();

        foreach($advices as $advice) {
            /* @var Advice|NestedSetBehavior $advice */

            $item = array(
                'label' => $advice->title,
                'url' => array('sovety/advice', 'id' => $advice->id),
                'linkOptions'=>array('title' => $advice->getMetaATitle())
            );

            $items[] = $item;
        }

        return $items;
    }
}