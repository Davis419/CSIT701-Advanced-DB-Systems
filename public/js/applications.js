fetch('http://localhost/CSIT701/api/allApplications.php')
    .then(res => res.json())
        .then(res => {
            let applications = res;
            let html = "";

            applications.forEach(application => {
                fetch(`http://localhost/CSIT701/api/getApplicationCourses.php?id=${application.id}`)
                    .then(res => res.json())
                        .then(res => {
                            html += `<tr>
                                        <td>${application.firstname} ${application.lastname}</td>
                                        <td>${application.gender}</td>
                                        <td>${application.email}</td>
                                        <td>${application.idnumber}</td>
                                        <td>${res[0].name}</td>
                                        <td>${res[1].name}</td>
                                        <td>
                                            <button class="btn btn-success" onclick="changeApplicationStatus(${application.id} ,1)">Accept</button>
                                            <button class="btn btn-danger" onclick="changeApplicationStatus(${application.id}, 0)">Reject</button>
                                        </td>
                                    </tr>`;

                            document.querySelector('.table tbody').innerHTML = html;
                        });
            });
        });


let changeApplicationStatus = (id , status) => {

    let formData = {
        application_id: id,
        application_status: status
    };

    fetch(`http://localhost/CSIT701/api/changeApplicationStatus.php`, {
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
                }
            });
};
        