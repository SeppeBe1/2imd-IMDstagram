$(document).ready(function() {

    
    $(document).on('click', '#loadmore', function(){
        // alert("Ready to load");

        // var ID = $(this).attr('id');
        // console.log(ID);
        var row = Number($('#row').val());
        console.log(row);
        var allTotal = Number($('#all').val());
        console.log(allTotal);

        // row = row + 3;
        limit = parseInt($("#loadmore").attr("data-totalPosts"));
        limit = limit + 1;
        $("#loadmore").attr('data-totalPosts', limit);

        if(limit <= allTotal){
            // console.log("Er zijn nog posts!");
            // $("#row").val(row);
            
            // console.log(test);

            // limit = limit + 4;
            // console.log(limit);


            $.ajax({
                url: 'loadmore.php',
                type: 'POST',
                data: {totalPosts: limit},
                
                beforeSend:function(){
                    // THE TEXT OF THE BUTTON CHANGES TO SHOW THE USER THE CONTENT IS LOADING
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // TIMEOUT FUNCTION --> NECESSARY?
                    setTimeout(function() {
                        $(".post-load:last").after(response).show().fadeIn("slow");

                        var rowno = limit + 1;

                        // CHECK IF ROWVALUE > TOTAL AMOUNT OF POSTS
                        if(rowno > allTotal){

                            // CHANGE, JUST TO CHECK
                            $('.load-more').text("Hide");
                            $('.load-more').css("background","hotpink");
                        }else{
                            $(".load-more").text("Load more");
                        }
                    }, 100);
                }
            });
        }else{
            $('.load-more').text("Loading...");

            // AGAIN TIMER NECESSARY?
            setTimeout(function() {

                // WHEN ROW > TOTALPOSTS
                $('.post-load:nth-child(3)').nextAll('.post-load').remove().fadeIn("slow");

                // VALUE ROW + 0
                $("#row").val(0);

            }, 100);


        }


        
    });

});