<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$this->registerJs(
   '$("document").ready(function(){ 
		$("#country_search").on("pjax:end", function() {
			$.pjax.reload({container:"#countries"}); 
		});
    });'
);
?>

<div class="countries-search">

    <?php yii\widgets\Pjax::begin(['id' => 'country_search']) ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true ],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
