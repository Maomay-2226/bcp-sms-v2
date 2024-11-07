<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Schedule $model */

$this->title = $model->day_of_week.': '.$model->subject->subject_name;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="schedule-view">
    <h5>
        <?= Html::encode($this->title) ?> | 
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
            <hr>
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-bordered detail-view', 'style' => 'background-color: white'],
                'attributes' => [
                    // 'id',
                    'subject.subject_name',
                    'instructor.fullname',
                    'day_of_week',
                    'start_time:time',
                    'end_time:time',
                    'room_no'
                ],
            ]) ?>
        </div>
    </div>
</div>
