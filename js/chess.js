document.addEventListener("DOMContentLoaded", () => {
    console.log(document.getElementById("ch_login_btn") );
    if (document.getElementById("ch_login_btn") !== null)
    ch_login_btn.onclick = (e) => {
        
        e.preventDefault();

        let login = ch_login.value;
        if (login === "") { alert("Введите логин"); return;}

        let pass = ch_pass.value;
        if (pass === "") { alert("Введите пароль"); return;}
        
        var params = new URLSearchParams() 
		params.append('action', 'shlogin')
		params.append('nonce', allAjax.nonce)
		params.append('login', login)
		params.append('pass', pass)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                console.log(result);
                document.cookie = "login="+result[0].login+"; path=/"
                document.cookie = "name="+result[0].fio+"; path=/"
                document.cookie = "phone="+result[0].phone+"; path=/"
                document.cookie = "adm="+result[0].status+"; path=/"
                document.cookie = "city="+result[0].city+"; path=/"
                document.cookie = "editing="+result[0].editing+"; path=/"
                location.reload()
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);
    }

    if (document.getElementById("ch_exit") !== null)
    ch_exit.onclick = (e) => { 
        document.cookie = "login=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "name=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "phone=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "adm=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "city=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.cookie = "editing=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"
        document.location.href = "https://xn----dtbfdhlbja1aetpolqc1p.xn--p1ai/shahmatka/"
    }

    if (document.getElementById("to_rezerv_btn") !== null)
    to_rezerv_btn.onclick = (e) => { 
        
        e.preventDefault();
        
        let rezerv_price = rform_rezerv_price.value;
        if ((rezerv_price === "")||(rezerv_price === "0")) { alert("Введите цену резерва"); return;}
        
        let klient_name = rform_klient_name.value;
        if (klient_name === "") { alert("Введите имя клиента"); return;}
        
        let klient_tel = rform_klient_tel.value;
        if ((klient_tel === "")||(klient_tel === "Телефон клиента*")) { alert("Введите телефон клиента"); return;}

        var params = new URLSearchParams() 
		params.append('action', 'torezerv')
		params.append('nonce', allAjax.nonce)
		params.append('rezerv_price', rezerv_price)
		params.append('klient_name', klient_name)
		params.append('klient_tel', klient_tel)
		params.append('manager_name', rform_manager_name.value)
		params.append('manager_login', rform_manager_login.value)
		params.append('manager_phone', rform_manager_phone.value)
		params.append('info', rform_info.value)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);

    }

    
    if (document.getElementById("save_chenge") !== null)
    save_chenge.onclick = (e) => { 
        
        e.preventDefault();
        
        let klient_name = rform_klient_name.value;
        if (klient_name === "") { alert("Введите имя клиента"); return;}
        
        let klient_tel = rform_klient_tel.value;
        if ((klient_tel === "")||(klient_tel === "Телефон клиента*")) { alert("Введите телефон клиента"); return;}

        var params = new URLSearchParams() 
		params.append('action', 'update_rezerv')
		params.append('nonce', allAjax.nonce)
        params.append('manager_login', rform_manager_login.value)
		params.append('klient_name', klient_name)
		params.append('klient_tel', klient_tel)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);

    }
    
    if (document.getElementById("prodana_btn") !== null)
    prodana_btn.onclick = (e) => { 
        e.preventDefault();
        
        let escrou = rform_escro.value;
        if (escrou === "") { alert("Введите эскроу счет"); return;}

        var params = new URLSearchParams() 
		params.append('action', 'sale')
		params.append('nonce', allAjax.nonce)
		params.append('escrou', escrou)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);

    }

    
    if (document.getElementById("svobodna_btn") !== null)
    svobodna_btn.onclick = (e) => { 
        e.preventDefault();
        var params = new URLSearchParams() 
		params.append('action', 'free')
		params.append('nonce', allAjax.nonce)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);
    }

    if (document.getElementById("uhred_btn") !== null)
    uhred_btn.onclick = (e) => { 
        e.preventDefault();
        
        let rezerv_price = rform_rezerv_price.value;
        if ((rezerv_price === "")||(rezerv_price === "0")) { alert("Введите цену резерва"); return;}

        
        var params = new URLSearchParams() 
		params.append('action', 'uhred')
		params.append('nonce', allAjax.nonce)
        params.append('rezerv_price', rezerv_price)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);
    }

    if (document.getElementById("ruk_btn") !== null)
    ruk_btn.onclick = (e) => { 
        e.preventDefault();
        
        let rezerv_price = rform_rezerv_price.value;
        if ((rezerv_price === "")||(rezerv_price === "0")) { alert("Введите цену резерва"); return;}

        
        var params = new URLSearchParams() 
		params.append('action', 'ruk')
		params.append('nonce', allAjax.nonce)
        params.append('rezerv_price', rezerv_price)
		params.append('kv_id', rform_id.value)

        var xhr = new XMLHttpRequest();

        xhr.onload = function(e) {

            if (xhr.status == 200) {
                let result = JSON.parse(xhr.response)
                location.reload(true)
            } else {
                console.log(xhr.status)
                console.log(xhr.statusText)
                alert(xhr.response)
            }
            
        }
        
        xhr.onerror = function(msg) {
            console.log("eroroa" + xhr.statusText)
        }

        xhr.open('POST', allAjax.ajaxurl, true);
        xhr.send(params);
    }
});