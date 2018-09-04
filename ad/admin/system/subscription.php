<?php if(!defined("APP")) die()?>
<div class="panel panel-default">
  <div class="panel-heading">订阅 <?php echo $count ?></div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>交易 ID</th>
            <th>用户 ID</th>
            <th>状态</th>
            <th>数量</th>
            <th>日期</th>
            <th>到期</th>
          </tr>
        </thead>
        <tbody>          
          <?php foreach ($subscriptions as $Sub): ?>
            <tr data-id="<?php echo $Sub->id ?>">
              <td><?php echo $Sub->id ?></td>
              <td><?php echo $Sub->tid ?></td>
              <td><a href="<?php echo Main::ahref("users/edit/{$Sub->userid}")?>" class="btn btn-success btn-xs"><?php echo $Sub->userid ?></a></td>
              <td><?php echo $Sub->status ?></td>
              <td><?php echo $Sub->amount ?></td>
              <td><?php echo $Sub->date ?></td>
              <td><?php echo $Sub->expiry ?></td>
            </tr>      
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <?php echo $pagination ?>   
  </div>
</div>