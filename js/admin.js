    $('.deletePost').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "adminDelete.php",
            data: { id: id },
            success: function() {
                $('[data-id="' + id + '"]').closest(".post-post").slideUp();
            }
        })
    });

    $('.setPost').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "adminSetPost.php",
            data: { id: id },
            success: function() {
                $('[data-id="' + id + '"]').closest(".post-post").slideUp();
            }
        })
    });

    $('.banUser').on('click', function(e) {
        e.preventDefault();
        let postId = $(this).attr("data-postId");
        let userId = $(this).attr("data-userId");


        console.log(id);

        $.ajax({
            type: "POST",
            url: "adminBanUser.php",
            data: { postId: postId, user_id: userId },
            success: function() {
                $('[data-postId="' + postId + '"]').closest(".post-post").slideUp();
            }
        })
    });