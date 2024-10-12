<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-info">Student Information</div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table table-bordered table-sm', 'style' => 'background-color: white'],
                        'attributes' => [
                            // 'id',
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
            </div>
            <div class="card mb-3">
                <div class="card-header bg-info ">Enrolled Subject and Schedules<span class="btn btn-default btn-sm float-right"><i class="fa fa-plus"></i></span></div>
                <div class="card-body">
                    <table class="table text-center table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Unit</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md 12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Active Enrollment Information<span class="btn btn-default btn-sm float-right"><i class="fa fa-plus"></i></span></div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr class="thead-light">
                                    <th>Academic Year:</th>
                                    <td>NOT SET</td>
                                </tr>
                                <tr class="thead-light">
                                    <th>Semester:</th>
                                    <td>NOT SET</td>
                                </tr>
                                <tr class="thead-light">
                                    <th>Course:</th>
                                    <td>NOT SET</td>
                                </tr>
                                <tr class="thead-light">
                                    <th>Major:</th>
                                    <td>NOT SET</td>
                                </tr>
                                <tr class="thead-light">
                                    <th>Section:</th>
                                    <td>NOT SET</td>
                                </tr>
                            </table>
                            <button type="button" class="btn btn-primary btn-sm mt-2 btn-block" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-history"></i> <b>SEE ALL</b></button>
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <p class="text-center p-5">- NO DATA FOUND -</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Capture Image</div>
                        <div class="card-body">
                            <div class="border rounded" style="height: 230px;border: 2px dashed #b6b6b6 !important;">
                            </div>
                            <span class="btn btn-primary btn-sm mt-2 btn-block"><i class="fa fa-camera"></i> <b>CAPTURE</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <div class="card mb-3">
                        <div class="card-header bg-info ">Subbmited Requiements <span class="btn btn-default btn-sm float-right"><i class="fa fa-upload"></i></span></div>
                        <div class="card-body">
                            <p class="text-center">- NO ATTACHMENT FOUND -</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
