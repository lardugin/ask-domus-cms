<?php
/**
 * Helper for database and ActiveRecord
 * 
 */
namespace common\components\helpers;

use common\components\helpers\HYii as Y;
use common\components\helpers\HFile;
use common\components\helpers\HModel;

class HDb
{
	/**
	 * @var integer Тип "Таблица базы данных".
	 */
	const TTABLE = 1;
	
	/**
	 * @var integer Тип "Поле базы данных".
	 */
	const TCOLUMN = 2;
	
	/**
	 * @var integer Тип "Значение поля базы данных".
	 */
	const TVALUE = 3;
	
	/**
	 * Экранирование имени таблицы базы данных.
	 * @see self::q()
	 * @param string $name имя поля.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return string
	 */
	public static function qt($name, $db=null)
	{
		return self::q($name, $db, self::TTABLE);
	}
	
	/**
	 * Экранирование поля таблицы базы данных.
	 * @see self::q()
	 * @param string $name имя поля.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return string
	 */
	public static function qc($name, $db=null)
	{
		return self::q($name, $db, self::TCOLUMN);
	}
	
	/**
	 * Экранирование значения поля таблицы базы данных.
	 * @see self::q()
	 * @param string $str значение
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return string
	 */
	public static function qv($str, $db=null)
	{
		return self::q($str, $db, self::TVALUE);
	}
	
	/**
	 * Эранирование переданного значения для запроса в базу данных.
	 * @param string $str значениe
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @param integer $type тип значения. HYii::TTABLE, HYii::TCOLUMN, HYii::TVALUE.
	 * @return string
	 * @throws \CException
	 */
	public static function q($str, $db=null, $type=self::DB_TCOLUMN)
	{
		switch($type) {
			case self::TTABLE: $method = 'quoteTableName'; break;
			case self::TCOLUMN: $method = 'quoteColumnName'; break;
			case self::TVALUE: $method = 'quoteValue'; break;
			default:
				throw new \CException('Invalid quote type.');
		}
	
		return self::db($db)->$method($str);
	}
	
