<?php

use yii\db\Migration;

/**
 * Handles the creation for table `bz_stat_ledger`.
 */
class m170815_090747_create_bz_stat_ledger extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tbname = 'bz_stat_ledger';
        $this->createTable($tbname, [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer(),
            'account_code' => $this->string(255),
            'trx_id' => $this->integer(255),
            'trx_ref' => $this->string(255),
            'trx_date' => $this->datetime(),
            'trx_value' => $this->decimal(20,2),
            'data' => $this->text(),
            'balance_before'=> $this->decimal(20,2),
            'balance_after'=> $this->decimal(20,2),
            'created_on' => $this->datetime(),
            'modified_on' => $this->datetime(),
            'created_by' => $this->integer(),
            'modified_by' => $this->integer(),
        ]);
        $this->createIndex($tbname.'account_id', $tbname, "account_id", false);
        $this->createIndex($tbname.'account_code', $tbname, "account_code", false);
        $this->createIndex($tbname.'trx_id', $tbname, "trx_id", false);
        $this->createIndex($tbname.'trx_ref', $tbname, "trx_ref", false);
        $this->createIndex($tbname.'account_id_trx_id', $tbname, ['account_id','trx_id'], false);
        $this->createIndex($tbname.'account_code_trx_ref', $tbname, ['account_code','trx_ref'], false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bz_stat_ledger');
    }
}
