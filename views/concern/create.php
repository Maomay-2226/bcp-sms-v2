<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concern $model */

$this->title = 'Create Concern';
$this->params['breadcrumbs'][] = ['label' => 'Concerns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concern-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
