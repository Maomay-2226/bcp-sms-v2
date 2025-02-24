<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;
/** @var yii\web\View $this */
/** @var app\models\Students $model */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    <h5>
        <?= Html::a('<i class="fa fa-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-info">Student Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <?= DetailView::widget([
                                'model' => $model,
                                'options' => ['class' => 'table table-bordered table-sm', 'style' => 'background-color: white'],
                                'attributes' => [
                                    'id',
                                    'first_name',
                                    'middle_name',
                                    'last_name',
                                    'suffix',
                                    'gender',
                                    'date_of_birth:date',
                                    'email:email',
                                    'phone',
                                    'enrollment_date:date',
                                    [
                                        'attribute' => 'status',
                                        'format' => 'raw',
                                        'value' => function($model){
                                            return $model->status === 'active' ? '<span class="badge badge-success">'.strtoupper($model->status).'</span>' : '<span class="badge badge-secondary">'.strtoupper($model->status).'</span>';
                                        }
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="col-md-3">
                            <?php
                                $builder = new Builder(
                                    writer: new PngWriter(),
                                    writerOptions: [],
                                    validateResult: false,
                                    data: 'Student ID: '.$model->id.', Name: '.$model->fullname,
                                    encoding: new Encoding('UTF-8'),
                                    errorCorrectionLevel: ErrorCorrectionLevel::High,
                                    size: 250,
                                    margin: 10,
                                    roundBlockSizeMode: RoundBlockSizeMode::Margin,
                                    logoPath: 'uploads/bcp-logo.png',
                                    logoResizeToWidth: 30,
                                    logoPunchoutBackground: true,
                                    // labelText: 'This is the label',
                                    labelFont: new OpenSans(20),
                                    labelAlignment: LabelAlignment::Center
                                );
                                
                                $result = $builder->build();
                                $result->saveToFile('uploads/qrcode/'.$model->id.'.png');
                            ?>
                            <?= Html::img('@web/uploads/qrcode/'.$model->id.'.png', ['style' => 'border: 2px dashed #b6b6b6 !important;']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md 12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Submitted Requirements 
                            <button type="button" class="btn btn-dark btn-xs float-right" data-toggle="modal" data-target=".attachments-modal"><i class="fa fa-paperclip"></i></button>
                        </div>
                        <div class="card-body">
                            <?php if($model->uploadedFiles) : ?>
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Filename</th>
                                            <th>Type</th>
                                            <th>Date Uploaded</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        <?php foreach ($model->uploadedFiles as $key => $file) : ?>
                                            <tr>
                                                <td class="text-center"><?= $count ?></td>
                                                <td><?= $file->filename ?></td>
                                                <td><?= strtoupper($file->extension) ?></td>
                                                <td><?= date('F d, Y', strtotime($file->date_uploaded)) ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                    $fileUrl = Yii::getAlias('@web/uploads/files/' . $file->filename);
                                                    echo Html::a('<span class="btn btn-success btn-sm"><i class="fa fa-download"></i></span>', $fileUrl, [
                                                        'title' => 'Download this file',
                                                        'target' => '_blank', // Open in a new tab (optional)
                                                        // 'download' => $file->filename, // Use this attribute to force download
                                                    ]);?>
                                                </td>
                                            </tr>
                                        <?php $count++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-center">- NO ATTACHMENT FOUND -</p>
                            <?php endif ; ?>
                        </div>
                    </div>
                    <div class="modal fade attachments-modal" tabindex="-1" role="dialog" aria-labelledby="attachmentModal" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content p-3">
                            <h5><b>Attach Files</b></h5>
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                            <p>
                                
                                <?php
                                echo $form->field($model, 'fileUploads[]')->widget(FileInput::classname(), [
                                    // 'options' => ['accept' => 'image/*'],
                                    'options' => ['multiple' => true],
                                    'pluginOptions' => [
                                        'showRemove' => false,
                                        'showUpload' => false,
                                        'showCancel' => false,
                                    ]
                                ]);
                            ?></p>
                            <p><button class="btn btn-md btn-success">Upload</button></p>
                            <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md 12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Active Enrollment Information
                            <button type="button" class="btn btn-dark btn-xs float-right" data-toggle="modal" data-target=".enrollment-modal"><i class="fa fa-<?= $enrolled_flag ? 'edit' : 'plus' ?>"></i></button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tr class="thead-light">
                                    <th>Academic Year</th>
                                    <th>Year & Semester</th>
                                    <th>Course</th>
                                    <th>Major</th>
                                    <th>Section</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Final Grade</th>
                                </tr>
                                <tr>
                                    <?php 
                                        $year_arr = [1=>'1st',2=>'2nd',3=>'3rd',4=>'4th',5=>'5th'];
                                    ?>
                                    <td><?= ($modelEnrollment->academic_year) ? $modelEnrollment->academic_year : '-'  ?></td>
                                    <td><?= ($modelEnrollment->section) ? '<b>'.$year_arr[$modelEnrollment->section->year].'</b> Year, <b>'.$modelEnrollment->semester.'</b> Semester' : '-' ?></td>
                                    <td><?= ($modelEnrollment->course) ? $modelEnrollment->course->course_code : '-' ?></td>
                                    <td><?= ($modelEnrollment->major) ? $modelEnrollment->major->description : '-' ?></td>
                                    <td><?= ($modelEnrollment->section) ? $modelEnrollment->section->code : '-' ?></td>
                                    <td class="text-center"><?= ($modelEnrollment->grading_status) ? $modelEnrollment->grading_status : '-' ?></td>
                                    <?php if($modelEnrollment->grade) : ?>
                                        <td class="text-center">
                                            <?= $modelEnrollment->grade ?>
                                            <?php
                                                echo Html::a('<i class="fa fa-edit"></i>', [
                                                    'enrollments/update', 'id' => $modelEnrollment->id,
                                                ],['class' => 'btn btn-xs btn-primary']);
                                            ?>
                                        </td>
                                    <?php else : ?>
                                        <td class="text-center">
                                            <?php
                                                echo Html::a('<i class="fa fa-edit"></i>', [
                                                    'enrollments/update', 'id' => $modelEnrollment->id,
                                                ],['class' => 'btn btn-xs btn-primary']);
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </table>
                            <!-- <button type="button" class="btn btn-primary btn-xs mt-2 btn-block" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-history"></i> <b>SEE ALL</b></button> -->
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content p-3">
                                    <h5><b>Enrollment Information</b></h5>
                                    <table class="table table-striped table-bordered">
                                        <tr class="bg-info">
                                            <th>Academic Year</th>
                                            <th>Year & Semester</th>
                                            <th>Course</th>
                                            <th>Major</th>
                                            <th>Section</th>
                                            <th class="text-center">Final Grade</th>
                                        </tr>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade enrollment-modal" tabindex="-1" role="dialog" aria-labelledby="enrollmentModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content p-3">
                                    <h5><b>Add Enrollment</b></h5>
                                        <div class="enrollments-form">
                                            <?php $form2 = ActiveForm::begin([
                                                'id' => 'form-b',
                                                'action' => ['create-enrollment', 'student_id' => $model->id]
                                            ]) ?>
                                            <?= $form2->field($modelEnrollment, 'student_id')->textInput(['readonly' => true]) ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?= $form2->field($modelEnrollment, 'academic_year')->textInput() ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?= $form2->field($modelEnrollment, 'semester')->dropDownList([ '1st' => '1st', '2nd' => '2nd', ], ['prompt' => '']) ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?= $form2->field($modelEnrollment, 'course_id')->dropDownList($modelEnrollment->courses, ['prompt' => 'Select Course']) ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $form2->field($modelEnrollment, 'major_id')->dropDownList($modelEnrollment->majors, ['prompt' => 'Select Major']) ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?= $form2->field($modelEnrollment, 'section_id')->dropDownList($modelEnrollment->sections, ['prompt' => 'Select Section']) ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <?= $form2->field($modelEnrollment, 'category')->dropDownList([ 'College' => 'College', 'SHS' => 'SHS', ], ['prompt' => '']) ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?= $form2->field($modelEnrollment, 'admission_type')->dropDownList([ 'Regular' => 'Regular', 'Scholarship' => 'Scholarship', 'Continuing' => 'Continuing', ], ['prompt' => '']) ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?= $form2->field($modelEnrollment, 'modality')->dropDownList([ 'Face-to-Face' => 'Face-to-Face', 'Online' => 'Online', 'Hybrid' => 'Hybrid', ], ['prompt' => '']) ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?= $form2->field($modelEnrollment, 'branch')->dropDownList([ 'Main Branch' => 'Main Branch', 'Bulacan' => 'Bulacan', 'MV' => 'MV', ], ['prompt' => '']) ?>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Enrolled Subject and Schedules
                            <button type="button" class="btn btn-dark btn-xs float-right" data-toggle="modal" data-target=".subject-modal"><i class="fa fa-plus"></i></button>
                            <?php echo Html::a('<i class="fa fa-print"></i>', ['students/print-schedule', 'id' => $model->id,],['class' => 'btn btn-xs btn-dark float-right mr-1', 'target' => '_blank']);?>

                            
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Code</th>
                                        <th>Unit</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th>Instructor</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Grade</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $count1 = 1; ?>
                                <?php foreach ($model->subjectEnrollment as $key => $value) { ?>
                                    <tr>
                                        <td><?= $count1 ?></td>
                                        <td><?= $value->subject->subject_name ?></td>
                                        <td><?= $value->subject->subject_code ?></td>
                                        <td><?= $value->subject->credits ?></td>
                                        <td><?= $value->schedule->day_of_week ?></td>
                                        <td><?= date('h:i A', strtotime($value->schedule->start_time)) . ' - ' . date('h:i A', strtotime($value->schedule->end_time)) ?></td>
                                        <td><?= $value->schedule->room_no ?></td>
                                        <td><?= $value->schedule->instructor->fullname ?></td>
                                        <td class="text-center"><?= ($value->status) ? $value->status : '-' ?></td>
                                        <td class="text-center"><?= $value->grade ? $value->grade : '-' ?></td>
                                        <td class="text-center">
                                            <?php
                                                echo Html::a('<i class="fa fa-edit"></i>', [
                                                    'subject-enrollment/update', 'id' => $value->id,
                                                ],['class' => 'btn btn-xs btn-primary']);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $count1++; } ?>
                                </tbody>
                            </table>
                            <div class="modal fade subject-modal" tabindex="-1" role="dialog" aria-labelledby="subjectModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content p-3">
                                    <h5><b>Subject Schedule Selection</b></h5>
                                    <table class="table table-striped table-bordered text-center ">
                                        <tr class="bg-info">
                                            <th>Subject</th>
                                            <th>Instructor</th>
                                            <th>Day of Week</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($modelSchedules as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->subject->subject_name ?></td>
                                                <td><?= $value->instructor->fullname ?></td>
                                                <td><?= $value->day_of_week ?></td>
                                                <td><?= date('h:i A', strtotime($value->start_time)) ?></td>
                                                <td><?= date('h:i A', strtotime($value->end_time)) ?></td>
                                                <td><?= $value->room_no ?></td>
                                                <td>
                                                <?php
                                                    echo Html::a('ADD', [
                                                        'students/add-schedule', 
                                                        'student_id' => $model->id,
                                                        'subject_id' => $value->subject_id,
                                                        'academic_year' => $modelEnrollment->academic_year,
                                                        'semester' => $modelEnrollment->semester,
                                                        'schedule_id' => $value->id,
                                                    ],['class' => 'btn btn-xs btn-primary']);
                                                ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
