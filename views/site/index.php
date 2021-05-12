<?php

/**
 * @var $this yii\web\View
 * @var $rates RateProvider;
 */

use app\providers\RateProvider;
use yii\grid\GridView;

$this->title = 'Exchange rates';
?>
<div class="site-index">
    <div class="body-content">

        <h1>Курсы валют ЦБ РФ на <?=Yii::$app->formatter->asDate('now', 'dd.MM.YYYY')?></h1>
        <?php echo GridView::widget([
            'dataProvider' => $rates,
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
