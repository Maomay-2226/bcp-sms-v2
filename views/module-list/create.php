<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleList $model */

$this->title = 'Create Module';
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-list-create">

<h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
