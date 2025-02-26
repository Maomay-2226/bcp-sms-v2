<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SubjectEnrollment $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="enrollments-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-info "><?= Html::encode($this->title) ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm mb-3">
                        <tr class=""> 
                            <th>Academic Year</th>
                            <td><?= ($model->academic_year) ? $model->academic_year : '-'  ?></td>
                        </tr>
                        <tr>
                            <th>Year & Semester</th>
                            <td>
                                <?php 
                                    $year_arr = [1=>'1st',2=>'2nd',3=>'3rd',4=>'4th',5=>'5th'];
                                    echo ($model->section) ? '<b>'.$year_arr[$model->section->year].'</b> Year, <b>'.$model->semester.'</b> Semester' : '-';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td><?= ($model->course) ? $model->course->course_code : '-' ?></td>
                        </tr>
                        <tr>
                            <th>Major</th>
                            <td><?= ($model->major) ? $model->major->description : '-' ?></td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td><?= ($model->section) ? $model->section->code : '-' ?></td>
                        </tr>
                        <?php if(Yii::$app->controller->action->id == 'update-status') :?>
                        <tr>
                            <th>Grading Status</th>
                            <td><?= ($model->grading_status) ? $model->grading_status : '-' ?></td>
                        </tr>
                        <tr>
                            <th>Grade</th>
                            <td><?= ($model->grade) ? $model->grade : '-' ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <div class="row">
                        <?php if(Yii::$app->controller->action->id == 'update') :?>
                            <div class="col-md-6">
                                <?= $form->field($model, 'grading_status')->dropDownList([ 'Passed' => 'Passed', 'Failed' => 'Failed', ], ['prompt' => 'Select']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>
                            </div>
                        <?php elseif(Yii::$app->controller->action->id == 'update-status') :?>
                            <div class="col-md-12">
                                <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => 'Select']) ?>
                            </div>
                        <?php endif; ?>
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
