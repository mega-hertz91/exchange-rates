<?php


namespace app\controllers;


use app\extensions\models\RateExtension;
use app\services\ExchangeAPI;
use GuzzleHttp\Exception\GuzzleException;
use yii\web\Controller;

class RateController extends Controller
{
    /**
     * Handle for Crone
     * @return string
     */
    public function actionUpdate(): string
    {
        $exchange = new ExchangeAPI();
        try {
            RateExtension::updateRates($exchange->getRatesJSON());
            return 'Данные успешно обновлены';
        } catch (\Exception $e) {
            return $e->getMessage();
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
