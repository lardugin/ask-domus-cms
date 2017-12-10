<?php
/**
 * Правило маршрутизации для советов
 */

class DAdviceRule extends CBaseUrlRule
{
    public $baseUrl = 'sovety';

    public $categoryControllerAction = 'category';
    public $productControllerAction = 'advice';

    public $adviceModel = 'Advice';
    public $categoryModel = 'AdviceCategory';

	public function createUrl($manager, $route, $params, $ampersand)
	{
        if (!empty($params['id'])) {
            if ($route == $this->baseUrl . '/' . $this->categoryControllerAction) {
                return $this->getCategoryUrl($params['id']) . '/';
            } elseif ($route == $this->baseUrl . '/' . $this->productControllerAction) {
                return $this->getAdviceUrl($params['id']) . '/';
            }
        }

        return false;
	}

	public function getCategoryUrl($id)
    {
        $url = Yii::app()->cache->get($this->baseUrl . '_c_' . $id);

        if (!$url) {
            $url = $this->createCategoryUrl($id);

            Yii::app()->cache->set($this->baseUrl . '_c_' . $id, $url);
        }

        return $url;
    }

	public function createCategoryUrl($id)
    {
        $categoryModel = $this->categoryModel;

        $category = $categoryModel::model()->findByPk($id);

        $ancestors = $category->ancestors()->findAll([
            'select'=>'id, alias, root, lft, rgt, level'
        ]);

        $path = [];

        if (!empty($ancestors)) {
            foreach ($ancestors as $ancestor) {
                $path[] = $ancestor->alias;
            }
        }

        $path[] = $category->alias;

        return $this->baseUrl . '/' . implode('/', $path);
    }

    public function getAdviceUrl($id)
    {
        $url = Yii::app()->cache->get($this->baseUrl . '_p_' . $id);

        if (!$url) {
            $url = $this->createAdviceUrl($id);

            Yii::app()->cache->set($this->baseUrl . '_p_' . $id, $url);
        }

        return $url;
    }

    public function createAdviceUrl($id)
    {
        $adviceModel = $this->adviceModel;

        $advice = $adviceModel::model()->findByPk($id);

        $categoryURL = $this->getCategoryUrl($advice->category_id);

        return $categoryURL . '/' . $advice->alias;
    }
	
	/**
	 * (non-PHPdoc)
	 * @see CBaseUrlRule::parseUrl()
	 */
	public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
	{
		return false;
	}
}
