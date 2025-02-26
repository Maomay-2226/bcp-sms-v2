<?php

use app\models\ModuleList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ModuleListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Modules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-list-index">

    <h5>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Add', ['create'], ['class' => 'btn btn-info btn-sm']) ?>
    </h5>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'subject_id',
                'value' => 'subject.subject_name',
            ],
            'date_open:date',
            'date_close:date',
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => function ($model) {
                    $module_link = $model->link;
                    if (!preg_match("~^(?:f|ht)tps?://~i", $model->link)) {
                        $module_link = "https://" . $model->link;
                    }
                    return '<a href="'.$module_link.'" target="_blank" id="module_link">'.$module_link.'</a>';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ModuleList $model, $key, $index, $column) {
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
