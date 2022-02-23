<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_emp".
 *
 * @property int $id
 * @property int $fk_pro_id
 * @property int $fk_emp_id
 * @property string|null $role
 *
 * @property Employee $fkEmp
 * @property Project $fkPro
 */
class ProjectEmp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_emp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_pro_id', 'fk_emp_id'], 'required'],
            [['fk_pro_id', 'fk_emp_id'], 'integer'],
            [['role'], 'string', 'max' => 20],
            [['fk_pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['fk_pro_id' => 'id']],
            [['fk_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fk_emp_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ProEmp ID',
            'fk_pro_id' => 'Project Name',
            'fk_emp_id' => 'Employee Name',
            'role' => 'Employee Role',
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
}
