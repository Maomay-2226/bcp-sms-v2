<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentScholarshipTransaction $model */

$this->title = 'Update Student Scholarship Transaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Scholarship Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-scholarship-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
