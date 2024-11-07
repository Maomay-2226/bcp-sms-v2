<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sections $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sections-form">
<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'year')->dropDownList([ '1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4th'], ['prompt' => 'Select Year']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'semester')->dropDownList([ '1st' => '1st', '2nd' => '2nd', ], ['prompt' => 'Select Semester']) ?>
            </div>
        </div>
        <?= $form->field($model, 'instructor_id')->dropDownList($model->instructors, ['prompt' => 'Select Instructor']) ?>

        <?= $form->field($model, 'course_id')->dropDownList($model->courses, ['prompt' => 'Select Course']) ?>

        <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>
