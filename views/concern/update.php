<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concern $model */

$this->title = 'Update Concern: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concerns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concern-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
