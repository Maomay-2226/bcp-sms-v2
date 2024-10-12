<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'course_id')->dropDownList($model->courses, ['prompt' => 'Select Course']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Subject Name']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'subject_code')->textInput(['maxlength' => true, 'placeholder' => 'Enter Subject Code']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 4, 'placeholder' => 'Enter Subject Description']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'credits')->textInput(['placeholder' => 'Enter Credits']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
