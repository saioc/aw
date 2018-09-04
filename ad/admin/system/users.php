<?php if(!defined("APP")) die()?>
<div class="panel panel-default">
  <div class="panel-heading">
    用户 <?php echo $count ?>
    <div class="btn-group pull-right">
      <a href="<?php echo Main::ahref("users/add") ?>" class="btn btn-primary btn-xs">添加用户</a> 
      <a href="<?php echo Main::ahref("users/export") ?>" class="btn btn-primary btn-xs">导出用户</a> 
      <a href="<?php echo Main::ahref("users/inactive").Main::nonce("inactive_users") ?>" class="btn btn-danger delete btn-xs">删除不活跃的用户</a>     
    </div>
  </div>
  <div class="panel-body">
    <form action="<?php echo Main::ahref("users/delete")?>" method="post" id="delete-all-urls">
      <p class="cta-hide alert alert-warning">请注意，使用批量删除功能只会删除用户，他们的网址仍然在系统中，并将公开。</p>
      <div class="row">
        <div class="col-md-10">
         <input type='submit' class="btn btn-danger" value='删除所选'>
        </div>
        <?php if (!isset($hideFilter)): ?>
          <div class="col-md-2">
            <select name="filter" id="filter" class="hidden-xs" data-search="0">
              <option value=""<?php if(Main::is_set('filter','')) echo " selected" ?>>最新</option>
              <option value="old"<?php if(Main::is_set('filter','old')) echo " selected" ?>>最老</option>
              <option value="admin"<?php if(Main::is_set('filter','admin')) echo " selected" ?>>仅限管理员</option>
            </select>          
          </div> 
        <?php endif ?> 
      </div>
      <br>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" id="check-all"></th>
              <th>邮箱</th>
              <th>用户状态</th>
              <th>注册日期</th>
              <th>会员</th>
              <th>到期</th>
              <th>网址数量</th>
              <th>选项</th>
            </tr>
          </thead>
          <tbody>          
            <?php foreach ($users as $user): ?>
              <?php if($this->config["demo"]) $user->email="Hidden in demo to protect privacy"; ?>
              <?php if(empty($user->email)) $user->email=ucfirst($user->auth)." User" ?>
              <?php $user->count=$this->db->count("url","userid='{$user->id}'") ?>
              <tr data-id="<?php echo $user->id ?>">
                <td><input type="checkbox" class="data-delete-check" name="delete-id[]" value="<?php echo $user->id ?>"></td>
                <td><?php echo ($user->admin)?"<strong>{$user->email}</strong>":$user->email ?></td>
                <td><?php echo ($user->active?"Active":"Not Active") ?></td>                
                <td><?php echo date("F d, Y",strtotime($user->date)) ?></td>
                <td><?php echo ($user->pro?"Pro":"Free") ?></td>
                <td><?php echo ($user->pro?date("F d, Y",strtotime($user->expiration)):"n/a") ?></td>                
                <td><a href="<?php echo Main::ahref("urls/view/{$user->id}") ?>" class="btn btn-success btn-xs"><?php echo $user->count ?></a></td>
                <td>
                  <a href="<?php echo Main::ahref("payments/view/{$user->id}") ?>" class="btn btn-success btn-xs">查看付款</a>
                  <a href="<?php echo Main::ahref("users/edit/{$user->id}") ?>" class="btn btn-primary btn-xs">编辑</a>
                  <a href="<?php echo Main::ahref("users/delete/{$user->id}").Main::nonce("delete_user-{$user->id}") ?>" class="btn btn-danger btn-xs delete" title="只删除用户">删除用户</a>
                  <a href="<?php echo Main::ahref("users/delete/{$user->id}").Main::nonce("delete_user_all-{$user->id}") ?>" class="btn btn-danger btn-xs delete" title="删除用户和所有关联网址">全部删除</a>
                </td>
              </tr>      
            <?php endforeach ?>
          </tbody>
        </table>
        <?php echo Main::csrf_token(TRUE) ?>     
      </div>
    </form>    
    <?php echo $pagination ?>   
  </div>
</div>