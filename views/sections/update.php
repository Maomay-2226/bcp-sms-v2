<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sections $model */

// $this->title = 'Update Sections: ' . $model->id;
$this->title = 'Update Section: '. $model->course->course_code.'-'.$model->code;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->course->course_code.'-'.$model->code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sections-update">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
