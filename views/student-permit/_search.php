<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentPermitSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-permit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'enrollment_id') ?>

    <?= $form->field($model, 'dp') ?>

    <?= $form->field($model, 'prelim') ?>

    <?= $form->field($model, 'midterm') ?>

    <?php // echo $form->field($model, 'final') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
