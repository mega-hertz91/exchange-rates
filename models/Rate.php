<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property int $id
 * @property string $uid
 * @property int $num_node
 * @property string $char_code
 * @property int $nominal
 * @property string $name
 * @property float $value
 * @property float $previous
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'num_node', 'char_code', 'nominal', 'name', 'value', 'previous'], 'required'],
            [['num_node', 'nominal'], 'default', 'value' => null],
            [['num_node', 'nominal'], 'integer'],
            [['value', 'previous'], 'number'],
            [['uid', 'name'], 'string', 'max' => 255],
            [['char_code'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'num_node' => 'Num Node',
            'char_code' => 'Char Code',
            'nominal' => 'Nominal',
            'name' => 'Name',
            'value' => 'Value',
            'previous' => 'Previous',
        ];
    }
}
