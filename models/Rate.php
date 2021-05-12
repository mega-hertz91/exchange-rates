<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "rate".
 *
 * @property int $id
 * @property string $uid
 * @property int $num_code
 * @property string $char_code
 * @property int $nominal
 * @property string $name
 * @property float $value
 * @property float $previous
 */
class Rate extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['uid', 'num_code', 'char_code', 'nominal', 'name', 'value', 'previous'], 'required'],
            [['num_code', 'nominal'], 'default', 'value' => null],
            [['num_code', 'nominal'], 'integer'],
            [['value', 'previous'], 'number'],
            [['uid', 'name'], 'string', 'max' => 255],
            [['char_code'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'num_code' => 'Num Code',
            'char_code' => 'Char Code',
            'nominal' => 'Nominal',
            'name' => 'Name',
            'value' => 'Value',
            'previous' => 'Previous',
        ];
    }
}
