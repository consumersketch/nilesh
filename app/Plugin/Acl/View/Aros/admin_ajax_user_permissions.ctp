<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

    <h3><?php echo  __d('acl', 'User') . ' : ' . $user[$user_model_name][$user_display_field]; ?></h3>

    <h4><?php echo __d('acl', 'Role'); ?></h4>

    <table border="0">
    <tr>
    	<?php
    	foreach($roles as $role)
    	{
    	    echo '<td>';

    	    echo $role[$role_model_name][$role_display_field].'&nbsp;';
    	    if($role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
    	    {
    	        echo $this->Html->image('/acl/img/design/tick.png');
                echo "&nbsp;&nbsp;&nbsp";
    	    }
    	    else
    	    {
    	    	$title = __d('acl', 'Update the user role');
    	        echo $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'update_user_role', 'user' => $user[$user_model_name][$user_pk_name], 'role' => $role[$role_model_name][$role_pk_name]), array('title' => $title, 'alt' => $title, 'escape' => false));
                echo "&nbsp;&nbsp;&nbsp";
    	    }

    	    echo '</td>';
    	}
    	?>
    </tr>
    </table>

    <h3><?php echo __d('acl', 'Permissions'); ?></h3>

	<?php
	if($user_has_specific_permissions)
	{
	    echo '<div class="separator"></div>';
    	echo $this->Html->image('/acl/img/design/bulb24.png') . __d('acl', 'This user has specific permissions');
    	echo ' (';
    	echo $this->Html->link($this->Html->image('/acl/img/design/cross2.png', array('style' => 'vertical-align:middle;')) . ' ' . __d('acl', 'Clear'), '/admin/acl/aros/clear_user_specific_permissions/' . $user[$user_model_name][$user_pk_name], array('confirm' => __d('acl', 'Are you sure you want to clear the permissions specific to this user ?'), 'escape' => false));
    	echo ')';
    	echo '<div class="separator"></div>';
	}
	?>
	
    <table border="0" cellpadding="5" cellspacing="2">
	<tr>
    	<?php

    	$column_count = 1;

    	$headers = array(__d('acl', 'Action'), __d('acl', 'Authorization'));

    	echo $this->Html->tableHeaders($headers);
    	?>
	</tr>

	<?php
	$js_init_done = array();
	$previous_ctrl_name = '';

    $NonValidAction = array('admin_GetAreaByCity','admin_GetCityByState','AppointmentBooked','AppointmentBookedConfirmed','admin_AddEvent','admin_DeleteEvent','admin_DeleteEventNew','admin_UpdateEvent','admin_UpdateEventNew','GetForm','SaveForm','admin_FormProcess','admin_capthcacode','admin_dynamic','generate_json','hash','loadField','msgError','process','randName','rebuild','removeFromEnd','render_json','retrieve','save','showform','GetDoctorScheduleForHospital','GetDoctorScheduleTime','output','output_error','resize','view','ConfirmQuestion','GetAge','GetDoctor','GetSubSpecialty','OtherPatient','SaveDoctor','SaveQuestion','SelfContactDetails','SelfContactDetailsOther','admin_GetStateByCountry','RemoveFilter','RoomTypeFilter','SetFeesUrl','SetTimeUrl','SetUrl','capthcacode','check_email_exists','get_doctors','get_facility','get_room_type','get_speciality','getmap');

	if(isset($actions['app']) && is_array($actions['app']))
	{
    	foreach($actions['app'] as $controller_name => $ctrl_infos)
    	{
    		if($previous_ctrl_name != $controller_name)
    		{
    			$previous_ctrl_name = $controller_name;
    
    			$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
    		}

    		foreach($ctrl_infos as $ctrl_info)
    		{
             if(!in_array($ctrl_info['name'],$NonValidAction)) {
        		echo '<tr class="' . $color . '">';
    
        		echo '<td>' . $controller_name . '->' . ucwords(str_replace('_',' ',$ctrl_info['name'])) . '</td>';
    
    	    	echo '<td>';
    	    	echo '<span id="right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
    
    	    	/*
    			* The right of the action for the role must still be loaded
    	    	*/
    	        echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));
    
    		    if(!in_array($controller_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
    	        {
    	        	$js_init_done[] = $controller_name . '_' . $user[$user_model_name][$user_pk_name];
    	        	$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "", "' . $controller_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
    	        }
    	        
    	    	echo '</span>';
    
    	    	echo ' ';
    	    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));
    
    	    	echo '</td>';
    	    	echo '</tr>';
    		}
            }
    	}
	}
	?>
	<?php
	if(isset($actions['plugin']) && is_array($actions['plugin']))
	{
    	foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
    	{
    	    echo '<tr class="title"><td colspan="2">' . __d('acl', 'Plugin') . ' ' . $plugin_name . '</td></tr>';

    	    foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
    	    {
        	    if($previous_ctrl_name != $plugin_ctrler_name)
        		{
        			$previous_ctrl_name = $plugin_ctrler_name;

        			$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
        		}

    	        foreach($plugin_methods as $method)
    	        {
    	            echo '<tr class="' . $color . '">';

    	            echo '<td>' . $plugin_ctrler_name . '->' . ucwords(str_replace('_',' ',$method['name'])) . '</td>';

    	            echo '<td>';
    	            echo '<span id="right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';

    	            /*
					* The right of the action for the role must still be loaded
    		    	*/
    		        echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'loading')));

    	            if(!in_array($plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
    		        {
    		        	$js_init_done[] = $plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name];
    		        	$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.') . '");');
    		        }
    		        
    		    	echo '</span>';

    		    	echo ' ';
    		    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));

        		    echo '</td>';
    	            echo '</tr>';
    	        }
    	    }
    	}
	}
    ?>
	</table>
    <?php
    echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'authorized');
    echo '&nbsp;&nbsp;&nbsp;';
    echo $this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'blocked');
    ?>
<?php
echo $this->element('design/footer');
?>