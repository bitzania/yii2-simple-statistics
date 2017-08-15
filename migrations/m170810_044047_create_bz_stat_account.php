<?php

use yii\db\Migration;

/**
 * Handles the creation for table `bz_stat_account`.
 */
class m170810_044047_create_bz_stat_account extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tbname = 'bz_stat_account';
        $this->createTable($tbname, [
            'id' => $this->primaryKey(),
            'code' => $this->string(255),
            'name' => $this->string(255),
            'notes' => $this->text(),
            'tags' => $this->text(),
            'data' => $this->text(),  // json custom data if necesssary
            'unit' => $this->string(50), // satuan
            'balance' => $this->decimal(20,2),
            'created_on' => $this->datetime(),
            'modified_on' => $this->datetime(),
            'created_by' => $this->integer(),
            'modified_by' => $this->integer(),
        ]);

        $this->createIndex($tbname.'code', $tbname, "code", true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bz_stat_account');
    }
}
