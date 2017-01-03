<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>global/plugins/data-tables/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link href="<?php echo ASSETS_URL; ?>global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>

<!--<link href="<?php /*echo ASSETS_URL; */?>global/plugins/select2/select2-metronic.css" rel="stylesheet" type="text/css"/>-->

<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-datepicker/css/datepicker.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>




<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo ASSETS_URL; ?>global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo ASSETS_URL; ?>admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_URL; ?>admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<?php //echo $this->Html->css('admin/inherit'); ?>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>favicon.png" />

<!--[if lt IE 9]>
<script src="<?php echo ASSETS_URL; ?>global/plugins/respond.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo ASSETS_URL; ?>global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_URL; ?>global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_URL; ?>admin/pages/scripts/multiupload.js" type="text/javascript"></script>

<script>
var SITE_URL = '<?php echo SITE_URL; ?>';
var BANNER_SELECT_EVENT = '';
var BANNER_OCCASIONAL = '';
var BANNER_ADDURL = '';
var BANNER_REMOVE = '';
var FORM_FILE_EXTENTIONS = ['.jpg', '.jpeg', '.png'];

var file_valid_extentions = function(fileName) {
	var exts = FORM_FILE_EXTENTIONS;
	return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
	
}// end of functions

var file_valid_filesize = function(fileName){
	return (fileName[0].files[0].size <= 1048576)?true:false;
}// end of functions
</script>