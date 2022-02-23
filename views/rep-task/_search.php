<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepTaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJs(
   '$("document").ready(function(){ 
		$("#emp_search").on("pjax:end", function() {
			$.pjax.reload({container:"#emp"});  
		});
    });'
);
?>

<div class="rep-task-search">

<?php yii\widgets\Pjax::begin(['id' => 'emp_search']) ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true ],
        'action' => ['empsearch'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fk_emp_id') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!-- Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) -->
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
