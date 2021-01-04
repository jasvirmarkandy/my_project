<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\Report $searchModel
 */

?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions'=>['class'=>'table table-bordered'],
        'columns' => [
            'uuid',
       [
        'attribute' => 'bank_name',
        'format'=>'raw',
        'value' => 'body.bankName',
       ],
        [
        'attribute' => 'bank_bic',
        'format'=>'raw',
        'value' => function ($data) { 
          return $data['body']['bankBIC'][0]; 
        },
       ],
        [
        'attribute' => 'report_score',
        'format'=>'raw',
        'value' => 'body.reportScore',
       ],
       [
        'attribute' => 'type',
        'format'=>'raw',
        'value' => 'body.type',
       ],
            'createdAt',
            'publishedAt',
        ],
    ]); ?>


