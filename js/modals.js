    /**
 * @author Rogerio Ferracin
 */

(function($) {

    $.fn.myBSAlerts = function(options, callback) {

        // Criar alguns padrões, estendendo-os com todas as opções que foram fornecidos
        var s = $.extend({
            type: null, //Can be alert, prompt ou confirm 
            modalSize: 'modal-sm', //Can be modal-sm or modal-lg
            okButtonText: 'Ok',
            cancelButtonText: 'Cancel',
            yesButtonText: 'Yes',
            noButtonText: 'No',
            headerText: 'Alert',
            messageText: 'Alert from system',
            headerBkgColor: '#428bca',
            headerFontColor: '#FFF',
            inputFieldType: 'text',
            
            alert: function(callback) {
                s._show('alert', callback);
            },
            confirm: function(callback) {
                s._show('confirm', function(result) {
                    if (callback)
                        callback(result);
                });
            },
            prompt: function(callback) {
                s._show('prompt', function(result) {
                    if (callback)
                        callback(result);
                });
            },
            //metodos privados
            _show: function(type, callback) {
                $('BODY').append(
                        '<div id="myAlerts" class="modal fade">' +
                        '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                        '<div id="myAlerts-header" class="modal-header">' +
                        '<button id="close-button" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
                        '<h4 id="myAlerts-title" class="modal-title">Modal title</h4>' +
                        '</div>' +
                        '<div id="myAlerts-body" class="modal-body">' +
                        '<table border="0"><tr><td style="padding-right:30px;" width="10%" id="myAlerts-glyph"></td><td width="80%" id="myAlerts-message" ></td></tr></table>' +
                        '</div>' +
                        '<div id="myAlerts-footer" class="modal-footer">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                        );
                $('#myAlerts-body td').css('vertical-align', 'middle');
                $('.modal-dialog').addClass(s.modalSize);


                //determina a categoria
                switch (type) {
                    case 'alert':

                        s._setHeaderColor(s.headerBkgColor, s.headerFontColor);
                        $('#myAlerts-title').text(s.headerText);
                        $('#myAlerts-glyph').html('<i class="glyphicon glyphicon glyphicon-info-sign"></i>').css('color', s.headerBkgColor).css('font-size', '3em');
                        $('#myAlerts-message').html(s.messageText);
                        $('#myAlerts-footer').html('<button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>' + s.okButtonText + '</button>').on('click', function() {
                            s._hide();
                            if (callback)
                                callback(true);
                        });
                        break;
                    case 'confirm':
                        s._setHeaderColor(s.headerBkgColor, s.headerFontColor);
                        $('#myAlerts-title').text(s.headerText);
                        $('#myAlerts-glyph').html('<i class="glyphicon glyphicon glyphicon-info-sign"></i>').css('color', s.headerBkgColor).css('font-size', '3em');
                        $('#myAlerts-message').html(s.messageText);
                        $('#myAlerts-footer').html('<button id="ok-btn" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>' +
                                s.okButtonText + '</button>' +
                                '<button id="close-btn" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span>' +
                                s.cancelButtonText + '</button>').on('click', 'button', function(e) {
                            if (e.target.id === 'ok-btn') {
                                s._hide();
                                if (callback)
                                    callback(true);
                            } else if (e.target.id === 'close-btn') {
                                s._hide();
                                if (callback)
                                    callback(false);
                            }
                        });
                        break;
                    case 'prompt':
                        s._setHeaderColor(s.headerBkgColor, s.headerFontColor);
                        $('#myAlerts-title').text(s.headerText);
                        $('#myAlerts-glyph').html('<i class="glyphicon glyphicon glyphicon-info-sign"></i>').css('color', s.headerBkgColor).css('font-size', '3em');
                        $('#myAlerts-message').html(s.messageText + '<br /><br /><div class="form-group"><input type="' + s.inputFieldType + '" class="form-control" id="prompt" /></div>');
                        $('#myAlerts-footer').html('<button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>' + s.okButtonText + '</button>').on('click', function() {
                            var val = $('#prompt').val();
                            s._hide();
                            if (callback)
                                callback(val);
                        });
                        break;
                }

                //inicializa o modal
                $('#myAlerts').modal();
            },
            _hide: function() {
                $('#myAlerts').modal('hide');
                $('#myAlerts').on('hidden.bs.modal', function(e) {
                    $('#myAlerts').remove();
                });
            },
            _setHeaderColor: function(bkg_color, font_color) {
                $('.modal-header').css({
                    'padding': '15px 15px',
                    'border-bottom': '1px solid #eee',
                    'background-color': bkg_color,
                    'color': font_color,
                    '-webkit-border-top-left-radius': '5px',
                    '-webkit-border-top-right-radius': '5px',
                    '-moz-border-radius-topleft': '5px',
                    '-moz-border-radius-topright': '5px',
                    'border-top-left-radius': '5px',
                    'border-top-right-radius': '5px'
                });
            }
        }, options);

          
        return this.each(function() {
            if (s.type === null) {
                console.log('TYPE must be one of the three types: alert, confirm or prompt, please setup plugin correctly');
                return false;
            }
            ;
            if (s.type === 'alert') {
                s.alert();
            }
            if (s.type === 'confirm') {
                s.confirm(callback);
            }
            if (s.type === 'prompt') {
                s.prompt(callback);
            }
        });
    };

})(jQuery); 

            $(document).ready(function() {
                $('#btn-alert').on('click', function() {
                    $(document).myBSAlerts({
                        type: 'alert'
                    });
                });
                $('#btn-confirm').on('click', function() {
                    $(document).myBSAlerts({
                        headerText: 'Confirm',
                        messageText: 'Confirmation text send by client!!! Return true or false',
                        type: 'confirm',
                        modalSize: 'modal-lg'
                    }, function(r){
                        alert(r);
                    });
                });
                $('#btn-prompt').on('click', function() {
                    $(document).myBSAlerts({
                        headerText: 'Prompt!!!',
                        messageText: 'Prompt text send by client!!! Will return the value submited anda can be personalized to password field',
                        inputFieldType: 'text',
                        type: 'prompt'
                    }, function(r){
                        alert(r);
                    });
                });
            });
