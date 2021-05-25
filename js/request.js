$(document).ready(function() {

        let confirmBtns = document.querySelectorAll(".btn-confirm");

        for (let i = 0; i < confirmBtns.length; i++) {
        confirmBtns[i].addEventListener("click", function () {
            console.log("confirm");
            let followId = this.dataset.followid;
            console.log(followId);

            let formData = new FormData();
            formData.append('isFollower', followId);

            fetch("ajax_confirmRequest.php",{
                method: 'POST',
                body : formData,
                
                })
                
        
                //antwoord parsen in JSON formaat & doorgeven als resultaat
                .then(response => response.json())
                .then(result =>{
                    console.log("Success:", result);
                })
                .catch(error =>{
                    console.error("Error:", error);
                });
            });
        }

        let deleteBtns = document.querySelectorAll(".btn-delete");

        for (let i = 0; i < deleteBtns.length; i++) {
        deleteBtns[i].addEventListener("click", function () {
            console.log("confirm");
            let followId = this.dataset.followid;
            console.log(followId);

            let formData = new FormData();
            formData.append('isFollower', followId);

            fetch("ajax_deleteRequest.php",{
                method: 'POST',
                body : formData,
                
                })
                
        
                //antwoord parsen in JSON formaat & doorgeven als resultaat
                .then(response => response.json())
                .then(result =>{
                    console.log("Success:", result);
                })
                .catch(error =>{
                    console.error("Error:", error);
                });
            });
        }
 });