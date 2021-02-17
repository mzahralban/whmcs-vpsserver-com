<div class=" text-left lu-modal show lu-modal--info modal--{$rawObject->getModalSize()} modal--zoomIn" id="confirmationModal">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content" id="mgModalContainer">
            <div class="lu-modal__top lu-top">
                <div class="lu-top__title lu-type-6">
                <span class="lu-text-faded lu-font-weight-normal">
                    {if $rawObject->isRawTitle()}{$rawObject->getRawTitle()}{elseif $rawObject->getTitle()}{$MGLANG->T('modal', $rawObject->getTitle())}{/if}
                </span>
                </div>
                <div class="lu-top__toolbar">
                    <button class="lu-btn lu-btn--xs lu-btn--danger lu-btn--icon lu-btn--link lu-btn--plain closeModal" data-dismiss="lu-modal" aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                {foreach from=$rawObject->getForms() item=form }
                    {$form->getHtml()}
                {/foreach}
            </div>
            <div class="lu-modal__actions text-center ">
                <button class="lu-btn lu-btn--danger lu-btn--outline lu-btn--plain closeModal" @click="closeModal($event)">
                    Close
                </button>
            </div>
            <div class="lu-modal__actions">
                {if ($isDebug eq true AND (count($MGLANG->getMissingLangs()) != 0))}{literal}
                    <div class="lu-row">
                        {/literal}{foreach from=$MGLANG->getMissingLangs() key=varible item=value}{literal}
                            <div class="lu-col-md-12"><b>{/literal}{$varible}{literal}</b> = '{/literal}{$value}{literal}';</div>
                        {/literal}{/foreach}{literal}
                    </div>
                {/literal}{/if}
            </div>
        </div>
    </div>
</div>