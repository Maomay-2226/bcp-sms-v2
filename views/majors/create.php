<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Majors $model */

$this->title = 'Add Course Majors';
$this->params['breadcrumbs'][] = ['label' => 'Course Majors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="majors-create">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
