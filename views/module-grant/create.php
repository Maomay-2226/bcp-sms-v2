<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Create Module Grant';
$this->params['breadcrumbs'][] = ['label' => 'Module Grants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-grant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
