<?php

class m160211_114739_add_hidden_column_to_product_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product', 'hidden', 'boolean');
	}

	public function down()
	{
		$this->dropColumn('product', 'hidden');
	}
}