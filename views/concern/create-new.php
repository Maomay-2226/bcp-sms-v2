<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concern $model */

$this->title = 'Create Concern';
$this->params['breadcrumbs'][] = ['label' => 'Concerns', 'url' => ['submitted']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concern-create">

    <h5><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form-submitted', [
        'model' => $model,
    ]) ?>

</div>
