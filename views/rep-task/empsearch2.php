<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepTaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report & Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-task-empsearch">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search2', ['model' => $searchModel]); ?>

<?php Pjax::begin(['id' => 'emp2']) ?>

    <?php echo $this->render('_index', ['searchModel'=>$searchModel, 'dataProvider'=>$dataProvider]); ?>

<?php Pjax::end() ?>

</div>