<?php


use ModulesGarden\Servers\VpsServer\Core\Helper\Lang;
use ModulesGarden\Servers\VpsServer\Core\ModuleConstants;
use ModulesGarden\Servers\VpsServer\Core\Http\View\Smarty;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Api;
use ModulesGarden\Servers\VpsServer\App\Helpers\CustomFields;
use ModulesGarden\Servers\VpsServer\App\Libs\VpsServer\Helpers\Params;


$hookManager->register(
        function ($args)
{
    if(basename($_SERVER['PHP_SELF']) != 'clientarea.php'){
        return;
    } else {

    }
        return <<<SCRIPT
        <script>
        $(document).ready(function(){
            $('.generate-password').parent().remove();
            $('#inputNewPassword1').unbind();   
            
            jQuery("#inputNewPassword1").keyup(function() {
                    var pwStrengthErrorThreshold = 50;
                    var pwStrengthWarningThreshold = 75;

                    var newPassword1 = jQuery("#newPassword1");
                    var pw = jQuery("#inputNewPassword1").val();
                    var pwlength=(pw.length);
                    if(pwlength<12)pwlength=0;
                    if(pwlength>=12)pwlength=1;
                    var numnumeric=pw.replace(/[0-9]/g,"");
                    var numeric=(pw.length-numnumeric.length);
                    if(numeric<1)numeric=0;
                    if(numeric>3)numeric=3;
                    var symbols=pw.replace(/\W/g,"");
                    var numsymbols=(pw.length-symbols.length);
                    if(numsymbols<1)numsymbols=0;
                    if(numsymbols>3)numsymbols=3;
                    var numupper=pw.replace(/[A-Z]/g,"");
                    var upper=(pw.length-numupper.length);
                    if(upper<1)upper=0;
                    if(upper>3)upper=3;
                    var numdown=pw.replace(/[a-z]/g,"");
                    var down=(pw.length-numdown.length);
                    if(down<1)down=0;
                    if(down>3)down=3;
                    var pwstrength = 0;
                    if(pwlength<1 || numeric<1 || numsymbols<1 || upper<1 || down<1) {
                        pwlength=pwlength?1:0;
                        numeric=numeric?1:0;
                        numsymbols=numsymbols?1:0;
                        upper=upper?1:0;
                        down=down?1:0;
                        pwstrength = ((pwlength*10))+(numeric*10)+(numsymbols*10)+(upper*10)+(down*10);
                    }else{
                      pwstrength=((pwlength*12))+(numeric*11)+(numsymbols*15)+(upper*7)+(down*5);
                    }
                    if (pwstrength < 0) pwstrength = 0;
                    if (pwstrength > 100) pwstrength = 100;
                    newPassword1.removeClass('has-error has-warning has-success');
                    jQuery("#inputNewPassword1").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
                    jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
                    jQuery("#passwordStrengthBar .progress-bar .sr-only").html('New Password Rating: ' + pwstrength + '%');
                    if (pwstrength < pwStrengthErrorThreshold) {
                        newPassword1.addClass('has-error');
                        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-remove');
                        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
                    } else if (pwstrength < pwStrengthWarningThreshold) {
                        newPassword1.addClass('has-warning');
                        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-warning-sign');
                        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
                    } else {
                        newPassword1.addClass('has-success');
                        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-ok');
                        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
                    }
                    validatePassword2();
                });
        }); 
      </script>
SCRIPT;
    }, 1001
);

$hookManager->register(
    function ($args)
{
if(basename($_SERVER['PHP_SELF']) != 'clientarea.php'){
    return;
} else {
    return <<<SCRIPT
    <script>
    $(document).ready(function(){
        if($('#unavailableServer').length > 0){
            $('div[menuitemname="Service Details Actions"]').remove();
            $('div[menuitemname="mg-provisioning-module"]').remove();
        }
    }); 
  </script>
SCRIPT;
}

}, 1002
);



