<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Announcement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="announcement-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'announcement')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'date_to_post')->textInput([
                'type' => 'datetime-local',
                'placeholder' => 'Enter Posting Date',
                'required' => true // Optional: Makes the field required
            ]) ?>
            <?= $form->field($model, 'date_to_expire')->textInput([
                'type' => 'datetime-local',
                'placeholder' => 'Enter Posting Expire Date',
                'required' => true // Optional: Makes the field required
            ]) ?>
            <?= $form->field($model, 'type')->dropDownList([ 'file' => 'File', 'text' => 'Text', ], ['prompt' => '']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
