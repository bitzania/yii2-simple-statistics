<?php

namespace bitzania\statistic\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use paulzi\jsonBehavior\JsonBehavior;
use paulzi\jsonBehavior\JsonValidator;
/**
 * This is the model class for table "bz_stat_ledger".
 *
 * @property int $id
 * @property int $account_id
 * @property string $account_code
 * @property int $trx_id
 * @property string $trx_ref
 * @property string $trx_date
 * @property string $trx_value
 * @property string $data
 * @property string $balance_before
 * @property string $balance_after
 * @property string $created_on
 * @property string $modified_on
 * @property int $created_by
 * @property int $modified_by
 */
class Ledger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bz_stat_ledger';
    }

    public function behaviors() {
        return [
            'timestamp'=>[
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_on',
                'updatedAtAttribute' => 'modified_on',
                // 'value' => new Expression('NOW()'),
                'value' =>date("Y-m-d H:i:s"),
            ],
            'blameable'=>[
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'modified_by',
            ],
            'json'=>[
                'class' => JsonBehavior::className(),
                'attributes' => ['data'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'trx_id', 'created_by', 'modified_by'], 'integer'],
            [['trx_date', 'created_on', 'modified_on'], 'safe'],
            [['trx_value', 'balance_before', 'balance_after'], 'number'],
            [['account_code', 'trx_ref'], 'string', 'max' => 255],
            [['data'], JsonValidator::className()],
            [['account_code', 'trx_ref', 'trx_value'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'account_code' => 'Account Code',
            'trx_id' => 'Trx ID',
            'trx_ref' => 'Trx Ref',
            'trx_date' => 'Trx Date',
            'trx_value' => 'Trx Value',
            'data' => 'Data',
            'balance_before' => 'Balance Before',
            'balance_after' => 'Balance After',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
        ];
    }

    public function getAccount() {
        if ($this->account_id)
            return Account::findOne(['pk'=>$this->account_id]);
        else if ($this->account_code) 
            return Account::findOne(['code'=>$this->account_code]);

        return null;
    }

    /**
     * @inheritdoc
     * @return LedgerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LedgerQuery(get_called_class());
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if (!$this->isNewRecord) {
            $this->addError('account_id', 'Cannot update data');
            return false;
        }

        $account = $this->getAccount();
        if (!$account) {
            $this->addError('account_id', 'Invalid Account');
            $this->addError('account_code', 'Invalid Account');
            return false;
        }

        $this->balance_before = $account->balance;
        $account->balance += $this->trx_value;
        $this->balance_after = $account->balance;
        if (!$account->save()) {
            $this->addError('account_id', 'Cannot Save account balance'.json_encode($account->errors));
            return false;
        }

        // disable update
        return true;
    }

    public function afterSave ( $insert, $changedAttributes ) {
        if ($insert) {
        }
        else {

        }
    }

    public static function addTransaction($account_code, $tgl, $trx_ref, $trx_value, $create_account = true, $data = null) {
        $a = Account::findOne(['code'=>$account_code]);
        if (!$a && $create_account) {
            $a = Account::createAccount($account_code);
        }

        $model = new Ledger();
        $model->account_code = $account_code;
        $model->trx_date =  $tgl;
        $model->trx_ref = $trx_ref;
        $model->trx_value = $trx_value;
        if ($data) 
            $model->data->set($data);
        $model->save();
        return $model;
    }

}
