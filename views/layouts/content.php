<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Url;

?>

<?php if(Yii::$app->user->isGuest) : ?>
<style>
    .content-wrapper {
        background-image: url('<?= Url::to('@web/uploads/bg.jpg') ?>'); /* Replace with your image path */
        background-size: cover; /* Make the image cover the entire area */
        background-repeat: no-repeat; /* Prevent the image from repeating */
        background-position: center; /* Center the image */
        height: 100vh; /* Adjust height as needed */
    }
</style>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <?php if(!Yii::$app->user->isGuest) : ?>
        <div class="container-fluid p-1 pl-3" style="background-color: white; border-radius: 5px;box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <?php endif; ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="col-md-12">
            <?= $content ?><!-- /.container-fluid -->
        </div>
        
    </div>
    <!-- /.content -->
</div>