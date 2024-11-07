<?php

use app\models\Announcement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\AnnouncementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Announcements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-index">

    <h5>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Create', ['create'], ['class' => 'btn btn-info btn-sm']) ?>
    </h5>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'announcement:ntext',
            'date_to_post',
            'date_to_expire',
            'type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Announcement $model, $key, $index, $column) {
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


</div>
