<?php

use app\services\ExchangeAPI;
use yii\helpers\Json;

$response = new ExchangeAPI();
try {
    $response = Json::decode($response->getRatesJSON()->getBody()->getContents(), true);
    return [
        [
            'updated_at' => $response['Timestamp']
        ]
    ];
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    return [
        [
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]
    ];
}
