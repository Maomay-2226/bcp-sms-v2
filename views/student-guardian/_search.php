<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentGuardianSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-guardian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'guardian_fname') ?>

    <?= $form->field($model, 'guardian_mname') ?>

    <?= $form->field($model, 'guardian_lname') ?>

    <?php // echo $form->field($model, 'guardian_contact') ?>

    <?php // echo $form->field($model, 'guardian_occupation') ?>

    <?php // echo $form->field($model, 'father_fname') ?>

    <?php // echo $form->field($model, 'father_mname') ?>

    <?php // echo $form->field($model, 'father_lname') ?>

    <?php // echo $form->field($model, 'father_contact') ?>

    <?php // echo $form->field($model, 'mother_fname') ?>

    <?php // echo $form->field($model, 'mother_mname') ?>

    <?php // echo $form->field($model, 'mother_lname') ?>

    <?php // echo $form->field($model, 'mother_contact') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
