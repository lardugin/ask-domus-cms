<?php

class m170307_092605_product_inner extends CDbMigration
{
	public function up()
	{
	    $this->addColumn('product', 'inner_page', 'boolean');
	}

	public function down()
	{
		$this->dropColumn('product', 'inner_page');
	}
}