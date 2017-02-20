<?php
Yii::setPathOfAlias('settings', Yii::getPathOfAlias('application.modules.settings'));
Yii::import('settings.SettingsModule');

class SettingsController extends \settings\modules\admin\controllers\DefaultController
{	
}