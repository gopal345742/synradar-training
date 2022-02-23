<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectEmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Emps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-emp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project Emp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'fk_pro_id',
                'value'=>'fkPro.pro_name',
            ],
            [
                'attribute'=>'fk_emp_id',
                'value'=>'fkEmp.emp_name',
            ],
            'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
