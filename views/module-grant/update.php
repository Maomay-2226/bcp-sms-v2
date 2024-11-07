<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Update: ' . $model->module_description;
$this->params['breadcrumbs'][] = ['label' => 'Module Grants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->module_description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-grant-update">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
