<div class="row" style="margin-bottom:15px;">
    <div class="col-md-12">
        {foreach from=$rawObject->getFields() item=field }
        <div class="col-md-4" style="padding-left:0px !important;">
            <label class="lu-form-label">
                {$MGLANG->T($field->getId())}
            </label>
            <select 
                class="lu-form-control" 
                name="{$field->getName()}"
            >
            {foreach from=$field->getAvalibleValues() key=opValue item=option}
                <option value="{$opValue}" {if $field->getValue() == $opValue}selected{/if}>
                    {$option}
                </option>
            {/foreach}
            </select>
        </div>
        {/foreach}
   </div>
</div>