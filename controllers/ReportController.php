<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use app\models\Report;
use app\models\search\Report as ReportSearch;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\Response;
use yii\data\ArrayDataProvider;

class ReportController extends \yii\web\Controller
{
	public function behaviors() {
		return [
				'access' => [
						'class' => AccessControl::className (),
						'ruleConfig' => [
								'class' => AccessRule::className ()
						],
						'rules' => [
								[
										'actions' => [

												'list',
												'save-data',
												'index',
										],
										'allow' => true,
										'roles' => [
												'?',
												'*'
										]
								]
						]
				],
		];
	}

	public function actionList()
    {
    	$filename = '../data/reports.json';
        $data = file_get_contents($filename); //Read the JSON file in PHP
        $array = json_decode($data, true); //Convert JSON String into PHP Array
		$dataProvider = new ArrayDataProvider([
            'allModels' => $array,
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSaveData(){
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;       
        $reports = file_get_contents('../data/reports.json');
        $report_data=json_decode($reports);

        foreach($report_data as $key => $value ) {       	 
         	  	$model = new Report();
         	  	$model->uuid = $value->uuid;
         	  	$model->bank_name = $value->body->bankName; 
                $model->bank_bic = $value->body->bankBIC[0];
                $model->report_score = $value->body->reportScore;
                $model->type = $value->body->type;
                $model->createdAt =  $value->createdAt;
                $model->publishedAt = $value->publishedAt;
                $model->save();
         	  set_time_limit(1000);
        }
      
    }

    public function actionIndex()
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
