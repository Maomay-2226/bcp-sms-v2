<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Update Module Grant: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Module Grants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-grant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
