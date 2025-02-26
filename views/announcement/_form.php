<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use dosamigos\tinymce\TinyMce;

/** @var yii\web\View $this */
/** @var app\models\Announcement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="announcement-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'announcement')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'en',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]);?>
        </div>
        <div class="col-md-6">
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
