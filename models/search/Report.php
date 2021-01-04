<?php
namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report as ReportModel;

/**
 * Report represents the model behind the search form about `app\models\Report`.
 */
class Report extends ReportModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['id'], 'integer'],
           [['uuid', 'bank_name', 'bank_bic', 'type', 'createdAt', 'publishedAt'], 'safe'],
           [['report_score'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    // public function beforeValidate(){
    //         return true;
    // }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ReportModel::find();

		        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
						'defaultOrder' => [
								'id' => SORT_ASC
						]
				]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'report_score' => $this->report_score,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'bank_bic', $this->bank_bic])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'createdAt', $this->createdAt])
            ->andFilterWhere(['like', 'publishedAt', $this->publishedAt]);

        return $dataProvider;
    }
}
