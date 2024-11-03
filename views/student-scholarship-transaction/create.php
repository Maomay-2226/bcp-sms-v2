<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentScholarshipTransaction $model */

$this->title = 'Create Student Scholarship Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Student Scholarship Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-scholarship-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
