<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="module-grant-form">
    <div class="row">
            <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'module_list_id')->dropDownList($model->moduleLists, ['prompt' => 'Select Subject']) ?>

            <div class="row">
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
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'is_requested')->dropDownList([ 'No' => 'No', 'Yes' => 'Yes', ], ['prompt' => 'Select', 'value' => 'Yes']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'is_approved')->dropDownList([ 'No' => 'No', 'Yes' => 'Yes', ], ['prompt' => 'Select']) ?>
                </div>
            </div>

            <?= $form->field($model, 'student_id')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
