
<div class="lu-widget">
    <form id="changeHost" method="post">
        <div class="lu-widget__body ">
            <div class="lu-widget__content">
                {if $customTplVars.successChange}
                    <div class="lu-row">
                        <div class="lu-col-md-12">
                            <div class="alert alert-success text-center">
                                {$MGLANG->T('hostnameChangeSuccessfully')}
                            </div>
                        </div>
                    </div>
                    <div class="lu-row" style="margin-bottom:10px;">
                        <div class="lu-col-md-12 text-center">
                            <a class="lu-btn lu-btn--primary"
                               href="clientarea.php?action=productdetails&id={$customTplVars.id}" style="margin-top:24px; width:140px;">
                                {$MGLANG->T('backToOverview')}
                            </a>
                        </div>
                    </div>
                {else}
                    <div class="lu-row">
                        <div class="lu-col-md-9">
                            <div class="lu-form-group">
                                <label class="lu-form-label"> {$MGLANG->T('hostnameLabel')}</label>
                                <input type="text" placeholder="" id="hostname" name="hostname"value="{$customTplVars.hostname}" class="lu-form-control">
                            </div>
                        </div>
                        <div class="lu-col-md-3">
                            <button class="lu-btn lu-btn--success submitForm" type="button" id="hostnameChange" name="hostnameChange"  style="margin-top:24px; width:140px;">
                                <span id="confirm"> {$MGLANG->T('hostnameButton')}</span>
                                <span id="spinner" class="click-text" style="display:none;margin-top: 5%;"><i class="lu-preloader lu-preloader--sm"></i></span>
                            </button>
                        </div>
                    </div>
                {/if}
            </div>
        </div>
    </form>
</div>

<script>

    $(document).ready(function(){
        $('#hostnameChange').on('click', function(){
            $('#saveDanger').hide();
            $("#hostnameChange").attr('disabled', true);
            $('#confirm').hide();
            $('#spinner').show();
            $.ajax({
                method: "POST",
                dataType: "json",
                data:{
                    hostname : $('#hostname').val()
                }
            }).done(function(response) {
                $('#changeHostnameConfirm').attr('disabled', false)
                $('#changeHostnameModal').attr("style", "display:absolute !important");
                $('#saveWarning').show();
                if(!response.response.result)
                {
                    $('#changeHostnameConfirm').attr('disabled', true)
                    $('#saveWarning').hide();
                    $('#saveDanger').show();
                    $('#saveError').text(response.response.message);
                }
                $("#hostnameChange").attr('disabled', false);
                $('#confirm').show();
                $('#spinner').hide();
            });
        })
        $('#changeHostnameConfirm').on('click', function(e){
            $("#changeHostname").attr('disabled', true);
            $('#confirm2').hide();
            $('#spinner2').show();
            setTimeout(function(){
                $.ajax({
                    method: "POST",
                    dataType: "json",
                    data:{
                        changedHostname : $('#hostname').val()
                    }
                }).done(function(response) {
                    if(!response.response.result)
                    {
                        $('#saveDanger').show();
                        $("#hostnameChange").attr('disabled', false);
                        $('#confirm2').show();
                        $('#spinner2').hide();
                    } else {
                        window.location.href = 'clientarea.php?action=productdetails&id='+response.response.id+'&modop=custom&a=management&mg-page=changeHostname&successChange=1';
                    }
                });
            }, 1000)
        })

        $(document).on('click', '.closeModal', function(){
            $('#changeHostnameModal').attr("style", "display:none !important");
        })
    })

</script>

<div class="text-left lu-modal show lu-modal--md" id="changeHostnameModal" style="display:none !important;">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content" id="mgModalContainer">
            <div class="lu-modal__top lu-top">
                <div class="lu-top__title lu-type-6">
                    <span class="lu-text-faded lu-font-weight-normal">
                        {$MGLANG->T('hostnameButton')}
                    </span>
                </div>
                <div class="lu-top__toolbar">
                    <button class="lu-btn lu-btn--xs lu-btn--danger lu-btn--icon lu-btn--link lu-btn--plain closeModal" data-dismiss="lu-modal" aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <div class="lu-row">
                    <div class="lu-col-md-12" id="saveWarning">
                        <div class="alert alert-warning"><b>{$MGLANG->T('modalConfirmation')}</b></div>
                    </div>
                    <div class="lu-col-md-12" id="saveDanger" style="display:none;">
                        <div class="alert alert-danger"><b id="saveError"></b></div>
                    </div>
                </div>
            </div>
            <div class="lu-modal__actions">
                <button class="lu-btn lu-btn--success submitForm" id="changeHostnameConfirm" style="width:75px">
                    <span id="confirm2">{$MGLANG->T('baseConfirm')}</span>
                    <span id="spinner2" class="click-text" style="display:none;margin-top: 15%;"><i class="lu-preloader lu-preloader--sm"></i></span>
                </button>
                <button class="lu-btn lu-btn--danger lu-btn--outline lu-btn--plain closeModal" >
                    {$MGLANG->T('baseCancel')}
                </button>
            </div>
        </div>
    </div>
</div>