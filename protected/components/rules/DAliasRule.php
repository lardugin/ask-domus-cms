<?php
/**
 * Правило маршрутизации для моделей с поведением DAliasBehavior
 * 
 */
use AttributeHelper as A;

class DAliasRule extends CBaseUrlRule
{
	public $urlPostfix = '/';

	/**
	 * @var array массив конфигурации. 
	 * array(
	 * 	className=>array(
	 * 		'url'=>основная ссылка, 
	 * 		'replaceUrl'=>ссылка на которую замениться основная ссылка при формировании,
	 * 		если не указана, будет использована основная ссылка. 
	 * 		'attributeId'=>attributeId,
	 * 		'attributeAlias'=>attributeAlias,
	 * 		'module'=>имя модуля, если задан, будет проверяться подключен модуль или нет.
	 * )) 
	 * attributeId по умолчанию "id",
	 * attributeAlias по умолчанию "alias",
	 */
	public $config=array(
		'Event'=>array('url'=>'site/event', 'replaceUrl'=>'news'),
		'Sale'=>array('url'=>'sale/view', 'replaceUrl'=>'sale', 'module'=>'sale'),
		'Blog'=>array('url'=>'site/blog'),
		'Page'=>array('url'=>'site/page'),
		'Service'=>array('url'=>'site/service'),
		'Advice'=>array('url'=>'sovety/advice'),
		'AdviceCategory'=>array('url'=>'sovety/category'),
		'\reviews\models\Review'=>array('url'=>'reviews/default/view', 'replaceUrl'=>'review', 'module'=>'reviews'),
	);

    /**
     * Дополнительная директория для URL
     *
     * @var array
     */
    public $modelDirs = [
        'Service' => 'uslugi/',
        'Event' => 'novosti/',
    ];
	
	/**
	 * (non-PHPdoc)
	 * @see CBaseUrlRule::createUrl()
	 */
	public function createUrl($manager, $route, $params, $ampersand)
	{
		foreach($this->config as $className=>$cfg) {
	  		if ($route == $cfg['url']) {
	  			if($module=A::get($cfg, 'module')) {
	  				if(!\Yii::app()->d->isActive($module)) continue;
	  			}

	   			$id=$params['id'];
	   			$alias = $this->_getAliasById($className, $id);
	   			
	   			unset($params['id']);
				$url=empty($alias) ? sprintf(A::get($cfg, 'replaceUrl', $cfg['url']).'/%d', $id) : sprintf('%s', $alias);

				$url = $url . '/';
	
	    		if(!empty($params)) {
	    			$url.='?' . $manager->createPathInfo($params, '=', $ampersand);
	    		}
	    		
	    		return $url;
	  		}
		}

		return false;
	}

	/**
	 * (non-PHPdoc)
	 * @see CBaseUrlRule::parseUrl()
	 */
	public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
	{
		if (preg_match('/^portfolio|catalog|shop\//i', $pathInfo)) {
			return false;
		}

		elseif($pathInfo != 'index') {
		    $pathInfo = preg_replace('/^.*?([^\/]+)$/', '$1', $pathInfo);

		    if ($pathInfo == 'index') {
                return false;
            }
		}

		foreach($this->config as $className=>$cfg) {
			if (strpos($_SERVER['REQUEST_URI'], 'uslugi') === false && $className == 'Service') {
				continue;
			}

			if (strpos($_SERVER['REQUEST_URI'], 'novosti') === false && $className == 'Event') {
				continue;
			}

			if($module=A::get($cfg, 'module')) {
  				if(!\Yii::app()->d->isActive($module)) continue;
  			}

			if ($id=$this->_getIdByAlias($className, $pathInfo)) {
				$_GET['id']=$id;
				return $cfg['url'];
			}
			elseif($replaceUrl=A::get($cfg, 'replaceUrl')) {
				if(preg_match("/^{$replaceUrl}\/(\d+)$/i", $pathInfo, $matches)) {
					$_GET['id']=$matches[1];
					return $cfg['url'];
				}
			}
		}
		
		return false;
	}
	
	/**
	 * Получение имени атрибута id модели
	 * @param string $className имя класса модели
	 * @return string
	 */
	private function _getAttributeId($className)
	{
		return A::get(A::get($this->config, $className, array()), 'attributeId', 'id');
	}
	
	/**
	 * Получение имени атрибута алиаса модели
	 * @param string $className имя класса модели
	 * @return string
	 */
	private function _getAttributeAlias($className)
	{
		return A::get(A::get($this->config, $className, array()), 'attributeAlias', 'alias');
	}
	
	/**
	 * Получение id модели по алиасу 
	 * @param string $className имя класса модели
	 * @param string $alias алиас модели.
	 * @return integer
	 */
	private function _getIdByAlias($className, $alias)
	{
		return (int)\Yii::app()->db->createCommand()
			->select($this->_getAttributeId($className))
			->from($className::model()->tableName())
			->where($this->_getAttributeAlias($className).'=:alias', array(':alias'=>$alias))
			->queryScalar();
	}

    /**
     * Получение алиаса модели по id
     * @param string $className имя класса модели
     * @param integer $id id модели.
     * @return null|string
     */
	private function _getAliasById($className, $id)
	{
		$fQuery=function($className, $id, $select, $method='queryScalar') {
			return \Yii::app()->db->createCommand()
				->select($select)
				->from($className::model()->tableName())
				->where($this->_getAttributeId($className).'=:id', array(':id'=>$id))
				->$method();
		};

		if ($className == 'Page') {
            if($data=$fQuery($className, $id, 'alias, blog_id', 'queryRow')) {
				if(!empty($data['blog_id'])) {
					if($blogAlias=$fQuery('Blog', $data['blog_id'], 'alias')) {
						return $blogAlias.'/'.$data['alias'];
					}
				} else {
				    return $this->getPageUrl($id);
                }

                return $data['alias'];
			}
		} elseif(isset($this->modelDirs[$className])) {
            return $this->modelDirs[$className] . $fQuery($className, $id, $this->_getAttributeAlias($className));
        } else {
			return $fQuery($className, $id, $this->_getAttributeAlias($className));
		}
		return null;
	}

	public function getPageUrl($id)
    {
        $url = Yii::app()->cache->get('page_url_' . $id);

        if (!$url) {
            $url = $this->createPageUrl($id);

            Yii::app()->cache->set('page_url_' . $id, $url);
        }

        return $url;
    }

    public function createPageUrl($id)
    {
        $page = Page::model()->findByPk($id);

        $options = '{"model":"page"';
        $options .= ',"id":"' . $id. '"';
        $options .= '}';

        $path = [];

        if ($item = \Menu::model()->findByAttributes(['options'=>$options])) {
            $path = $this->getMenuTree($item->id);
        }

        if ($path) {
            return implode('/', array_reverse($path));
        } else {
            return $page->alias;
        }
    }

    public function getMenuTree($id, $path = [])
    {
        if (!$id) {
            return $path;
        }

        $menu = Menu::model()->findByPk($id);

        if ($menu->options['model'] == 'page') {
            $alias = \Yii::app()->db->createCommand()
                ->select('alias')
                ->from(Page::model()->tableName())
                ->where('id = :id', [
                    ':id' => $menu->options['id'],
                ])
                ->queryScalar();

            $path[] = $alias;
        }

        $path = $this->getMenuTree($menu->parent_id, $path);

        return $path;
    }
}
