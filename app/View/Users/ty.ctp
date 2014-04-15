
 

   
  <div class="col-lg-8">
    <p class="text-right">
        <?php echo $this->Html->link(__('Add User'),array('action'=>'add'),array('class'=>'btn btn-primary'))?>
    </p>
  </div>
</div> 
 
 
<div class="row">
  <div class="col-lg-12 ">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan=2>User ID</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th>Posts</th>
                    <th>Activity</th>
                </tr>
            </thead>
             
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                   
                    <td>
                        <?php
                        echo __('Id');?>,<?php echo h($user['User']['id']); ?>
                                             
                    </td>
                    <td><?php
                        echo __('Username');?>,<?php echo h($user['User']['username']); ?>
                    </td>
                    <td><?php
                        echo __('Role');?>,<?php echo h($user['User']['role']); ?>
                    </td>
                    <td><?php
                            echo $this->Time->timeAgoInWords($user['User']['created']);
                        ?>
                    </td>
                    <td>
                       <?php
                        echo count($user['Post']);
                       ?>
                    </td>
                    <td>
                     <?php
                       if(count($user['Post'])>0) {
                        $post = $user['Post'][0];
                        echo $this->Time->timeAgoInWords($post['created']);
                        echo '&nbsp;<small>by</small>&nbsp;';
                        echo $this->Html->link($post['User']['username'],array('controller'=>'users',
                                                                                        'action'=>'index',
                                                                                        $post['User']['id']));
                       }
                       ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="pull-right">
            <?php
                echo $this->element('paginator');
            ?>
         </div>
</div>
