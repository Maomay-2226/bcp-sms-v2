<?php
$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
$active_perc = ($active_students != 0) ? floatval((intval($active_students) / intval($students)) * 100) : 0;
$enrollment_perc = ($active_enrollment != 0) ? floatval((intval($active_enrollment) / intval($students)) * 100) : 0;
?>
<div class="">
    <h5>Dashboard</h5>
    <hr>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Registered Students',
                'number' => number_format($students),
                'icon' => 'fa fa-user-plus',
                'progress' => [
                    'width' => '100%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Active Students',
                'number' => number_format($active_students),
                // 'theme' => 'warning',
                'icon' => 'fa fa-users',
                'progress' => [
                    'width' => ''.number_format($active_perc,2).'%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Active Enrollment',
                'number' => number_format($active_enrollment),
                // 'theme' => 'success',
                'icon' => 'fa fa-address-book',
                'progress' => [
                    'width' => ''.number_format($enrollment_perc,2).'%',
                    'description' => 'For Academic Year <b>'.date('Y').'</b>'
                ]
            ]) ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
    </div>
</div>