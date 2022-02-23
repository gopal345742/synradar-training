<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RepTask;

/**
 * RepTaskSearch represents the model behind the search form of `app\models\RepTask`.
 */
class RepTaskSearch extends RepTask
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'], 
            [['repeated','fk_rep_id', 'fk_task_id', 'fk_emp_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RepTask::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //
        $query->joinWith('fkEmp');
        $query->joinWith('fkRep');
        $query->joinWith('fkTask');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'repeated', $this->repeated])
              ->andFilterWhere(['like', 'Report.rep_title', $this->fk_rep_id])
              ->andFilterWhere(['like', 'Task.task_name', $this->fk_task_id])
              ->andFilterWhere(['like', 'Employee.emp_name', $this->fk_emp_id]);

        return $dataProvider;
    }
}
