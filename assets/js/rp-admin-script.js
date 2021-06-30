jQuery( document ).ready( function($) {
	if($(".rp_content_addition #submit").length){
        $( document ).on( 'click', '.rp_content_addition #submit', function( event ) {
            event.preventDefault();
            var $button = $( this );
            $button.parent().parent().find(".spinner").css("visibility", "visible");
            var domain_name =  $("input[name='domain_name']").val();
            var domain_ip =  $("textarea[name='domain_ip']").val();

            // set ajax data
            var data = {
                'action' : 'rp_domain_addition_deletion',
                'domain_name' : domain_name,
                'domain_ip' : domain_ip,
            };
            $(".rp_status").remove();
            $.post( ajaxurl, data, function( response_addition ) {
                $button.parent().parent().find(".spinner").css("visibility", "hidden");
                if(response_addition.success){
                    jQuery('#TB_ajaxContent').prepend('<div class="updated fade rp_status"><p> Domain added successfully!</p></div>');
                    setTimeout(function(){ location.reload(); }, 1000);
                } else {
                    jQuery('#TB_ajaxContent').prepend('<div class="error fade rp_status"><p>Error while adding domain</p></div>');
                }
            }).fail(function() {
                $button.parent().parent().find(".spinner").css("visibility", "hidden");
                jQuery('#TB_ajaxContent').prepend('<div class="error fade rp_status"><p>Error Occurred</p></div>');
            });
        });

    }
    if($(".rp_content_edit #submit_edit").length){
        $( document ).on( 'click', '.rp_content_edit #submit_edit', function( event ) {
            event.preventDefault();
            var $button = $( this );
            id = $button.data('count');
            $button.parent().parent().find(".spinner").css("visibility", "visible");
            var domain_name =  $("input[name='domain_name_"+ id+"']").val();
            var domain_ip =  $("textarea[name='domain_ip_"+id+"']").val();

            // set ajax data
            var data = {
                'action' : 'rp_domain_addition_deletion',
                'domain_name' : domain_name,
                'domain_ip' : domain_ip,
            };
            $(".rp_status").remove();
            $.post( ajaxurl, data, function( response_addition ) {
                $button.parent().parent().find(".spinner").css("visibility", "hidden");
                if(response_addition.success){
                    jQuery('#TB_ajaxContent').prepend('<div class="updated fade rp_status"><p>Domain Updated successfully!</p></div>');
                    setTimeout(function(){ location.reload(); }, 1000);
                } else {
                    jQuery('#TB_ajaxContent').prepend('<div class="error fade rp_status"><p>Error while updating the domain</p></div>');
                }
            }).fail(function() {
                $button.parent().parent().find(".spinner").css("visibility", "hidden");
                jQuery('#TB_ajaxContent').prepend('<div class="error fade rp_status"><p>Error Occurred</p></div>');
            });
        });

    }
    if($(".rp-remove-it").length){
        $( document ).on( 'click', '.rp-remove-it', function( event ) {
            event.preventDefault();
            if (window.confirm('You want to remove domain?')){
                var $button = $(this);
                $button.parent().parent().find(".spinner").css("visibility", "visible");
                var domain = $button.data("domain");

                // set ajax data
                var data = {
                    'action': 'rp_domain_addition_deletion',
                    'domain_delete': domain,
                };
                $(".rp_status").remove();
                $.post(ajaxurl, data, function (response_delete) {
                    $button.parent().parent().find(".spinner").css("visibility", "hidden");
                    if (response_delete.success) {
                        jQuery('#history-filter').prepend('<div class="updated fade rp_status"><p> Domain deleted successfully!</p></div>');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        jQuery('#history-filter').prepend('<div class="error fade rp_status"><p>Error while deleting domain</p></div>');
                    }
                }).fail(function () {
                    $button.parent().parent().find(".spinner").css("visibility", "hidden");
                    jQuery('#history-filter').prepend('<div class="error fade rp_status"><p>Error Occurred</p></div>');
                });
            };
        });

    }
});