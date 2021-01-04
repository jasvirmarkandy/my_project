<?php

namespace app\modules\api\controllers;

use app\modules\api\components\ApiTxController;
use Yii;
use yii\data\ActiveDataProvider;

class ReportController extends ApiTxController
{
	 public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = [
            'report-list',  
            'list',     
        ];
        
        return $behaviors;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['get'] = [
            'GET'
        ];
        return $verbs;
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReportList()
    {
    	$data = [];
        $reports = file_get_contents('../data/reports.json');
        $report_data=json_decode($reports,true);
        foreach($report_data as $key => $value) {
           $data[$key] = $value;
        }
        $data['status'] = self::API_OK;
        $this->response = $data;
    }
    public function actionList($page = null)
    {
        $data = [];
        $searchmodel = new \app\models\search\Report();
        $dataProvider = $searchmodel->search(\Yii::$app->request->queryParams, false, $page);
        
        if ($dataProvider->getCount() > 0) {
            foreach ($dataProvider->models as $model) {
                $list[] = $model->asJson();
            }
            
            $data['pageCount'] = $dataProvider->pagination->pageCount;
            $data['pageNumber'] = $dataProvider->pagination->page;
            $data['status'] = self::API_OK;
            $data['detail'] = $list;
        } else {
            $data['error'] = "No record found";
        }
        
        $this->response = $data;
    }

}
