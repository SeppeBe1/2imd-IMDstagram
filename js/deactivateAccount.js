    $('#deactivate').on('click', function(e) {
        let userId = $(this).attr("data-userId");

        $.ajax({
            type: "POST",
            url: "deactivateAccount.php",
            data: { userId: userId },
        })
    });