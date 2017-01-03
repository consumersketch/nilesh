<?php
echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

<?php
echo $this->Form->create('User', array('url' => array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'admin_users')));
echo __d('acl', 'Name');
echo '<br/>';
echo $this->Form->input($user_display_field, array('label' => false, 'div' => false));
echo ' ';
echo $this->Form->end(array('label' =>__d('acl', 'Filter'), 'div' => false, 'class' => 'btn btn-inverse filter'));
echo '<br/>';
?>
<div class="portlet box blue-madison">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>User Roles
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
        </div>
    </div>
    <div class="portlet-body">
    <div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <tr>
	<?php
	$column_count = 1;
	
	$headers = array($this->Paginator->sort($user_display_field, __d('acl', 'Name')));
	
	foreach($roles as $role)
	{
	    $headers[] = $role[$role_model_name][$role_display_field];
	    $column_count++;
	}
	
	echo $this->Html->tableHeaders($headers);
	
	?>
	
</tr>
</thead>
<tbody>
<?php
foreach($users as $user)
{
    $style = isset($user['Aro']) ? '' : ' class="line_warning"';
    
    echo '<tr' . $style . '>';
    echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
    
    foreach($roles as $role)
	{
	   if(isset($user['Aro']) && $role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
	   {
	       echo '  <td>' . $this->Html->image('/acl/img/design/tick.png') . '</td>';
	   }
	   else
	   {
	   	   $title = __d('acl', 'Update the user role');
	       echo '  <td>' . $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), '/admin/acl/aros/update_user_role/user:' . $user[$user_model_name][$user_pk_name] . '/role:' . $role[$role_model_name][$role_pk_name], array('title' => $title, 'alt' => $title, 'escape' => false)) . '</td>';
	   }
	}
	
    //echo '  <td>' . (isset($user['Aro']) ? $this->Html->image('/acl/img/design/tick.png') : $this->Html->image('/acl/img/design/cross.png')) . '</td>';
    
    echo '</tr>';
}
?>
<tr>
	<td class="paging" colspan="<?php echo $column_count ?>">
	<!--	<?php /*echo $this->Paginator->prev('<< ' . __d('acl', 'previous'), array(), null, array('class'=>'disabled'));*/?>
	 	|
	 	<?php /*echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));*/?>
	 	|
		--><?php /*echo $this->Paginator->next(__d('acl', 'next') . ' >>', array(), null, array('class' => 'disabled'));*/?>

        <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_8_paginate">
            <div class="paging">
                <?php echo $this->paginator->prev(__('Previous', true), array(), null, array('class' => 'disabled')); ?>
                <?php echo $this->paginator->numbers(); ?>
                <?php echo $this->paginator->next(__('Next', true), array(), null, array('class' => 'disabled')); ?>
            </div>
        </div>
	</td>
</tr>
</tbody>
    </table>
    </div>
    </div>
</div>


<?php
if($missing_aro)
{
?>
    <div style="margin-top:20px">
    
    <p class="warning"><?php echo __d('acl', 'Some users AROS are missing. Click on a role to assign one to a user.') ?></p>
    
    </div>
<?php
}
?>

<?php
echo $this->element('design/footer');
?>