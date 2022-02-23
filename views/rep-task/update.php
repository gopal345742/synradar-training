<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepTask */

$this->title = 'Update Rep Task: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rep Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rep-task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
