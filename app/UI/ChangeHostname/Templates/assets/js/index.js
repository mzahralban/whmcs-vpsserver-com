
function hrToggleCreateButton(data) {
    let button = $("#changeHostnameTable .lu-top__toolbar a");
    if(data.htmlData.createButton)
    {
        button.removeClass('hidden');
    }
    else
    {
        button.addClass('hidden');
    }
}