	/**
	 * Получить строку SQL запроса
	 * @param mixed $model модель или имя класса модели
	 * @param string $criteria объект критерия, который будет использован для построения запроса.
	 * Если не передан, возьметься критерия переданной модели. по умолчанию NULL.
	 * @return string sql запрос
	 */
	public static function getSqlText($model, $criteria=null)
	{
		if(is_string($model) && class_exists($model))
			$model=$model::model();
	
		if(!($criteria instanceof \CDbCriteria))
			$criteria=$model->getDbCriteria();
	
		$sql=$model->getCommandBuilder()->createFindCommand($model->getTableSchema(), $criteria)->getText();
	
		if($criteria instanceof CDbCriteria) {
			$sql=strtr($sql, $criteria->params);
		}
	
		return $sql;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \common\components\helpers\HModel::massiveAssignment()
	 * Метод перенесен в \common\components\helpers\HModel::massiveAssignment()
	 * Оставлен только для поддержания старых версий.
	 */
	public static function massiveAssignment($model, $forciblyReturnModel=false, $isPost=true)
	{
		return HModel::massiveAssignment($model, $forciblyReturnModel, $isPost);
	}
	
	/**
	 * @link http://www.yiiframework.com/forum/index.php/topic/1039-creating-relations-from-a-behavior/
	 * @see \CBaseActiveRelation::__construct()
	 *
	 * @param \CActiveRecord $model
	 * @param string $type \CActiveRecord::HAS_ONE или другие.
	 */
	public static function addRelation(&$model, $type, $name, $className, $foreignKey, $options=array())
	{
		$model->getMetaData()->relations[$name] = new $type($name, $className, $foreignKey, $options);
	}
	
	/**
	 * Выполнить миграцию 
	 * @param string $alias алиас пути до файлов миграций. По умолчанию "application.migrations".
	 * @param string $tableName имя таблицы миграций. По умолчанию "tbl_migration".
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @param mixed $logFileName имя файла логирования миграций. Для отключения логирования можно передать 
	 * любое FALSE значение. По умолчанию "migrations.log".
	 * @param string $logAlias алиас пути до файла логирования миграций. По умолчанию "application.runtime".  
	 */
	public static function migrate($alias='application.migrations', $tableName='tbl_migration', $db=null, $logFileName='migrations.log', $logAlias='application.runtime')
	{
		$hasNewMigrations=self::hasNewMigrations($alias, $tableName);
		if($hasNewMigrations || ($hasNewMigrations===false)) {
			\Yii::import('system.cli.commands.MigrateCommand');
			\Yii::import('system.console.CConsoleCommandRunner');
			$consoleCommandRunner=new \CConsoleCommandRunner();
			$consoleCommandRunner->commands=[
				'migrate'=>[
					'class'=>'system.cli.commands.MigrateCommand',
					'migrationPath'=>$alias,
					'migrationTable'=>$tableName,
					'connectionID'=>'db',
					'interactive'=>false
			]];
			ob_start();
			$consoleCommandRunner->run(['yiic.php', 'migrate']);
			$migrateLog=ob_get_clean();
			
			if($logFileName) {
				file_put_contents(\Yii::getPathOfAlias($logAlias).Y::DS.$logFileName, $migrateLog, FILE_APPEND);
			}
		}
	}
	
	/**
	 * Получить кол-во файлов миграций.
	 * @param string $alias алиас пути до файлов миграций. 
	 */
	public static function getCountMigrations($alias='application.migrations')
	{
		return (int)HFile::getFiles(\Yii::getPathOfAlias($alias));
	}
	
	/**
	 * Проверить есть ли новые миграции. 
	 * @param string $alias алиас пути до файлов миграций.
	 * @param string $tableName имя таблицы миграций. По умолчанию "tbl_migration".
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return mixed кол-во новых миграций. Может возвращать FALSE, если таблица миграции не существует.
	 */
	public static function hasNewMigrations($alias='application.migrations', $tableName='tbl_migration', $db=null)
	{
		$count=0;
		
		if(!self::getTable($tableName, true, $db))
			return false;
		
		$files=HFile::getFiles(\Yii::getPathOfAlias($alias));
		if(!empty($files)) {
			array_walk($files, function(&$v) use ($db) { $v='`version`='.self::qv(substr($v, 0, -4), $db); });
			$query='SELECT COUNT(*) FROM '.self::qt($tableName, $db).' WHERE '.implode('OR', $files);
			$count=count($files) - (int)self::queryScalar($query, [], $db);
		}
		
		return $count; 
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::queryScalar()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса. 
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::queryScalar()
	 */
	public static function queryScalar($query, $params=[], $db=null)
	{
		return self::command('queryScalar', $query, $params, $db);
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::queryRow()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::queryRow()
	 */
	public static function queryRow($query, $params=[], $db=null)
	{
		return self::command('queryRow', $query, $params, $db);
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::queryColumn()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::queryColumn()
	 */
	public static function queryColumn($query, $params=array(), $db=null)
	{
		return self::command('queryColumn', $query, $params, $db);
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::queryAll()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::queryAll()
	 */
	public static function queryAll($query, $params=array(), $db=null)
	{
		return self::command('queryAll', $query, $params, $db);
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::query()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::query()
	 */
	public static function query($query, $params=array(), $db=null)
	{
		return self::command('query', $query, $params, $db);
	}
	
	/**
	 * Получить результат выполнения \CDbCommand::execute()
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbCommand::execute()
	 */
	public static function execute($query, $params=array(), $db=null)
	{
		return self::command('execute', $query, $params, $db);
	}
	
	/**
	 * Выполнение \CDbCommand::$method($params)
	 * 
	 * @param string $method метод класс \CDbCommand
	 * @param string $query SQL запрос.
	 * @param array $params массив параметров для SQL запроса. 
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 */
	public static function command($method, $query, $params=[], $db=null)
	{
		return self::db($db)->createCommand($query)->$method($params);
	}
	
	/**
	 * Получить объект соединения
	 * @param mixed $db объект \CDbConnection (соединения с Базой Данных).
	 * Может быть передана модель CActiveRecord. Если для модели CActiveRecord::getDbConnection() вернул NULL,
	 * то будет возвращен \Yii::app()->db.
	 * По умолчанию NULL (\Yii::app()->db).
	 * @return Ambigous <NULL, CDbConnection>
	 */
	public static function db($db=null)
	{
		if($db instanceof \CDbConnection) 
			return $db;
		
		if($db instanceof \CActiveRecord) 
			return $db->getDbConnection() ?: \Yii::app()->db;
		
		return \Yii::app()->db;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CDbConnection::getSchema()
	 */
	public static function schema($db=null)
	{
		return self::db($db)->getSchema();
	}
	
	/**
	 * Расширение метода \CDbSchema::getTable()
	 * @param string $name имя таблицы
	 * @param boolean $refresh обновить метаданные таблицы.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return \CDbTableSchema
	 */
	public static function getTable($name, $refresh=false, $db=null)
	{
		return self::db($db)->getSchema()->getTable($name, $refresh);
	}
	
	/**
	 * Получить имя базы данных.
	 * @param mixed $db объект соединения. 
	 * По умолчанию (NULL) будет получено методом HDb::db().
	 * @return CDbCommand::queryScalar()
	 */
	public static function getDbName($db=null)
	{
		return self::queryScalar('SELECT DATABASE()', [], $db);
	}
}