<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentPermit $model */

$this->title = 'Create Student Permit';
$this->params['breadcrumbs'][] = ['label' => 'Student Permits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-permit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
