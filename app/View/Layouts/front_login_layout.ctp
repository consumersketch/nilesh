<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title><?php echo WEBSITE_NAME; ?> </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="keywords" content="<?php // echo $meta_keywords ?>"/>
    <meta name="description" content="<?php // echo $meta_description ?>"/>
    <meta content="" name="author"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Identifier-URL" content="<?php echo SITE_URL; ?>"/>
    <script type="text/javascript">
        var JS_SITEURL = "<?php echo SITE_URL; ?>";
    </script>
    <?php echo $this->element('front_login_assets'); ?>
</head>
<body class="login">
<div class="logo">
        
</div>

<div class="menu-toggler sidebar-toggler">
</div>

<div class="content">
<?php echo $this->fetch('content'); ?>
</div>
<?php echo $this->element('front_login_footer'); ?>

<?php echo $scripts_for_layout; ?>


<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer'))
    echo $this->Js->writeBuffer();


    if (is_file(WWW_ROOT . 'css' . DS . $this->params['controller'] . '.css')) {
        echo $html->css($this->params['controller']);
    }
    if (is_file(WWW_ROOT . 'css' . DS . $this->params['controller'] . DS . $this->params['action'] . '.css')) {
        echo $html->css($this->params['controller'] . '/' . $this->params['action']);
    }
	
	if (is_file(WWW_ROOT . 'js' . DS . $this->params['controller'] . '.js')) {
        echo $this->Html->script($this->params['controller'].'.js');
    }
    if (is_file(WWW_ROOT . 'css' . DS . $this->params['controller'] . DS . $this->params['action'] . '.js')) {
        echo $html->js($this->params['controller'] . '/' . $this->params['action']);
    }
	
?>
</body>

</html>
<?php // echo $this->element('sql_dump'); ?>
