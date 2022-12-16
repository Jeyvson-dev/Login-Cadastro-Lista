//Values
var nome = document.getElementById('nome')
    var dataNascimento = document.getElementById('nascimento')
    var sexo = document.getElementById('sexo')
    var email = document.getElementById('email')
    var login = document.getElementById('login')
    var senha = document.getElementById('senha')
    var mensagem = document.getElementById('mensagem')
    var id = queryString('id')

    //Classes
    var formData = new FormData()
    var ajax = new XMLHttpRequest()

selectUpdate()

function selectUpdate(){


    formData.append('id', id)

    

    ajax.open ('POST','selectUpdate.php')

    ajax.onreadystatechange = () =>{

        if(ajax.readyState == 4 && ajax.status == 200){

                let lista = JSON.parse(ajax.responseText)
    
            nome.value = lista.nome
            dataNascimento.value = lista.nascimento
            sexo.innerHTML = `<option value="M">${lista.sexo}</option>`
            email.value = lista.email
            login.value = lista.login
            senha.value = lista.senha

        console.log(lista)

    }

    }

    ajax.send(formData)

}
function atualizar(){

    formData.append("nome", nome.value)
    formData.append("nascimento", dataNascimento.value)
    formData.append("sexo", sexo.value)
    formData.append("email", email.value)
    formData.append("login", login.value)
    formData.append("senha", senha.value)

    ajax.onreadystatechange = () =>{

        if(ajax.readyState == 4 && ajax.status == 200){
            
            mensagem.innerHTML = ajax.responseText

        }

    }

    ajax.open('POST', 'update.php')

    ajax.send(formData)


}



function queryString(parameter) {  
    var loc = location.search.substring(1, location.search.length);   
    var param_value = false;   
    var params = loc.split("&");   
    for (i=0; i<params.length;i++) {   
        param_name = params[i].substring(0,params[i].indexOf('='));   
        if (param_name == parameter) {                                          
            param_value = params[i].substring(params[i].indexOf('=')+1)   
        }   
    }   
    if (param_value) {   
        return param_value;   
    }   
    else {   
        return undefined;   
    }   
}
