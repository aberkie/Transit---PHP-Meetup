$( document ).ready(function() {
     
    // delete counter
    $('a.delete').click(function(e) {
        
        e.preventDefault();
        if (confirm('Delete this Station?')) {
            Craft.postActionRequest('transit/station/delete', {'id': $(this).data('id')});
            $(this).closest('tr').slideUp();
            Craft.cp.displayNotice('Station Deleted');
        }       

    });
});