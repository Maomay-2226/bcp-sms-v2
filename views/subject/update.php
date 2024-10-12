<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */

$this->title = 'Update: ' . $model->subject_name;
$this->params['breadcrumbs'][] = ['label' => 'Subject', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subject-update">

    <h5><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
