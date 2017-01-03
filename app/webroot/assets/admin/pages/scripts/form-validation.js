var FormValidation = function () {

    // Form Configuration validation
    var FormConfigValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
        if($('.form-horizontal').attr('id') == 'FormConfiguration') {
            var form3 = $('#FormConfiguration');

            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            var form_mode = form3.attr('id');
            form_mode = $('#'+form_mode).attr('class').split(' ')[1];

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    "data[FormConfiguration][KEY_ALIAS]": {
                        minlength: 2,
                        required: true
                    },
                    "data[FormConfiguration][TOOL_TIP]": {
                        minlength: 2,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success3.hide();
                    error3.show();
                    setTimeout(function() {
                        error3.hide();
                    }, 4000);
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    var form_data = form3.serialize();
                    var url = '';

                    if(form_mode == 'edit')
                    {
                        url = 'FormConfigurations/edit/'+$('#FormConfigurationFORMFIELDLABELPK').attr('value');
                    } else if(form_mode == 'add') {
                        url = 'FormConfigurations/add'
                    }

                    var response = insert_data(form_data, url,  'FormConfigurations', '#'+form3.attr('id'), success3, form_mode);
                    //success3.show();
                    error3.hide();
                }
            });
        }
    }

    // Form Configuration validation
    var FormRoleValidation = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        if($('.form-horizontal').attr('id') == 'Roles') {
            var form3 = $('#Roles');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            var form_id = form3.attr('id');
            var form_mode = $('#'+form_id).attr('class').split(' ')[1];

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    "data[Role][ROLE_NAME]": {
                        minlength: 2,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success3.hide();
                    error3.show();
                    setTimeout(function() {
                        error3.hide();
                    }, 4000);
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    var form_data = form3.serialize();
                    var url = '';

                    if(form_mode == 'edit')
                    {
                        url = form_id+'/edit/'+$('#RoleROLEMSTPK').attr('value');
                    } else if(form_mode == 'add') {
                        url = form_id+'/add'
                    }

                    var response = insert_data(form_data, url,  form_id, '#'+form3.attr('id'), success3, form_mode);
                    //success3.show();
                    error3.hide();
                }
            });
        }
    }

    var FormUMOValidation = function() {

        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        if($('.form-horizontal').attr('id') == 'UnitMeasurements') {
            var form3 = $('#UnitMeasurements');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            var form_id = form3.attr('id');
            var form_mode = $('#'+form_id).attr('class').split(' ')[1];

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    "data[UnitMeasurement][DIMENSION_TYPE]": {
                        required: true
                    },
                    "data[UnitMeasurement][DIMENSION_ID]": {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success3.hide();
                    error3.show();
                    setTimeout(function() {
                        error3.hide();
                    }, 4000);
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    var form_data = form3.serialize();
                    var url = '';

                    if(form_mode == 'edit')
                    {
                        url = form_id+'/edit/'+$('#UnitMeasurementDIMENSIONUNITMSTPK').attr('value');
                    } else if(form_mode == 'add') {
                        url = form_id+'/add'
                    }

                    var response = insert_data(form_data, url,  form_id, '#'+form3.attr('id'), success3, form_mode);
                    //success3.show();
                    error3.hide();
                }
            });
        }
    }
    // User Form validation
    var UserFormValidation = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        if($('.form-horizontal').attr('id') === 'Form') {
            var form3 = $('#Form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            var form_mode = form3.attr('id');
            form_mode = $('#'+form_mode).attr('class').split(' ')[1];

            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            form3.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            });

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    setTimeout(function() {
                        error3.hide();
                    }, 4000);
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
/*                    var form_data = form3.serialize();
                    var url = '';

                    if(form_mode == 'edit')
                    {
                      url = 'users/edit/'+$('#UserUSERMSTPK').attr('value');
                    } else if(form_mode == 'add') {
                      url = 'users/add'
                    }

                    var response = insert_data(form_data, url,  'users', '#'+form3.attr('id'), success3, form_mode);
                    //success3.show();
                    error3.hide();*/

                    form.submit();

                }
            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2me', form3).change(function () {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            // initialize select2 tags
            $("#select2_tags").change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

            //initialize datepicker
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
            $('.date-picker .form-control').change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            })
        }
    }

    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    return {
        //main function to initiate the module
        init: function () {

            handleWysihtml5();
            UserFormValidation();
            FormConfigValidation();
            FormRoleValidation();
            FormUMOValidation();
        }

    };

}();