<?php
use yii\helpers\Html;
$this->title = 'Concerns';
$this->params['breadcrumbs'][] = $this->title;
$id = 1;
?>

<?= Html::a('<i class="fa fa-plus"></i> Create', ['create-new'], ['class' => 'btn btn-primary btn-sm mb-1']) ?>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Submitted Queries</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
            <th width="10px">#</th>
            <th>Type</th>
            <th>Concern</th>
            <th>Reply</th>
            <th width="10px" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $value) : ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $value->concernType->description ?></td>
                <td><?= $value->message ?></td>
                <td><?= $value->answer ?></td>
                <?php if(!$value->answer) :?>
                <td class="text-center">
                    <?= Html::a('<i class="fa fa-edit"></i>', ['update-submitted', 'id' => $value->id], [
                            'title' => 'Update',
                            'aria-label' => 'Update',
                            'class' => 'btn btn-info btn-xs',
                    ]); ?>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['delete-sumitted', 'id' => $value->id], [
                            'title' => 'Delete',
                            'aria-label' => 'Delete',
                            'data-pjax' => '0',
                            'data-method' => 'post',
                            'class' => 'btn btn-danger btn-xs',
                            'data-confirm' => 'Are you sure you want to delete this item?',
                    ]); ?>
                </td>
                <?php else : ?>
                    <td class="text-center">-</td>
                <?php endif;?>
            </tr>
            <?php $id++ ?>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    </div>