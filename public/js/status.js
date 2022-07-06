let params = new URLSearchParams(window.location.search)
let id = params.get('id');

fetch(`http://localhost/CSIT701/api/getApplication.php?id=${id}`)
    .then(res => res.json())
        .then(res => {
            let application = res;
            
            document.querySelector('#application-date').innerHTML = application.created_at;
            document.querySelector('#application-number').innerHTML = application.id;

            let html = "";

            if (application.admitted == null)
                html += "<span class='application-status alert-info'>Under Review</span>";
            else if (application.admitted == true)
                html += "<span class='application-status alert-success'>Accepted</span>";
            else
                html += "<span class='application-status alert-danger'>Rejected</span>";

            document.querySelector('#application-status-container').innerHTML = html;
        });