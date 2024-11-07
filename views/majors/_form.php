<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Majors $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="majors-form">
    <div class="row">
        <div class="col-md-6">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'course_id')->dropDownList($model->courses, ['prompt' => 'Select Course']) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
