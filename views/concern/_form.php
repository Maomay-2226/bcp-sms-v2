<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Concern $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="concern-form">
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'student_id')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'concern_type_id')->dropDownList($model->concernTypes, ['prompt' => 'Select Type']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'date')->textInput([
                        'type' => 'date',
                        'placeholder' => 'Enter Date',
                        'required' => true // Optional: Makes the field required
                    ]) ?>
                </div>
            </div>

            <?= $form->field($model, 'message')->textarea(['rows' => 3]) ?>
            <?= $form->field($model, 'answer')->textarea(['rows' => 3]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
