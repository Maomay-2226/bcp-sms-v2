<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StudentScholarship $model */

$this->title = 'Create Student Scholarship';
$this->params['breadcrumbs'][] = ['label' => 'Student Scholarships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-scholarship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
