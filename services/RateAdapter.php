<?php


namespace app\services;


use yii\helpers\Json;

class RateAdapter
{
    const MAP_TO_MODEL = [
        'uid' => 'ID',
        'num_code' => 'NumCode',
        'char_code' => 'CharCode',
        'nominal' => 'Nominal',
        'name' => 'Name',
        'value' => 'Value',
        'previous' => 'Previous',
    ];

    public static function transformToModel(array $array): array
    {
        return [
            'uid' => $array[self::MAP_TO_MODEL['uid']],
            'num_code' => $array[self::MAP_TO_MODEL['num_code']],
            'char_code' => $array[self::MAP_TO_MODEL['char_code']],
            'nominal' => $array[self::MAP_TO_MODEL['nominal']],
            'name' => $array[self::MAP_TO_MODEL['name']],
            'value' => $array[self::MAP_TO_MODEL['value']],
            'previous' => $array[self::MAP_TO_MODEL['previous']],
        ];
    }

    /**
     * Json to array
     * @param string $jsonResponse
     * @return array
     */
    public static function transformToArray(string $jsonResponse): array
    {
        $items = [];
        $response = Json::decode($jsonResponse, true);
        foreach ($response['Valute'] as $key => $value) {
            $items[] = self::transformToModel($value);
        }

        return $items;
    }
}
