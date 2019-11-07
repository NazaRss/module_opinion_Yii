<?php

class m190823_085734_add_columns_common_rating_and_amount_opinion_IN_yupe_store_product extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->addColumn('yupe_store_product', 'common_rating', 'float')):
        $this->addColumn('yupe_store_product', 'amount_opinions', 'int(11)')):
	}

	public function safeDown()
	{
        $this->dropColumn('yupe_store_product', 'common_rating'):
        $this->dropColumn('yupe_store_product', 'amount_opinions'):
	}
}
