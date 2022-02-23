<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectEmp;

/**
 * ProjectEmpSearch represents the model behind the search form of `app\models\ProjectEmp`.
 */
class ProjectEmpSearch extends ProjectEmp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['role','fk_pro_id', 'fk_emp_id'], 'safe'],
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
        $query = ProjectEmp::find();

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
        $query->joinWith('fkPro');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'role', $this->role])
              ->andFilterWhere(['like', 'Employee.emp_name', $this->fk_emp_id])
              ->andFilterWhere(['like', 'Project.pro_name', $this->fk_pro_id]);

        return $dataProvider;
    }
}
