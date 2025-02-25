<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Add Request';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-grant-create">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
