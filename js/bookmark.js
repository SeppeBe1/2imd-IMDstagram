$(document).ready(function() {
    $(document).on('click', ".bookmark", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "bookmark.php",
            data: { bookmark: 1, id: id },
            success: function(data) {
                $('[data-id="' + id + '"].bookmark-status').attr("src", "./img/icons/bookmark-fill.svg");
                $('[data-id="' + id + '"].bookmark-status').removeClass("bookmark");
                $('[data-id="' + id + '"].bookmark-status').addClass("unbookmark");
            }
        })
    });

    $(document).on('click', ".unbookmark", function() {
        var id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "bookmark.php",
            data: { bookmark: 0, id: id },
            success: function(data) {
                $('[data-id="' + id + '"].bookmark-status').attr("src", "./img/icons/bookmark.svg");
                $('[data-id="' + id + '"].bookmark-status').removeClass("unbookmark");
                $('[data-id="' + id + '"].bookmark-status').addClass("bookmark");
            }
        })
    });

});