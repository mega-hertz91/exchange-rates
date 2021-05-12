<?php

namespace app\providers;

use app\models\Rate;
use yii\data\ActiveDataProvider;

class RateProvider extends ActiveDataProvider
{
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * Get rate collections
     * @return ActiveDataProvider
     */
    public static function getCollection(): ActiveDataProvider
    {
        return new self([
            'query' => Rate::find(),
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort' => [
                'defaultOrder' => [
                    'char_code' => SORT_DESC,
                ]
            ]
        ]);
    }
}
