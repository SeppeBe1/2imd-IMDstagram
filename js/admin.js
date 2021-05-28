    $('.deletePost').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "adminDelete.php",
            data: { id: id },
            success: function(response) {
                $('[data-id="' + id + '"]').closest(".post-post").slideUp();
                // alert(json.html);
                alert(response.message);
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
            success: function(response) {
                $('[data-id="' + id + '"]').closest(".post-post").slideUp();
                alert(response.message);
            }
        })
    });

    $('.banUser').on('click', function(e) {
        e.preventDefault();
        let postId = $(this).attr("data-postId");
        let userId = $(this).attr("data-userId");

        $.ajax({
            type: "POST",
            url: "adminBanUser.php",
            data: { postId: postId, user_id: userId },
            success: function(response) {
                $('[data-postId="' + postId + '"]').closest(".post-post").slideUp();
                alert(response.message);
            }
        })
    });