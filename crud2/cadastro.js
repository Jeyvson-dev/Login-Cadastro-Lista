function cadastrar(){
    let nome = document.getElementById('nome')
    let dataNascimento = document.getElementById('nascimento')
    let sexo = document.getElementById('sexo')
    let email = document.getElementById('email')
    let login = document.getElementById('login')
    let senha = document.getElementById('senha')
    let mensagem = document.getElementById('mensagem')

    let formData = new FormData() 

    formData.append("nome", nome.value)
    formData.append("nascimento", dataNascimento.value)
    formData.append("sexo", sexo.value)
    formData.append("email", email.value)
    formData.append("login", login.value)
    formData.append("senha", senha.value)

    let ajax = new XMLHttpRequest()

    ajax.onreadystatechange = () =>{

        if(ajax.readyState == 4 && ajax.status == 200){
            
            mensagem.innerHTML = ajax.responseText

        }

    }

    ajax.open('POST', 'cadastrar.php')

    ajax.send(formData)


}