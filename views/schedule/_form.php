<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Schedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-form">
    <div class="row">
        <div class="col-md-6">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'subject_id')->dropDownList($model->subjects, ['prompt' => 'Select Subject']) ?>

            <?= $form->field($model, 'instructor_id')->dropDownList($model->instructors, ['prompt' => 'Select Instructor']) ?>

            <?= $form->field($model, 'day_of_week')->dropDownList([ 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday', ], ['prompt' => '']) ?>
            
            <?= $form->field($model, 'start_time')->input('time') ?>

            <?= $form->field($model, 'end_time')->input('time') ?>

            <?= $form->field($model, 'room_no')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
