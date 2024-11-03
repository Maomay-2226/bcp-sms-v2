<?php
    use yii\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <?= Html::img("@web/uploads/bcp-logo.png", [
        'alt' => 'AdminLTE Logo',
        'class' => 'brand-image',
        'style' => 'opacity: .8',
    ]); ?>
        <span class="brand-text font-weight-light">BCP-SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Welcome, <?= Yii::$app->user->isGuest ? 'Guest' : strtoupper(Yii::$app->user->identity->username) ?>!</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Login', 'url' => ['/user/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // Student Registration
                    ['label' => 'Student Registration', 'header' => true, 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'New Students', 'url' => ['/students/create'], 'icon' => 'user-plus', 'iconStyle' => 'fa', 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Enrolled Students', 'url' => ['/students/index'], 'icon' => 'edit', 'iconStyle' => 'fa', 'visible' => !Yii::$app->user->isGuest],  
                    // Class Management
                    ['label' => 'Class Management', 'header' => true, 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Registration',  'icon' => 'edit', 'url' => ['#'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Schedules', 'iconStyle' => 'fa',  'icon' => 'calendar', 'url' => ['#'], 'visible' => !Yii::$app->user->isGuest],
                    // Settings
                    ['label' => 'Settings', 'header' => true, 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Announcement',  'icon' => 'bullhorn', 'url' => ['/announcement/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Courses',  'icon' => 'briefcase', 'url' => ['/course/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Departments',  'icon' => 'building', 'url' => ['/departments/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Instructor Profiling',  'icon' => 'user-circle', 'url' => ['/instructors/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Subjects',  'icon' => 'book', 'url' => ['/subject/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User Management',  'icon' => 'users', 'url' => ['/user/admin'], 'visible' => !Yii::$app->user->isGuest],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>