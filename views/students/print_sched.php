<?php

use yii\helpers\Html;

?>
<html lang="en-US" style="height: auto;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Print Schedule</title>
        <meta name="csrf-param" content="_csrf">
        <meta name="csrf-token" content="LtHmME22sa6sO6v4QzWX0ndvKeMscvOGLmMBFsrutKh4opxgOOWD-dhjnJkEd_LgBRZZqxUgv7ZvDm4gs62H5w==">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback" rel="stylesheet">
        <link href="/assets/d9f021c7/css/all.min.css" rel="stylesheet">
        <link href="/assets/3f337680/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/f6e0dc17/css/adminlte.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="p-5">
            <p class="mb-1"><b>Student No:</b> <?= $model->id ?></p>
            <p class="mb-1"><b>Student Name:</b> <?= $model->fullname ?></p>
            <p class="mb-1"><b>Academic Year:</b> <?= ($modelEnrollment->academic_year) ? $modelEnrollment->academic_year : '-'  ?></p>
            <p class="mb-1"><b>Year & Semester:</b> <?= ($modelEnrollment->section) ? $modelEnrollment->section->year.'-'.$modelEnrollment->semester : '-' ?></p>
            <p class="mb-1"><b>Course:</b> <?= ($modelEnrollment->course) ? $modelEnrollment->course->course_code : '-' ?>, 
            <b>Major:</b> <?= ($modelEnrollment->major) ? $modelEnrollment->major->description : '-' ?>
            <p class="mb-1"><b>Section:</b> <?= ($modelEnrollment->section) ? $modelEnrollment->section->code : '-' ?></p>
            <table class="table table-bordered table-sm" id="printSched">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Subject</th>
                        <th>Code</th>
                        <th>Unit</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>
                <?php $count1 = 1; ?>
                <?php foreach ($model->subjectEnrollment as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $count1 ?></td>
                        <td><?= $value->subject->subject_name ?></td>
                        <td><?= $value->subject->subject_code ?></td>
                        <td><?= $value->subject->credits ?></td>
                        <td><?= $value->schedule->day_of_week ?></td>
                        <td><?= date('h:i A', strtotime($value->schedule->start_time)) . ' - ' . date('h:i A', strtotime($value->schedule->end_time)) ?></td>
                        <td><?= $value->schedule->room_no ?></td>
                        <td><?= $value->schedule->instructor->fullname ?></td>
                    </tr>
                    <?php $count1++; } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<script> window.print(); </script>