<?php

namespace app\controllers;

use app\extensions\models\RateExtension;
use app\providers\RateProvider;
use app\services\ExchangeAPI;
use app\services\UpdateService;
use GuzzleHttp\Exception\GuzzleException;
use yii\db\Exception;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function actionIndex(): string
    {
        if(UpdateService::getUpdated()) {
            $exchange = new ExchangeAPI();
            RateExtension::updateRates($exchange->getRatesJSON());
        }
        $rates = RateProvider::getCollection();
        return $this->render('index', [
            'rates' => $rates,
        ]);
    }
}
