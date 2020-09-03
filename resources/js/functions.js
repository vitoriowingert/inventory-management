function deleteItem(form){
    if(!confirm('Confirma a exclusão?')) return false;

    var id = form[0][2].value;
    var fomrData = form.serialize();

    $.ajax({
        type: "POST",
        url: 'deleteItem',
        data: fomrData,
        success: function( data )
        {
            alert( data.msg );
        }
    });

    return false;
}
