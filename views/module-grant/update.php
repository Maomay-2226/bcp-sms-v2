<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Update Request: ' . $model->moduleList->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->moduleList->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-grant-update">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
