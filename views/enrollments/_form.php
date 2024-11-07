<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Enrollments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="enrollments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'major_id')->textInput() ?>

    <?= $form->field($model, 'academic_year')->textInput() ?>

    <?= $form->field($model, 'section_id')->textInput() ?>

    <?= $form->field($model, 'semester')->dropDownList([ '1st' => '1st', '2nd' => '2nd', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList([ 'College' => 'College', 'SHS' => 'SHS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'admission_type')->dropDownList([ 'Regular' => 'Regular', 'Scholarship' => 'Scholarship', 'Continuing' => 'Continuing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'modality')->dropDownList([ 'Face-to-Face' => 'Face-to-Face', 'Online' => 'Online', 'Hybrid' => 'Hybrid', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'branch')->dropDownList([ 'Main Branch' => 'Main Branch', 'Bulacan' => 'Bulacan', 'MV' => 'MV', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
