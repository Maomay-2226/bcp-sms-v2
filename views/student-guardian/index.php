<?php

use app\models\StudentGuardian;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\StudentGuardianSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Student Guardians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-guardian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Guardian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'guardian_fname',
            'guardian_mname',
            'guardian_lname',
            //'guardian_contact',
            //'guardian_occupation',
            //'father_fname',
            //'father_mname',
            //'father_lname',
            //'father_contact',
            //'mother_fname',
            //'mother_mname',
            //'mother_lname',
            //'mother_contact',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StudentGuardian $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
