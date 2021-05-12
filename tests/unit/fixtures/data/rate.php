<?php

use app\services\ExchangeAPI;
use app\services\RateAdapter;
use GuzzleHttp\Exception\GuzzleException;

$exchange = new ExchangeAPI();
try {
    return RateAdapter::transformToArray($exchange->getRatesJSON()->getBody()->getContents());
} catch (GuzzleException $e) {
    return $mock = [
        [
            "uid" => "R01010",
            "num_code" => "036",
            "char_code" => "AUD",
            "nominal" => 1,
            "name" => "Австралийский доллар",
            "value" => 56.0944,
            "previous" => 57.6418
        ],
        [
            "uid" => "R01020A",
            "num_code" => "944",
            "char_code" => "AZN",
            "nominal" => 1,
            "name" => "Азербайджанский манат",
            "value" => 43.6473,
            "previous" => 43.6358
        ],
        [
            "uid" => "R01035",
            "num_code" => "826",
            "char_code" => "GBP",
            "nominal" => 1,
            "name" => "Фунт стерлингов Соединенного королевства",
            "value" => 104.6277,
            "previous" => 103.2288
        ]
    ];
}
