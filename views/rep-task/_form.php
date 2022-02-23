<?php

use app\models\Employee;
use app\models\Report;
use app\models\Task;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepTask */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$this->registerJs(
   '$("document").ready(function(){ 
		$("#new_emp").on("pjax:end", function() {
			$.pjax.reload({container:"#emp"});  //Reload GridView
		});
    });'
);
?>

<div class="rep-task-form">

<?php yii\widgets\Pjax::begin(['id' => 'new_emp']) ?>
<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <?= $form->field($model, 'fk_rep_id')->dropDownList(ArrayHelper::map(Report::find()->all(),
    'id','rep_title'), ['prompt'=>'Select Report']) ?>

    <?= $form->field($model, 'fk_task_id')->dropDownList(ArrayHelper::map(Task::find()->all(),
    'id','task_name'), ['prompt'=>'Select Task']) ?>

    <?= $form->field($model, 'fk_emp_id')->dropDownList(ArrayHelper::map(Employee::find()->all(),
    'id','emp_name'), ['prompt'=>'Select Employee']) ?>

    <?= $form->field($model, 'repeated')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => 'Yes/No']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>

</div>
