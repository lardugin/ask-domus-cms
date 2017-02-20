<?php

class m160712_104130_add_brand_id_column_to_product_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product', 'brand_id', 'integer');
	}

	public function down()
	{
		$this->dropColumn('product', 'brand_id');
	}
}