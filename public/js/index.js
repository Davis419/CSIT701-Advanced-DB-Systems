let handleBiographicForm = (event) => {
    //Prevent browser from sending request, rather handle the form submit
    event.preventDefault();

    //Capture form data from user
    let formData = {
        firstname: document.querySelector('#firstname-input').value,
        lastname: document.querySelector('#lastname-input').value,
        gender: document.querySelector('#gender-input').value,
        birthdate: document.querySelector('#birthdate-input').value,
        idnumber: document.querySelector('#idnumber-input').value,
        citizenship: document.querySelector('#citizenship-input').value,
        email: document.querySelector('#email-input').value,
        cellphone: document.querySelector('#cellphone-input').value,
        address: document.querySelector('#address-input').value,
        course_id_first: document.querySelector('#qualification-first-input').value,
        course_id_second: document.querySelector('#qualification-second-input').value
    };

    
    //Send POST request to API to save application
    fetch(`http://localhost/CSIT701/api/saveApplication.php`, {
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
                    let html = `<span class='alert alert-success'>${res.message} Use this code <b>${res.passcode}</b> to check for status</span>`;
                    document.querySelector('#form-response-container').innerHTML = html;
                }
                
            });
};


fetch('http://localhost/CSIT701/api/allSchools.php')
    .then(res => res.json())
        .then(res => {
            let schools = res;
            let html ="<option value>-- Please Select an Option --</option>";

            schools.forEach(school => {
                html += `<option value='${school.id}'>${school.name}</option>`;
            });

            document.querySelector('#schools-first-input').innerHTML = html;
            document.querySelector('#schools-second-input').innerHTML = html;
        });

let changeSchoolCourses = (event) => {
    let school_id = event.target.value;
    
    fetch(`http://localhost/CSIT701/api/getSchoolCourses.php?id=${parseInt(school_id)}`)
        .then(res => res.json())
            .then(res => {
                let courses = res;
                let html ="<option value>-- Please Select an Option --</option>";

                courses.forEach(course => {
                    html += `<option value='${course.id}'>${course.name}</option>`;
                });

                 event.target.parentElement.nextElementSibling.children[1].innerHTML = html;
            });


};
