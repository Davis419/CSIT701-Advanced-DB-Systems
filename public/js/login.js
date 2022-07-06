let handleLoginForm = (event) => {
    //Prevent browser from sending request, rather handle the form submit
    event.preventDefault();

    //Capture form data from user
    let formData = {
        passcode: document.querySelector('#passcode-input').value,
        email: document.querySelector('#email-input').value
    };

    
    //Send POST request to API to save application
    fetch(`http://localhost/CSIT701/api/login.php`, {
        method: "POST",
        body: JSON.stringify( formData ),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then( res => res.json() )
            .then( res => {
                //If an error occured, capture it and display it on to the user
                if( res.response === "error" ){
                    let html = `<span class='alert alert-danger'>${res.message}</span>`;
                    document.querySelector('#form-response-container').innerHTML = html;
                }else{
                    //If everything went well, notify the user the application was saved successfully
                    let html = `<span class='alert alert-success'>${res.message}</span>`;
                    document.querySelector('#form-response-container').innerHTML = html;

                    let application_id = res.id;
                    setTimeout(() => {
                        window.location = `status.html?id=${application_id}`
                    }, 2500);
                }
                
            });
};
