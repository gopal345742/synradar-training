<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_name')->textInput(['maxlength' => true]) ?>

    <?php //echo \app\components\GHtml::enumDropDownList($model, 'pro_type', ['prompt' => 'Type of Project']); ?>
    <?php echo $form->field($model, 'pro_type')->dropDownList(\app\components\GHtml::enumItem($model, 'pro_type'), ['prompt' => 'Type of Project']); ?>
    <?php //echo $form->field($model, 'pro_type')->dropDownList([ 'One Time' => 'One Time', 'Monthly' => 'Monthly', ], ['prompt' => 'Type of Project']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
