<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectEmp */

$this->title = 'Create Project Emp';
$this->params['breadcrumbs'][] = ['label' => 'Project Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-emp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
