<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Announcement $model */

$this->title = 'ID: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="announcement-view">

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
                    [
                        'attribute' => 'announcement',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'date_to_post',
                        'value' => function($model){
                            return date('F d, Y h:i a', strtotime($model->date_to_post));
                        }
                    ],
                    [
                        'attribute' => 'date_to_expire',
                        'value' => function($model){
                            return date('F d, Y h:i a', strtotime($model->date_to_expire));
                        }
                    ],
                    'type',
                ],
        ]) ?>
        </div>
    </div>
</div>
