<?php

 

/**
* This is the model class for table "tbl_report".
*
    * @property integer $id
    * @property string $uuid
    * @property string $bank_name
    * @property string $bank_bic
    * @property double $report_score
    * @property string $type
    * @property string $createdAt
    * @property string $publishedAt
*/

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

class Report extends \yii\db\ActiveRecord
{
	public  function __toString()
	{
		return (string)$this->uuid;
	}


	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return '{{tbl_report}}';
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
            [['uuid', 'bank_name', 'bank_bic', 'report_score', 'type', 'createdAt', 'publishedAt'], 'required'],
            [['report_score'], 'number'],
            [['uuid', 'bank_name', 'bank_bic', 'type', 'createdAt', 'publishedAt'], 'string', 'max' => 255],
        ];
	}

	/**
	* @inheritdoc
	*/


	public function attributeLabels()
	{
		return [
				    'id' => Yii::t('app', 'ID'),
				    'uuid' => Yii::t('app', 'Uuid'),
				    'bank_name' => Yii::t('app', 'Bank Name'),
				    'bank_bic' => Yii::t('app', 'Bank Bic'),
				    'report_score' => Yii::t('app', 'Report Score'),
				    'type' => Yii::t('app', 'Type'),
				    'createdAt' => Yii::t('app', 'Created At'),
				    'publishedAt' => Yii::t('app', 'Published At'),
				];
	}
    public static function getHasManyRelations()
    {
    	$relations = [];
		return $relations;
	}
    public static function getHasOneRelations()
    {
    	$relations = [];
		return $relations;
	}

	public function beforeDelete() {
		return parent::beforeDelete ();
	}

    public function asJson($with_relations=false)
	{
		$json = [];
			$json['id'] 	= $this->id;
			$json['uuid'] 	= $this->uuid;
			$json['bank_name'] 	= $this->bank_name;
			$json['bank_bic'] 	= $this->bank_bic;
			$json['report_score'] 	= $this->report_score;
			$json['type'] 	= $this->type;
			$json['createdAt'] 	= $this->createdAt;
			$json['publishedAt'] 	= $this->publishedAt;
			if ($with_relations)
		    {
			}
		return $json;
	}
	
	
}
