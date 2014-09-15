$(document).ready(function(){
    $('#deleteButton').on('click', function(){
        $('#delete').val(1);
        $(this).closest('form').submit();
    });
});