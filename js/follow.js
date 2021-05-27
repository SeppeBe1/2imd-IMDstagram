$(document).ready(function() {
    // FOLLOW
    document.querySelector(".followBtn").addEventListener("click", function() {  
        console.log("yay");
        if  ($(".followBtn").hasClass("btn-follow") ){
            
                $(".followBtn").removeClass( "btn-follow" ).addClass( "btn-unfollow" );
                $(".followBtn").html("Unfollow");

            console.log("follow");
            let isFollowing = this.dataset.followid;
            console.log(isFollowing);

            //follower naar database
            let formData = new FormData();
            formData.append('isFollowing', isFollowing);

            fetch("ajax_follow.php",{
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
                $(".followBtn").removeClass( "btn-unfollow" ).addClass( "btn-follow" );
                $(".followBtn").html("Follow");
                
                console.log("unfollow");
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


        
       
    
            
