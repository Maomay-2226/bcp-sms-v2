<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentGuardian $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-guardian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'guardian_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother_contact')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
