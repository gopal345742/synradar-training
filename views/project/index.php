<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Employee;
use app\models\ProjectEmp;
use app\models\Report;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'pro_name',
            'pro_type',
            [
                'attribute'=>'Project By',
                'format'=>'raw',
                'value' => function ($model) {   
                    //get all the rows with the same project id
                    $assignEmpModel = ProjectEmp::find()->where(['fk_pro_id' => $model->id])->all(); 
                    
                    $employees = ''; //empty string
                    foreach ( $assignEmpModel as $employee ) {
                        //get all the employee_id 
                        $emp = Employee::find()->where(['id'=>$employee->fk_emp_id])->one(); 
                        
                        $name = $emp['emp_name']; //get the employee_name from the employees table
                        $employees .= ' '.$name.', '; //concatenate the names.
    
                    }
                    return $employees;
                },
            ],
            [
                'attribute'=>'Reports',
                'format'=>'raw',
                'value' => function ($model) {   
                    //get all the reports with the same project id
                    $assignRepModel = Report::find()->where(['fk_pro_id' => $model->id])->all(); 
                    
                    $reports = ''; //empty string
                    foreach ( $assignRepModel as $report ) {
                        //get all the report_id 
                        $rep = Report::find()->where(['id'=>$report->id])->one(); 
                        
                        $title = $rep['rep_title']; //get the rep_title from the report table
                        $reports .= ' '.$title.', '; //concatenate the titles.
    
                    }
                    return $reports;
                },
            ],
            [
                'attribute'=>'Reports By',
                'format'=>'raw',
                'value' => function ($model) {   
                    //get all the reports with the same project id
                    $assignRepModel = Report::find()->where(['fk_pro_id' => $model->id])->all(); 
                    
                    $employees = ''; //empty string
                    foreach ( $assignRepModel as $employee ) {
                        //get all the employee_id with same report id
                        $emp = Employee::find()->where(['id'=>$employee->fk_emp_id])->one(); 
                        
                        $name = $emp['emp_name']; //get the employee_name from the employees table
                        $employees .= ' '.$name.', '; //concatenate the names.
    
                    }
                    return $employees;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
