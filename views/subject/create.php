<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */

$this->title = 'Create Subject';
$this->params['breadcrumbs'][] = ['label' => 'Subject', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h5><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
