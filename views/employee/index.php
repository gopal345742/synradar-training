<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'emp_name',
            [
                'attribute' => 'emp_name',
                'format' => 'raw',
                'value' => function ($model) {
                     return Html::a($model->emp_name,['employee/view','id'=>$model->id]);
                },
            ],
            'emp_details',
            //'emp_name->',
            [
                'attribute'=>'fk_dept_id',
                'value'=>'fkDept.dept_name',
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}', ],
        ],
    ]); ?>


</div>
