<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Instructors $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="instructors-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter First Name']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Middle Name']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Last Name']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'suffix')->textInput(['maxlength' => true, 'placeholder' => 'Suffix']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'gender')->dropDownList([
                'Male' => 'Male', 
                'Female' => 'Female'
            ], ['prompt' => 'Select Gender']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput([
                'type' => 'email',
                'maxlength' => true,
                'placeholder' => 'Enter Email Address',
                'required' => true // Optional: Makes the field required
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Enter Phone Number']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hire_date')->textInput([
                'type' => 'date',
                'placeholder' => 'Enter Hire Date',
                'required' => true // Optional: Makes the field required
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
