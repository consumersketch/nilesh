<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?php echo WEBSITE_NAME; ?> | Login Page</title>
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
    <?php echo $this->element('admin_login_assets'); ?>
</head>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
        <h3 class="form-title">
        <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'dashboard', 'admin' => true))?>"><?php echo $this->Html->image('logo-big.png', array('alt' => 'Logo', 'title' => '')); ?></a>
        </h3>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- BEGIN LOGIN -->
<div class="content">
<?php echo $this->fetch('content'); ?>
</div>
<?php echo $this->element('admin_login_footer'); ?>
<!-- END LOGIN -->

<!-- scripts_for_layout -->
<?php echo $scripts_for_layout; ?>
<!-- Js writeBuffer -->

<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer'))
    echo $this->Js->writeBuffer();
// Writes cached scripts
?>
</body>
<!-- END BODY -->
</html>
<?php // echo $this->element('sql_dump'); ?>
