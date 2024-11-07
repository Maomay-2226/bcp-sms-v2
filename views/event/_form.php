<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Event $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="event-form">

    <div class="row">
            <div class="col-md-6">
                
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date')->textInput([
                'type' => 'date',
                'placeholder' => 'Enter Date',
                'required' => true // Optional: Makes the field required
            ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
