<?php

use app\models\Employee;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectEmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-emp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_pro_id')->dropDownList(ArrayHelper::map(Project::find()->all(),
    'id','pro_name'), ['prompt'=>'Select Project']) ?>

    <?= $form->field($model, 'fk_emp_id')->dropDownList(ArrayHelper::map(Employee::find()->all(),
    'id','emp_name'), ['prompt'=>'Select Employee']) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
