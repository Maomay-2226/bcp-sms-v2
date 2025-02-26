<?php
$this->title = 'Homepage';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Announcements',
                'icon' => 'fa fa-bullhorn',
                'theme' => 'dark',
                'iconTheme' => 'warning',
            ]) ?>
            <hr>
            <?php foreach ($activeAnnouncements as $key => $activeAnnouncement) : ?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'warning',
                    'body' => $activeAnnouncement->announcement,
                ]) ?>
            <?php endforeach; ?>
            <?php if(!$activeAnnouncements) :?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'warning',
                    'body' => 'No data found.',
                ]) ?>
            <?php endif;?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'School Events',
                'icon' => 'fa fa-calendar-check',
                'iconTheme' => 'success',
                'theme' => 'dark',
            ]) ?>
            <hr>
            <?php foreach ($activeEvents as $key => $activeEvent) : ?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'success',
                    'head' => 'Title: '.$activeEvent->title.' <br>Location: '.$activeEvent->location,
                    'body' => $activeEvent->description,
                ]) ?>
            <?php endforeach; ?>
            <?php if(!$activeEvents) :?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'success',
                    'body' => 'No data found.',
                ]) ?>
            <?php endif;?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Concerns',
                'icon' => 'fa fa-question-circle',
                'iconTheme' => 'info',
                'theme' => 'dark',
            ]) ?>
            <hr>
            <?php foreach ($activeConcerns as $key => $activeConcern) : ?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'info',
                    'body' => '<b>Concern</b>: '.$activeConcern->message.' <br><b>Answer</b>: '.$activeConcern->answer,
                ]) ?>
            <?php endforeach; ?>
            <?php if(!$activeConcerns) :?>
                <?= \hail812\adminlte\widgets\Callout::widget([
                    'type' => 'info',
                    'body' => 'No data found.',
                ]) ?>
            <?php endif;?>
        </div>
    </div>
</div>