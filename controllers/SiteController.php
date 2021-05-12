<?php

namespace app\controllers;

use app\extensions\models\RateExtension;
use app\models\Update;
use app\providers\RateProvider;
use app\services\ExchangeAPI;
use app\services\UpdateService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        if(UpdateService::getUpdated()) {
            $exchange = new ExchangeAPI();
            try {
                RateExtension::updateRates($exchange->getRatesJSON());
            } catch (Exception $e) {
                return $this->render('error', [
                    'message' => $e->getMessage(),
                    'name' => 'Сервер временно не доступен, попробуйте позднее'
                ]);
            }
            catch (GuzzleException $e) {
                return $this->render('error', [
                    'message' => $e->getMessage(),
                    'name' => 'Сервер временно не доступен, попробуйте позднее'
                ]);
            }
        }
        $rates = RateProvider::getCollection();
        return $this->render('index', [
            'rates' => $rates,
            'lastUpdate' => Update::find()->orderBy(['id' => SORT_DESC])->one(),
            'usd' => RateExtension::findOne(['char_code' => 'USD']),
            'eur' => RateExtension::findOne(['char_code' => 'EUR']),
        ]);
    }
}
