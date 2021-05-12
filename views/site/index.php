<?php

/**
 * @var $this yii\web\View
 * @var $rates RateProvider;
 * @var $lastUpdate Update
 * @var $usd RateExtension
 * @var $eur RateExtension
 */

use app\extensions\models\RateExtension;
use app\models\Update;
use app\providers\RateProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Exchange rates';
?>
<div class="site-index">
    <div class="body-content">

        <h1>Курсы валют ЦБ РФ на <?=Yii::$app->formatter->asDate('now', 'dd.MM.YYYY')?></h1>
        <ul class="list-unstyled">
            <li>
                <?=yii\helpers\Html::encode($usd->name)?> $ &mdash; <?=yii\helpers\Html::encode($usd->value)?> <?php echo $usd->getTrend() ? '<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>' ?>
            </li>
            <li>
                <?=yii\helpers\Html::encode($eur->name)?> € &mdash; <?=yii\helpers\Html::encode($eur->value)?> <?php echo $eur->getTrend() ? '<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>' ?>
            </li>
        </ul>
        <p>Послденее обновение базы данных: <span><?=yii\helpers\Html::encode(Yii::$app->formatter->asDate($lastUpdate->updated_at, 'dd.MM.YYY')) . ' ' . Html::encode(Yii::$app->formatter->asTime($lastUpdate->updated_at, 'HH:m'))?></span></p>
        <?php echo GridView::widget([
            'dataProvider' => $rates,
            'summary' => false,
            'columns' => [
                [
                    'attribute' => 'num_code',
                    'label' => 'Цифр. код',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'char_code',
                    'label' => 'Букв. код',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'nominal',
                    'label' => 'Единиц',
                    'format' => 'integer'
                ],
                [
                    'attribute' => 'name',
                    'label' => 'Валюта',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'value',
                    'label' => 'Курс',
                     'format' => 'decimal',
                ],
                [
                    'attribute' => 'previous',
                    'label' => '',
                    'format' => 'text',
                    'content' => function ($model, $key, $index, $column) {
                        $res = round($model->value - $model->previous, 2);
                        return $res > 0 ? $res . '&nbsp;&nbsp;<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>' : $res . '&nbsp;&nbsp;<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>';
                    }
                ],
            ]
        ]); ?>
    </div>
</div>
