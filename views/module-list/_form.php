<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ModuleList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="module-list-form">
    <div class="row">
        <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date_open')->textInput([
                        'type' => 'date',
                        'placeholder' => 'Enter Date Open',
                        'required' => true // Optional: Makes the field required
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date_close')->textInput([
                        'type' => 'date',
                        'placeholder' => 'Enter Date Close',
                        'required' => true // Optional: Makes the field required
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'subject_id')->dropDownList($model->subjects, ['prompt' => 'Select Subject']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'link')->textInput(['max' => 255]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'instruction')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
