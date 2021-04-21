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
});