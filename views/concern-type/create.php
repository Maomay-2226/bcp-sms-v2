<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ConcernType $model */

$this->title = 'Create Concern Type';
$this->params['breadcrumbs'][] = ['label' => 'Concern Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concern-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
