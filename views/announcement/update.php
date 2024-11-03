<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Announcement $model */

$this->title = 'Update Announcement: ' . $model->announcement;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->announcement, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="announcement-update">

    <h5><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
