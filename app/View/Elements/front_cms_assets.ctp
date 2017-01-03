<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/minify232d.css?file=jctBCoAwDAXRC1VijxRCkGLSSH-L9PaCILjs9jGT6Y6QcNcmSgxoBwnw5814xugpr7RwNoM01bo0pJ1GLefLl42jVHyEPk0f.css" media="all">
<link  rel='stylesheet' id='dynamic-styles-css'  href='<?php echo SITE_URL; ?>css/dynamic-styles3a05.css?ver=4.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='unik-roboto-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A400%2C100%2C100italic%2C300%2C300italic%2C400italic%2C500%2C500italic%2C700%2C700italic&amp;ver=4.2.2' type='text/css' media='all' />
<link  rel='stylesheet' id='unik-opensans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C400%2C700%2C600%2C300&amp;ver=4.2.2' type='text/css' media='all' />
<script type="text/javascript" src="<?php echo SITE_URL; ?>/js/minify7ccb.js?file=M9bPKixNLarUMYYydHMz04sSS1L1cjPzdAz0S_Mys_WzivWT8vNLikuKEgsA.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="<?php echo SITE_URL; ?>js/jquery-1.12.1.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>global/plugins/flexislider/jquery.flexslider-min.js"></script>
<script>

var validateNumeric = function($name) {
         var nameReg = /^([^A-Za-z]*)$/;
         if( !nameReg.test( $name ) ) {
             return false;
          } else {
            return true;
           }
         } // end of function

         var validateMobile = function($name) {
            
           if($name.length != MOBILEMAXLENGTH) {
               return false;
            }
                 var mobilereg = /^[789]\d{9}$/;
            if( !mobilereg.test( $name ) ) {
             return false;
          } else {
            return true;
           }     
            //return validateNumeric($name);
         } // end of function
         
         var numbersonly = function(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ 
        if (unicode<48||unicode>57) 
            return false 
    }
}

var validateEmail = function(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} // end of function



</script>

