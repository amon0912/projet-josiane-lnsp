var form = document.querySelector('#form');
var msg_info = document.querySelector('#msg-info');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    var data = new FormData(form);

    xhr.onreadystatechange = function () {
        console.log(xhr.response);
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = xhr.response;
            // console.log(data.msg);
            if (data.err) {
                msg_info.innerHTML = data.msg;
                msg_info.className = 'text-success float-right';
                setTimeout(() => {
                    alert('Inscription terminée!');
                    document.location = 'login.php';

                }, 2000);

            } else {
                msg_info.innerHTML = data.msg;
                msg_info.className = 'text-danger float-right';
            }
            console.log(data.err);
            console.log(data.msg);
        } else {
            msg_info.innerHTML = 'ERREUR de connection au server';
            msg_info.className = 'text-danger float-right';
        }
    };


    xhr.open('POST', 'traitement/kregister.php', true);
    // xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.responseType = "json";
    xhr.send(data);
});