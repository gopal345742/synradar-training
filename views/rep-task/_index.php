<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepTaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="rep-task-index-gridview">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'fk_rep_id',
                'value'=>'fkRep.rep_title',
            ],
            [
                'attribute'=>'fk_task_id',
                'value'=>'fkTask.task_name',
            ],
            [
                'attribute'=>'fk_emp_id',
                'value'=>'fkEmp.emp_name',
            ],
            'repeated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
