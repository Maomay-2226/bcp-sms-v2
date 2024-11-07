<?php

use app\models\Schedule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ScheduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h5>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Add', ['create'], ['class' => 'btn btn-info btn-sm']) ?>
    </h5>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'subject.subject_name',
            'instructor.fullname',
            'day_of_week',
            'start_time:time',
            'end_time:time',
            'room_no',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Schedule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update} | {delete}', // Customize which actions to show
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="btn btn-info btn-xs"><b>VIEW</b></span>', $url, [
                            'title' => 'View',
                            'aria-label' => 'View',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn btn-info btn-xs"><b>EDIT</b></span>', $url, [
                            'title' => 'Update',
                            'aria-label' => 'Update',
                            'data-pjax' => '0',
                        ]);
                    },
                    'identity' => function ($url, $model) {
                        return Html::a('<span class="btn btn-primary btn-xs"><b>IDENTITY</b></span>', $url, [
                            'title' => 'Update',
                            'aria-label' => 'Update',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-danger btn-xs"><b>DELETE</b></span>', $url, [
                            'title' => 'Delete',
                            'aria-label' => 'Delete',
                            'data-pjax' => '0',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this item?',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
