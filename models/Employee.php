<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $emp_name
 * @property string|null $emp_details
 * @property int|null $fk_dept_id
 *
 * @property Department $fkDept
 * @property ProjectEmp[] $projectEmps
 * @property RepTask[] $repTasks
 * @property Report[] $reports
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_name','fk_dept_id'], 'required'],
            [['fk_dept_id'], 'integer'],
            [['emp_name'], 'string', 'max' => 100],
            [['emp_details'], 'string', 'max' => 200],
            [['fk_dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['fk_dept_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Employee ID',
            'emp_name' => 'Employee Name',
            'emp_details' => 'Employee Details',
            'fk_dept_id' => 'Department Name',
        ];
    }

    /**
     * Gets query for [[FkDept]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'fk_dept_id']);
    }

    /**
     * Gets query for [[ProjectEmps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectEmps()
    {
        return $this->hasMany(ProjectEmp::className(), ['fk_emp_id' => 'id']);
    }

    /**
     * Gets query for [[RepTasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepTasks()
    {
        return $this->hasMany(RepTask::className(), ['fk_emp_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['fk_emp_id' => 'id']);
    }
}
