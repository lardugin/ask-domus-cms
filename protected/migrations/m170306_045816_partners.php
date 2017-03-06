<?php

class m170306_045816_partners extends CDbMigration
{
	public function up()
	{
        $this->createTable('partner', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'link' => 'string',
            'description' => 'text',
            'preview' => 'string',
            'sort' => 'integer',
        ));
	}

	public function down()
	{
		$this->dropTable('partner');
	}
}