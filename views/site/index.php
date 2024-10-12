<?php
$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="">
    <h5>Dashboard</h5>
    <hr>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Active Students',
                'number' => '89,999',
                'icon' => 'fa fa-user-plus',
                'progress' => [
                    'width' => '89%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Inactive Students',
                'number' => '11,001',
                'theme' => 'warning',
                'icon' => 'fa fa-user-times',
                'progress' => [
                    'width' => '11%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Enrolled',
                'number' => '100,000',
                'theme' => 'success',
                'icon' => 'fa fa-users',
                'progress' => [
                    'width' => '100%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
    </div>
</div>