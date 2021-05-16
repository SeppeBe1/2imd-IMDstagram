$(document).ready(function() {
    // FOLLOW
    document.querySelector(".private").addEventListener("click", function() {
        if  ($(".private").hasClass("private-unchecked") ){
            $(".private").removeClass( "private-unchecked" ).addClass( "private-check" );
             
            console.log("yay");
            

            fetch("ajax_private.php",{
                method: 'POST',
                
                
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

