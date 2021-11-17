document.addEventListener("DOMContentLoaded", () => {

    ch_login_btn.onclick = (e) => {
        
        e.preventDefault();

        let login = ch_login.value;
        if (login === "") { alert("Введите логин"); return;}

        let pass = ch_pass.value;
        if (pass === "") { alert("Введите пароль"); return;}
        
        var params = new URLSearchParams() 
		params.append('action', 'login')
		params.append('nonce', allAjax.nonce)
		params.append('login', login)
		params.append('pass', pass)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {
            console.log(xhr.response)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);
    }

});