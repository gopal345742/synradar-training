<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rep_task".
 *
 * @property int $id
 * @property int $fk_rep_id
 * @property int $fk_task_id
 * @property int $fk_emp_id
 * @property string|null $repeated
 *
 * @property Employee $fkEmp
 * @property Report $fkRep
 * @property Task $fkTask
 */
class RepTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rep_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_rep_id', 'fk_task_id', 'fk_emp_id','repeated'], 'required'],
            [['fk_rep_id', 'fk_task_id', 'fk_emp_id'], 'integer'],
            [['repeated'], 'string'],
            [['fk_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fk_emp_id' => 'id']],
            [['fk_task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['fk_task_id' => 'id']],
            [['fk_rep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Report::className(), 'targetAttribute' => ['fk_rep_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'RepTask ID',
            'fk_rep_id' => 'Report Name',
            'fk_task_id' => 'Task Name',
            'fk_emp_id' => 'Employee Name',
            'repeated' => 'Repeated', 
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
     * Gets query for [[FkRep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkRep()
    {
        return $this->hasOne(Report::className(), ['id' => 'fk_rep_id']);
    }

    /**
     * Gets query for [[FkTask]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'fk_task_id']);
    }
}
