<?php

use yii\db\Migration;
use yii\db\Schema;

class m150626_165329_translator extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_data}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'strid' => 'VARCHAR(32) NOT NULL',
                'src_file' => 'VARCHAR(76) NOT NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%languages}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'short' => 'TINYTEXT NOT NULL',
                'full' => 'TINYTEXT NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);

            $this->batchInsert('{{%languages}}',
                [
                    'short',
                    'full',
                ],
                [
                    [
                        'en',
                        'English',
                    ], [
                    'ru',
                    'Russian',
                ], [
                    'de',
                    'German',
                ], [
                    'pl',
                    'Polish',
                ], [
                    'pt',
                    'Portuguese',
                ], [
                    'es',
                    'Spanish',
                ],[
                    'tr',
                    'Turkish',
                ],

                ]
            );
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%translators}}', [
                'id' => 'INT(11) NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'src' => 'VARCHAR(2) NOT NULL',
                'dst' => 'VARCHAR(2) NOT NULL',
            ], $tableOptions);
            $this->addForeignKey('fk_user_translators', '{{%translators}}', 'id', '{{%user}}', 'id' );
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%translate}}', [
                'id' => 'SMALLINT(6) NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_tr}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_ru}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_pt}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_pl}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_es}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_en}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%trans_de}}', [
                'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'str' => 'TEXT NOT NULL',
                'user_id' => 'INT(11) NOT NULL',
                'alert' => 'TINYINT(1) NULL',
            ], $tableOptions);
        }
        $tableOptions = "";
        if ($this->db->driverName == "mysql") {
            /* MYSQL */
            $this->createTable('{{%comments}}', [
                'id' => 'INT(6) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'uid' => 'INT(11) NOT NULL',
                'str_id' => 'SMALLINT(6) NOT NULL',
                'timestamp' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
                'comment' => 'TEXT NOT NULL',
            ], $tableOptions);
            $this->addForeignKey('fk_trans_data_comments', '{{%comments}}', 'str_id', '{{%trans_data}}', 'id' );
            $this->addForeignKey('fk_user_comments', '{{%comments}}', 'uid', '{{%user}}', 'id' );
        }



    }

    public function down()
    {
        echo "m150626_165329_translator cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
