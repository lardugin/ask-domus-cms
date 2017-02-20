<?php

class m160413_081957_add_on_shop_index_column_to_product_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product', 'on_shop_index', 'boolean');
	}

	public function down()
	{
		$this->dropColumn('product', 'on_shop_index');
	}
}