<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property string $rep_title
 * @property int|null $fk_pro_id
 * @property int|null $fk_emp_id
 *
 * @property Employee $fkEmp
 * @property Project $fkPro
 * @property RepTask[] $repTasks
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rep_title','fk_pro_id','fk_emp_id'], 'required'],
            [['fk_pro_id', 'fk_emp_id'], 'integer'],
            [['rep_title'], 'string', 'max' => 200],
            [['fk_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fk_emp_id' => 'id']],
            [['fk_pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['fk_pro_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Report ID',
            'rep_title' => 'Report Title',
            'fk_pro_id' => 'Project Name',
            'fk_emp_id' => 'Employee Name',
        ];
    }

    /**
     * Gets query for [[FkEmp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkEmp()
    {
        return $this->hasOne(Employee::className(), ['id' => 'fk_emp_id']);
    }

    /**
     * Gets query for [[FkPro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPro()
    {
        return $this->hasOne(Project::className(), ['id' => 'fk_pro_id']);
    }

    /**
     * Gets query for [[RepTasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepTasks()
    {
        return $this->hasMany(RepTask::className(), ['fk_rep_id' => 'id']);
    }
}
 