<?php

use app\models\ModuleGrant;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ModuleGrantSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-grant-index">

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
            [
                'attribute' => 'module_list_id',
                'value' => 'moduleList.title',
            ],
            // 'moduleList.subject.subject_name',
            'student_id',
            // 'date_open:date',
            // 'date_close:date',
            'is_requested',
            'is_approved',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ModuleGrant $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{approve} {view} {update} | {delete}', // Customize which actions to show
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
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-danger btn-xs"><b>DELETE</b></span>', $url, [
                            'title' => 'Delete',
                            'aria-label' => 'Delete',
                            'data-pjax' => '0',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this item?',
                        ]);
                    },
                    'approve' => function ($url, $model) {
                        if($model->is_approved == 'No'){
                            return Html::a('<span class="btn btn-primary btn-xs"><b>APPROVE</b></span>', $url, [
                                'title' => 'Approve',
                                'aria-label' => 'Approve',
                                'data-pjax' => '0',
                                'data-method' => 'post',
                                'data-confirm' => 'Are you sure you want to approve this request?',
                            ]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
