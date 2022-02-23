<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepTaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rep Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rep Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $this->render('_index', ['searchModel'=>$searchModel, 'dataProvider'=>$dataProvider]); ?>


</div>
