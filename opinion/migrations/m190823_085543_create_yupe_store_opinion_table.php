<?php

class m190823_085543_create_yupe_store_opinion_table extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->createTable('yupe_store_opinion', array(
            'id' => 'int(11) AUTO_INCREMENT PRIMARY KEY',
            'name' => 'varchar(255)',
            'surname' => 'varchar(255)',
            'patronymic' => 'varchar(255)',
            'email' => 'varchar(255)',
            'phone' => 'bigint(60) NULL',
            'city_id' => 'int(11) NULL',
            'experience' => 'int(11)',
            'advantage' => 'text',
            'limitations' => 'text',
            'comment' => 'text',
            'status_opinion' => 'int(11) DEFAULT 0',
            'rating' => 'int(11)',
            'product_id' => 'int(11) DEFAULT 0',
            'dateCreate' => 'int(12)',
            'rating_opinion' => 'int(11) DEFAULT 0',
            'moderation_decision' => 'int(11) DEFAULT 0',
        ));

	}

	public function safeDown()
	{
        $this->dropTable('yupe_store_opinion');
	}
}
