<?php
namespace common\components\helpers;

use common\components\helpers\HArray as A;

class HHtml
{
	/**
	 * Get http://placehold.it image url.  
	 * @param array $options опции.
	 * Список опций:
	 * [
	 * 	"width" ширина
	 *  "w" короткий псевдоним для ширины
	 * 	"height" высота
	 *  "h" короткий псевдоним для высоты 
	 * 	"color" цвет текста
	 * 	"c" короткий псевдоним для цвета текста 
	 * 	"bgColor" цвет фона
	 *  "bg" короткий псевдоним для цвета фона 
	 * 	"text" текст надписи
	 *  "t" короткий псевдоним для текста надписи
	 * 	"textSize" размер надписи
	 *  "sz" короткий псевдоним для размера надписи
	 * ]
	 */
	public static function pImage($options)
	{
		$get=function($name, $short) use ($options) {
			return A::get($options, $name, A::get($options, $short));
		};
		$w=$get('width', 'w');
		$h=$get('height', 'h');
		if(($w === null) && ($h === null)) {
			return null;
		}
		
		$url='http://placehold.it/';
		$qs=[];
		if(($w !== null) && ($h !== null)) { 
			$url.=$w.'x'.$h.'/';
		} else {
			$url.=($w ?: $h).'/';
		}
		
		$color=$get('color', 'c');
		$bg=$get('bgColor', 'bg');
		if(($color !== null) && ($bg !== null)) {
			$url.=$color . '/' . $bg .'/';
		} elseif($color) {
			$qs[]='txtclr='.$color;
		}
		else {
			$url.=$bg . '/';
		} 
		
		$text=$get('text', 't');
		if($text !== null) {
			$qs[]='text='.$text;
		}
		
		$textSize=$get('textSize', 'sz');
		if($textSize !== null) {
			$qs[]='txtsize='.$textSize;
		}
		return $url.(empty($qs) ? '' : ('?'.implode('&', $qs)));
	}

	/**
     * Ссылка на предыдущую страницу
	 * @param string $text текст ссылки
	 * @param string $defaultBackUrl ссылка возврата по умолчанию, 
	 * если переход был по прямой ссылке.
	 * @param string $path путь. возврат идет на урл, если referrer, содержит этот путь.
	 * @param array $htmlOptions link html options. Default empty array.
	 * @return string
	 */
	public static function linkBack($text='Back', $defaultBackUrl='/', $path=null, $htmlOptions=[]) 
	{ 
		$link = \Yii::app()->request->urlReferrer;

		if($path === null)
			$path=$defaultBackUrl;

		if(!preg_match('/^[^\/]+:\/\/'.\Yii::app()->request->serverName.($path?str_replace('/', '\/',$path):'').'(.*)$/i', $link)) {
			$link = $defaultBackUrl;
		} 
		
		return \CHtml::link($text, $link, $htmlOptions);
	}

	/**
	 * Получить анонс текста
	 * @param string $text основной текст.
	 * @param int $length длина анонса.
	 * @param string $detailLink ссылка подробнее
	 * @return string
	 */
	public static function getIntro($text, $length=300, $detailLink='...')
	{
		if(!is_numeric($length)) $length = 300;
		
		$subLimit = floor($length / 10);
		$text = strip_tags($text);
		if(mb_strlen($text) > $length) {
			$text = preg_replace('/ +/', ' ', mb_substr($text, 0, $length));
			$chunks = explode(' ', $text);
			$count  = count($chunks);
			$chunks = array_slice($chunks, 0, ($count <= $subLimit) ? ($count - 1) : $subLimit);
			$text = implode(' ', $chunks) . $detailLink;
		}
		
		return $text;
	}

	/**
	 * Вывод отформатированной цены
	 * @param sting $price цена.
	 * @return string
	 */
	public static function price($price)
	{
		if((int)$price < (float)$price) {
			$price=(float)$price;
			$decimal=2;
		}
		else {
			$price=(int)$price;
			$decimal=0;
		}
		return number_format($price, $decimal, '.', ' ');
	}

	/**
	 * Заменяет в строке двойные кавычки на одинарные
	 * @param string $str входная строка
	 * @return string
	 */
	public static function q($str)
	{
		return str_replace('"', "'", $str);
	}

	/**
	 * (non-PHPDoc)
	 * @see htmlspecialchars()
	 */
	public static function hsc($str)
	{
		return htmlspecialchars($str);
	}
}