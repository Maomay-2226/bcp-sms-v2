<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentPermit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-permit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enrollment_id')->textInput() ?>

    <?= $form->field($model, 'dp')->textInput() ?>

    <?= $form->field($model, 'prelim')->textInput() ?>

    <?= $form->field($model, 'midterm')->textInput() ?>

    <?= $form->field($model, 'final')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
