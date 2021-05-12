<?php

namespace app\services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

/**
 * Class ExchangeAPI
 * response example:
 *  "Date": "2021-05-12T11:30:00+03:00",
 *  "PreviousDate": "2021-05-08T11:30:00+03:00",
 *  "PreviousURL": "//www.cbr-xml-daily.ru/archive/2021/05/08/daily_json.js",
 *  "Timestamp": "2021-05-11T16:00:00+03:00",
 *   "Valute": [{}]
 * @package app\services
 */
class ExchangeAPI
{
    const BASE_URL = 'https://www.cbr-xml-daily.ru';
    const HANDLES = [
        'JSON' => 'daily_json.js',
        'JSONP' => 'daily_jsonp.js',
        'XML' => 'daily_eng.xml'
    ];
    const METHODS = [
        'GET' => 'GET',
        'POST' => 'POST'
    ];

    private $client;


    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::BASE_URL]);
    }

    /**
     * Returned actual rates
     * @throws GuzzleException
     */
    public function getRatesJSON(): Response
    {
        return $this->client->request(self::METHODS['GET'], self::HANDLES['JSON']);
    }
}
