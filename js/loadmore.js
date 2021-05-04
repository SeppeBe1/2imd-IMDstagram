$(document).ready(function() {

    
    $(document).on('click', '#loadmore', function(){
        alert("Load is ready");

        var ID = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: "lloadmore.php",

        });
    });

});