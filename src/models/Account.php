<?php

namespace bitzania\statistic\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use paulzi\jsonBehavior\JsonBehavior;
use paulzi\jsonBehavior\JsonValidator;


/**
 * This is the model class for table "bz_stat_account".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $notes
 * @property string $tags
 * @property string $data
 * @property string $unit
 * @property string $balance
 * @property string $created_on
 * @property string $modified_on
 * @property int $created_by
 * @property int $modified_by
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bz_stat_account';
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
            [['notes', 'tags'], 'string'],
            [['balance'], 'number'],
            [['created_on', 'modified_on'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['unit'], 'string', 'max' => 50],
            [['code'], 'unique'],
            [['data'], JsonValidator::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'notes' => 'Notes',
            'tags' => 'Tags',
            'data' => 'Data',
            'unit' => 'Unit',
            'balance' => 'Balance',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @inheritdoc
     * @return AccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccountQuery(get_called_class());
    }
}
