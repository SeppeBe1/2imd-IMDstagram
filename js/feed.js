$(document).ready(function() {
    $(document).on('click', ".like", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "like_unlike.php",
            data: { like: 1, id: id },
            success: function(data) {
                $('[data-id="' + id + '"].like-status').attr("src", "./img/icons/heart.svg");
                $('[data-id="' + id + '"].like-status').removeClass("like");
                $('[data-id="' + id + '"].like-status').addClass("unlike");
                $('[data-id="' + id + '"].likescount').html(data);
            }
        })
    });

    $(document).on('click', ".unlike", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "like_unlike.php",
            data: { like: 0, id: id },
            success: function(data) {
                $('[data-id="' + id + '"].like-status').attr("src", "./img/icons/heart-outlines.svg");
                $('[data-id="' + id + '"].like-status').removeClass("unlike");
                $('[data-id="' + id + '"].like-status').addClass("like");
                $('[data-id="' + id + '"].likescount').html(data);
            }
        })
    });
    


//COMMENTS TOGGLE
// document .querySelector("#link-c") .addEventListener("click", toggleText);
//    function toggleText() {
//       var x = document.querySelector("#link-c");
//       if (x.innerHTML === "Hide comments") {
//          x.innerHTML = "Show comments";
//       } else {
//          x.innerHTML = "Hide comments";
//       }
//    }


//ADD COMMENT
document.querySelector('#btnAddComment').addEventListener("click",function(e){
    e.preventDefault();
    let postId = this.dataset.postid;
    let text = document.querySelector('#comment-input').value;
    
    

    //comment naar database
    let formData = new FormData();
    formData.append('text', text);
    formData.append('postId',postId);
    
    
    

    fetch("saveComment.php",{
        method: 'POST',
        body : formData
        })

        //antwoord parsen in JSON formaat & doorgeven als resultaat
        .then(response => response.json())
        .then(result =>{
            let newComment = document.createElement("div");
            newComment.innerHTML = result.body;
            document
                .querySelector(".comments_list")
                .appendChild(newComment);
            
            console.log("Success:", result);
        })
        .catch(error =>{
            console.error("Error:", error);
        });

});

});