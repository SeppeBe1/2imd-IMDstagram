$(document).ready(function() {

    
    $(document).on('click', '#loadmore', function(){
        alert("Load is ready");

        // var ID = $(this).attr('id');
        // console.log(ID);
        var row = Number($('#row').val());
        console.log(row);
        var allTotal = Number($('#all').val());
        console.log(allTotal);


        $.ajax({
            type: "POST",
            url: "loadmore.php",

        });
    });

});