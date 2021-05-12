<?php


namespace app\services;


use app\models\Update;

class UpdateService
{
    const INTERVAL = 3600;

    /**
     * Update app logic
     * @return bool
     */
    public static function getUpdated(): bool
    {
        $model = Update::find()->orderBy(['id' => SORT_DESC])->one();
        if (!$model) {
            return true;
        } else {
            $now = strtotime('now');
            $last = strtotime($model->updated_at);
            return abs($last - $now) > self::INTERVAL;
        }
    }
}
