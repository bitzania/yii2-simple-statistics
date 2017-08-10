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
        $this->createTable('bz_stat_account', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'code' => $this->string(50),
            'tags' => $this->text(),
            'data' => $this->text(),  // json custom data if necesssary
            'created_on' => $this->datetime(),
            'modified_on' => $this->datetime(),
            'created_by' => $this->integer(),
            'modified_by' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bz_stat_account');
    }
}
