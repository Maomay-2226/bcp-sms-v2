<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sections $model */

$this->title = $model->course->course_code.'-'.$model->code;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sections-view">

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
                    'code',
                    [
                        'attribute' => 'year',
                        'value' => function($model){
                            $arr = [ '1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4th'];
                            return $arr[$model->year];
                        }
                    ],
                    'semester',
                    'instructorInfo.fullname',
                    'course.course_code',
                    'status',
                ],
            ]) ?>

        </div>
    </div>
</div>
