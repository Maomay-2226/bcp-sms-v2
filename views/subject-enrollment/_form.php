<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SubjectEnrollment $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="subject-enrollment-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-info "><?= Html::encode($this->title) ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm mb-3">
                        <tr>
                            <th>Student Name</th>
                            <td><?= $model->student->fullname ?></td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td><?= $model->subject->subject_name ?></td>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <td><?= $model->subject->subject_code ?></td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td><?= $model->subject->credits ?></td>
                        </tr>
                        <tr>
                            <th>Day</th>
                            <td><?= $model->schedule->day_of_week ?></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td><?= date('h:i A', strtotime($model->schedule->start_time)) . ' - ' . date('h:i A', strtotime($model->schedule->end_time)) ?></td>
                        </tr>
                        <tr>
                            <th>Room</th>
                            <td><?= $model->schedule->room_no ?></td>
                        </tr>
                        <tr>
                            <th>Instructor</th>
                            <td><?= $model->schedule->instructor->fullname ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'status')->dropDownList([ 'Passed' => 'Passed', 'Failed' => 'Failed', ], ['prompt' => 'Select']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
