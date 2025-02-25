<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ModuleList $model */

$this->title = 'Module ID: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="module-list-view">
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
                    'title',
                    [
                        'attribute' => 'subject_id',
                        'value' => $model->subject->subject_name,
                    ],
                    'description:ntext',
                    'instruction:ntext',
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
                ],
            ]) ?>
        </div>
    </div>
</div>