<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepTask */

$this->title = 'Create Rep Task';
$this->params['breadcrumbs'][] = ['label' => 'Rep Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
