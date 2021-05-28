$(document).ready(function() {
    // FOLLOW
    document.querySelector(".followBtn").addEventListener("click", function() {  
        console.log("requested");
        if  ($(".followBtn").hasClass("btn-sendRequest") ){
            
                $(".followBtn").removeClass( "btn-sendRequest btn-follow" ).addClass( "btn-requested" );
                $(".followBtn").html("Requested");

            console.log("requested");
            let isFollowing = this.dataset.followid;
            console.log(isFollowing);

            //follower naar database
            let formData = new FormData();
            formData.append('isFollowing', isFollowing);

            fetch("ajax_sendRequest.php",{
                method: 'POST',
                body : formData
                
                })
                //antwoord parsen in JSON formaat & doorgeven als resultaat
                .then(response => response.json())
                .then(result =>{
                    
                    console.log("Success:", result);
                })
                .catch(error =>{
                    console.error("Error:", error);
                });

            }  else {
                $(".followBtn").removeClass( "btn-requested btn-follow" ).addClass( "btn-sendRequest" );
                $(".followBtn").html("Send request");
                
                console.log("send request");
                let isFollowing = this.dataset.followid;
                console.log(isFollowing);

                //follower naar database
                let formData = new FormData();
                formData.append('isFollowing', isFollowing);

                fetch("ajax_unfollow.php",{
                    method: 'POST',
                    body : formData
                    
                    })
                    //antwoord parsen in JSON formaat & doorgeven als resultaat
                    .then(response => response.json())
                    .then(result =>{
                        
                        console.log("Success:", result);
                    })
                    .catch(error =>{
                        console.error("Error:", error);
                    });
                   

            }
    });


    
});