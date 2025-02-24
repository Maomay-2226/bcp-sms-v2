<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SubjectEnrollment $model */

$this->title = 'Update Grade';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['/students/index']];
$this->params['breadcrumbs'][] = ['label' => $model->student->fullname, 'url' => ['/students/view', 'id' => $model->student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subject-enrollment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
