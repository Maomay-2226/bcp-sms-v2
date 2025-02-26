<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concern $model */

$this->title = 'Update Concern' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concerns', 'url' => ['submitted']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concern-update">

    <?= $this->render('_form-submitted', [
        'model' => $model,
    ]) ?>

</div>
