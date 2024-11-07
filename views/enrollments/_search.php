<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EnrollmentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="enrollments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'major_id') ?>

    <?= $form->field($model, 'academic_year') ?>

    <?php // echo $form->field($model, 'section_id') ?>

    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'admission_type') ?>

    <?php // echo $form->field($model, 'modality') ?>

    <?php // echo $form->field($model, 'branch') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
