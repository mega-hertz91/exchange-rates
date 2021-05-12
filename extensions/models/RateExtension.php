<?php

namespace app\extensions\models;

use app\models\Rate;
use app\models\Update;
use app\services\RateAdapter;
use GuzzleHttp\Psr7\Response;
use yii\db\Exception;

class RateExtension extends Rate
{
    const RESPONSE_STATUSES = [
        'success' => 200,
        'error'  => 400
    ];

    /**
     * Synchronize database for API
     * @param Response $response
     * @throws Exception
     */
    public static function updateRates(Response $response)
    {
        if($response->getStatusCode() === self::RESPONSE_STATUSES['success']) {
            $items = RateAdapter::transformToArray($response->getBody()->getContents());
            foreach ($items as $key => $values) {
                $model = self::findOne(['uid' => $values['uid']]);
                if($model) {
                    $model->value = $values['value'];
                    $model->previous = $values['previous'];
                } else {
                    $model = new self(RateAdapter::transformToModel($values));
                }
                $model->save();
            }
            UpdateExtension::create([
                'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
            ]);
        } else {
            throw new Exception('Update failed');
        }
    }
}
