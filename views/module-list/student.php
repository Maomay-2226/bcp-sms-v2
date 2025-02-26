<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Modules';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php foreach ($enrolled_subjects as $key1 => $enrolled_subject) : ?>
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"><?= $enrolled_subject->subject->subject_name ?></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-sm">
        <thead>
          <tr>
            <th style="width: 15px">#</th>
            <th>Title</th>
            <th style="width: 100px" class="text-center">Status</th>
            <th style="width: 100px" class="text-center">Requested</th>
            <th style="width: 100px" class="text-center">Granted</th>
            <th style="width: 100px" class="text-center">Link</th>
          </tr>
        </thead>
        <tbody>
        <?php $id1 = 1; ?>
        <?php foreach ($enrolled_subject->moduleLists as $key2 => $moduleList) : ?>
          <?php
            $opened = date('Y-m-d') >= $moduleList->date_open ? true : false;
            $closed = $moduleList->date_close < date('Y-m-d') ? true : false;
            $is_open = $opened && !$closed ? true : false;
            $is_requested = false;
            $is_approved = false;
            if(ArrayHelper::keyExists($moduleList->id, $module_grants)){
              $is_requested = true;
              $is_approved = $module_grants[$moduleList->id]->is_approved == 'Yes' ? true : false;
            }
          ?>
          <tr>
            <td><?= $id1 ?></td>
            <td><?= $moduleList->title ?></td>
            <td class="text-center">
              <?php
                if(!$is_open){
                  echo '<span class="badge bg-secondary">Close</span>';
                }
                else{
                  echo '<span class="badge bg-success">Open</span>';
                }
              ?>
            </td>
            <td class="text-center">
              <?php 
              if($is_requested){
                echo '<span class="badge bg-success">Yes</span>';
              }
              else if(!$is_requested && $is_open){
                echo Html::a('<i class="fa fa-paper-plane"></i> Request', ['/module-grant/request', 'module_id' => $moduleList->id], [
                      'title' => 'Submit Request',
                      'aria-label' => 'Request',
                      'data-pjax' => '0',
                      'data-method' => 'post',
                      'class' => 'btn btn-primary btn-xs',
                      'data-confirm' => 'Are you sure you want to request a grant for this module?',
                    ]);
              }
              else{
                echo "-";
              }
              ?>
            </td>
            <td class="text-center">
              <?php
              if($is_approved){
                echo '<span class="badge bg-success">Yes</span>';
              }
              else {
                echo '<span class="badge bg-secondary">No</span>';
              }
              ?>
            </td>
            <td class="text-center">
              <?php
              if($is_approved && $is_open && $is_requested){
                $module_link = $moduleList->link;
                if (!preg_match("~^(?:f|ht)tps?://~i", $moduleList->link)) {
                    $module_link = "https://" . $moduleList->link;
                }
                echo '<a href="'.$module_link.'" target="_blank" id="module_link" class="btn btn-primary btn-xs">Open</a>';
              }
              else {
                echo '-';
              }
              ?>
            </td>
          </tr>
          <?php $id1; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
<?php endforeach; ?>
<?php if(!$enrolled_subjects) : ?>
  <?= \hail812\adminlte\widgets\Callout::widget([
      'type' => 'warning',
      'body' => 'No module found.',
  ]) ?>
<?php endif; ?>