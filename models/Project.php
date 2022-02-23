<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $pro_name
 * @property string|null $pro_type
 *
 * @property ProjectEmp[] $projectEmps
 * @property Report[] $reports
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_name','pro_type'], 'required'],
            [['pro_type'], 'string'],
            [['pro_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Project ID',
            'pro_name' => 'Project Name',
            'pro_type' => 'Project Type',
        ];
    }

    /**
     * Gets query for [[ProjectEmps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectEmps()
    {
        return $this->hasMany(ProjectEmp::className(), ['fk_pro_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['fk_pro_id' => 'id']);
    }
}
