<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="module-grant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'module_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condition_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_open')->textInput() ?>

    <?= $form->field($model, 'date_close')->textInput() ?>

    <?= $form->field($model, 'is_requested')->dropDownList([ 'No' => 'No', 'Yes' => 'Yes', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_approved')->dropDownList([ 'No' => 'No', 'Yes' => 'Yes', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'module_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
