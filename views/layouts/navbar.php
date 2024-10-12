<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php if(!Yii::$app->user->isGuest) : ?>
            <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/user/logout'], [
                'data-method' => 'post',
                'class' => 'nav-link',
                'data' => [
                    'confirm' => Yii::t('user', 'Are you sure you want to log out?'),
                    'method' => 'post',
                ],
                'data-bs-toggle' => 'tooltip',
                'title' => Yii::t('user', 'Log out'),
            ]) ?>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-bs-toggle="tooltip" title="Fullscreen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->