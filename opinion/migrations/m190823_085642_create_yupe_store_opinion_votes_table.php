<?php

class m190823_085642_create_yupe_store_opinion_votes_table extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->createTable('yupe_store_opinion_votes', array(
            'id' => 'int(11) AUTO_INCREMENT PRIMARY KEY',
            'opinion_id' => 'int(11)',
            'user_id' => 'int(11)',
        ));

    }

    public function safeDown()
    {
        $this->dropTable('yupe_store_opinion_votes');
    }
}
