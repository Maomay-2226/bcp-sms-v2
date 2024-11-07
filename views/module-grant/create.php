<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ModuleGrant $model */

$this->title = 'Add Module Grant Record';
$this->params['breadcrumbs'][] = ['label' => 'Module Grants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-grant-create">

    <h5><?= Html::encode($this->title) ?></h5>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
