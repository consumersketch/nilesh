<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php echo WEBSITE_NAME; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="keywords" content="<?php // echo $meta_keywords ?>"/>
    <meta name="description" content="<?php // echo $meta_description ?>"/>
    <meta content="" name="author"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Identifier-URL" content="<?php echo SITE_URL; ?>"/>
    <?php echo $this->element('admin_form_assets'); ?>
    <script type="text/javascript">
        var JS_SITEURL = "<?php echo SITE_URL; ?>";
        var ADMINURL = "<?php echo RESOURCES_DIRECTORY; ?>";
        var REQUEST_URL = "<?php echo ADMIN_URL; ?>";
    </script>
	<style>
	
	.dfds {
		    text-align: center;
			width: 73%;
			margin: 10px auto;
			display: inline-table;
			font-size:20px;
	}
	</style>
</head>

<body class="page-header-fixed ">

<div class="page-header navbar navbar-fixed-top">

    <div class="page-header-inner">
        <div class="page-logo">
					<h2><a href="<?php echo Router::url(array('controller'=>'Users','action'=>'dashboard')) ?>"><?php echo WEBSITE_NAME ; ?></a> <br />
					
					</h2>
					
					
					<?php //pr($authUser);die; ?>
                <?php  # echo $this->Html->image('logo-small.png', array('alt' => WEBSITE_NAME, 'title' => WEBSITE_NAME)); ?>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>

        <div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </div>
		
		<div class="dfds"><marquee><?php  
				 if(in_array($authUser['role_id'],array(SUPER_ADMIN_ID))) {
				echo 'Administrator Area';
				
		}else{
			$this->Restaurant = ClassRegistry::init('Restaurant');
						echo $this->Restaurant->getRestaurantName($authUser['restaurant_id']);
		}
						
						
					?></marquee></div>
        <?php echo $this->element('admin_default_top_menu'); ?>
   </div>
</div>
<div class="clearfix">
</div>
<div class="page-container">
    <?php  
			echo $this->element('admin_left_rights'); 
	?>
    <?php echo $this->fetch('content'); ?>
    <?php // echo $this->element('sql_dump'); ?>
</div>
<?php echo $this->element('admin_form_footer'); ?>

<?php echo $scripts_for_layout; ?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer'))
    echo $this->Js->writeBuffer();
?>
</body>
</html>