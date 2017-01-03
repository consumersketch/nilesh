<?php
 echo $this->Html->css('/acl/css/acl.css');
?>

<div class="page-content-wrapper">
    <div class="page-content">
    <!-- BEGIN STYLE CUSTOMIZER -->
<?php // echo $this->element('theme_customizer'); ?>
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="#">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">User</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Roles & Permissions</a>
                </li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Session->flash('plugin_acl'); ?>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
    <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box blue-madison">
    <div class="portlet-title">
        <div class="caption">
            <span aria-hidden="true" class="icon-users"></span> Roles & Permissions
        </div>
    </div>
    <div class="portlet-body">
	<?php
	if(!isset($no_acl_links))
	{
	    /*$selected = isset($selected) ? $selected : $this->params['controller'];

        $links = array();
        $links[] = $this->Html->link(__d('acl', 'Permissions'), '/admin/acl/aros/index', array('class' => ($selected == 'aros' )? 'selected' : null));
        $links[] = $this->Html->link(__d('acl', 'Actions'), '/admin/acl/acos/index', array('class' => ($selected == 'acos' )? 'selected' : null));

        echo $this->Html->nestedList($links, array('class' => 'acl_links'));*/
?>
        <button class="btn" onclick="window.location.href='<?php echo Router::url(array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'index', 'admin' => true)) ?>'">
                            <i class="icon-user"></i> Permissions</button>
                        <button onclick="window.location.href='<?php echo Router::url(array('plugin' => 'acl', 'controller' => 'acos', 'action' => 'index', 'admin' => true)) ?>'" class="btn btn-primary"><i class="icon-cog"></i> Settings</button>
	<?php }
	?>