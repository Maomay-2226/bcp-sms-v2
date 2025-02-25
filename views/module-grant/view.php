<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = $model->moduleList->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="module-grant-view">

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
                    'moduleList.title',
                    'moduleList.subject.subject_name',
                    // 'condition_description',
                    'date_open:date',
                    'date_close:date',
                    'is_requested',
                    'is_approved',
                    'student_id',
                    // 'module_link',
                ],
            ]) ?>
        </div>
    </div>
</div>
