var form = document.querySelector('#form');
var info_msg = document.querySelector('#info-msg');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        res = xhr.response;
        console.log(res);
        if (xhr.status == 200 && xhr.readyState == 4) {
            if (res.err) {
                info_msg.innerHTML = res.msg;
                info_msg.className = "float-right text-success";
                // alert(res.msg);
                document.location = '../index.php';
            } else {
                info_msg.innerHTML = res.msg;
                info_msg.class = "float-right text-danger"
            }
        } else {
            info_msg.innerHTML = "Erreur sur le serveur.";
            info_msg.className = "float-right text-danger";
        }
    };

    xhr.open('POST', 'traitement/klogin.php', true);
    xhr.responseType = 'json';
    xhr.send(data);

});