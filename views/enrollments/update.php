<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Enrollments $model */

$this->title = 'Update Enrollments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enrollments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
