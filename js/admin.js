    $('.deletePost').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        console.log(id);

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

        console.log(id);

        $.ajax({
            type: "POST",
            url: "adminSetPost.php",
            data: { id: id },
            success: function() {
                $('[data-id="' + id + '"]').closest(".post-post").slideUp();
            }
        })
    });