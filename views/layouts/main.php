<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Menu;  //for using menu widget

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<style>
    .activeNew, .active{
        font-weight: bold;
    }
    .activeNew{
        font-style: italic;
    }
    .mylink{
        color: black;
    }
    .yourlink{
        color: #f00;
    }
    .coloredul{
        background-color: yellow;
    }
    .first-menu, .first-menu a{
        color: green;
    }
    .last-menu, .last-menu a{
        color: red;
    }
</style>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
<div class="container">
    <div class="row">
    <div class="col-md-2">
    <?php
    NavBar::begin([
        'brandLabel' => 'Nav List',
        'brandUrl' => '', //Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar sidebar-expand-md navbar-dark bg-dark fixed-left',
                ],
            ]);
    echo Nav::widget([
        'options' => ['class' => 'nav-pills nav-stacked'],
        'items' => [
            ['label' => 'Department', 'url' => ['/department/index']],
            ['label' => 'Employee', 'url' => ['/employee/index']],
            ['label' => 'Project', 'url' => ['/project/index']],
            ['label' => 'Report', 'url' => ['/report/index']],
            ['label' => 'Task', 'url' => ['/task/index']],
            ['label' => 'ProjectEmp', 'url' => ['/project-emp/index']],
            ['label' => 'RepTask', 'url' => ['/rep-task/index']],
        ],
    ]);
    NavBar::end();
    ?>

    <hr> <!-- for gap in both menu -->

    <?php //Menu widget separate from navbar
    echo Menu::widget([
        //'activeCssClass'=>'activeNew',    //changing active class CSS
        'itemOptions'=> ['tag' => 'div'],  //tag for each menu item
        //'submenuTemplate' => "\n<ul>\n{items}\n</ul>\n",   //template for submenu
        'linkTemplate' => '<li><a class="yourlink" href="{url}">{label}</a></li>',   //template for links
        //labelTemplate only applied to labels which don't have any URL
        'labelTemplate' => '<div class="mylink">{label}</div>',      //template for labels only
        //activateItems by deafault set to true
        //'activateItems' => false,  //if false active css class will not apply
        //activateParents by default set to false
        //'activateParents' => true,  //if submenu class is active, parent will also be active
        //hideEmptyItems by default set to false
        //'hideEmptyItems' => true,  //use to hide items if url in not present and child set to hidden
        'options' => ['tag' => 'ul class="coloredul"'],  //html options for menu container
        //'firstItemCssClass' => 'first-menu',   //setting css for first menu
        //'lastItemCssClass' => 'last-menu',     //setting css for last menu
        'items'=> [
            ['label' => 'Navigation List',],
            //'label' => 'label name',
            //'url' => ['/j/k'],
            //'active' => true/false,
            //'visible' => true/false,
            //'options' => [class='hello'],
            //'template' => '<a href="{url}" class="first-link">{label}</a>',
            //'submenuTemplate' =>
            ['label' => 'Department', 'url' => ['/department/index']],
            ['label' => 'Employee', 'url' => ['/employee/index']],
            ['label' => 'Project', 'url' => ['/project/index']],
            ['label' => 'Report', 'url' => ['/report/index']],
            ['label' => 'Task', 'url' => ['/task/index']],
            ['label' => 'ProjectEmp', 'url' => ['/project-emp/index']],
            ['label' => 'RepTask', 'url' => ['/rep-task/index']],
            ['label' => 'Countries Example', 'url' => ['/countries/index']],
            ['label' => 'Emp Search', 'url' => ['/rep-task/empsearch']],
            ['label' => 'Emp Search 2', 'url' => ['/rep-task/empsearch2']],
        ],
    ]);
    ?> 

    </div>
      <div class="col-md-10">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
      </div>
    </div>
</div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
