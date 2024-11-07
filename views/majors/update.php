<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Majors $model */

$this->title = 'Update: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Majors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="majors-update">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
