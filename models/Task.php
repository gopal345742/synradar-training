<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $task_name
 * @property string|null $task_details
 *
 * @property RepTask[] $repTasks
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_name'], 'required'],
            [['task_name'], 'string', 'max' => 100],
            [['task_details'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Task ID',
            'task_name' => 'Task Name',
            'task_details' => 'Task Details',
        ];
    }

    /**
     * Gets query for [[RepTasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepTasks()
    {
        return $this->hasMany(RepTask::className(), ['fk_task_id' => 'id']);
    }
}
