<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\Report $searchModel
 */

?>
<?php Pjax::begin(['id'=>'report-pjax-grid']); ?>
    <?php echo GridView::widget([
    	'id' => 'report-grid-view',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'<a>S.No.<a/>'],

            'id',
            'uuid',
            'bank_name',
            'bank_bic',
            'report_score',
            'type',
            'createdAt',
            'publishedAt',
        ],
    ]); ?>
<?php Pjax::end(); ?>

