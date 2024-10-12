<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Students $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header bg-info ">Student Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($model, 'suffix')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'gender')->dropDownList([
                                        'Male' => 'Male', 
                                        'Female' => 'Female',
                                    ], ['prompt' => 'Select Gender']) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'date_of_birth')->textInput([
                                        'type' => 'date',
                                        'required' => true
                                    ]) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'enrollment_date')->textInput([
                                        'type' => 'date',
                                        'required' => true
                                    ]) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $form->field($model, 'status')->dropDownList([
                                        'active' => 'Active', 
                                        'inactive' => 'Inactive',
                                    ], ['prompt' => 'Select Status']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header bg-info ">Capture   Image</div>
                <div class="card-body">
                    <div class="border rounded" style="height: 200px;border: 2px dashed #b6b6b6 !important;">
                    </div>
                    <span class="btn btn-primary btn-sm mt-2 btn-block"><i class="fa fa-camera"></i> <b>CAPTURE</b></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save Information', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
