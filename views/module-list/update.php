<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleList $model */

$this->title = 'Update Module: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Module ID: '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-list-update">

<h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
