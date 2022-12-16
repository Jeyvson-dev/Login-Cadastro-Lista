listar('listar.php')
function listar(url){
let lista = document.getElementById('lista')
lista.innerHTML = ``
ajax = new XMLHttpRequest()

ajax.open('GET', url)

ajax.onreadystatechange = () => {

    if (ajax.readyState == 4 && ajax.status == 200) {

        var select = JSON.parse(ajax.responseText)

        lista.innerHTML = `<tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Sexo</th>
                            <th>Data de Nascimento</th>
                            <th>Atualização</th>
                           </tr>
                           `
        select.forEach(element => {

            lista.innerHTML += `<tr>
                                  <td> ${element.nome} </td>
                                  <td> 
                                  ${element.idade} </td>
                                  <td> ${element.sexo} </td>
                                  <td> ${element.nascimento} </td>
                                  <td><button onclick = "exclude(${element.id})">Excluir</button></td>
                                  <td><button onclick = "actualize(${element.id})">Atualizar</button></td>       
                                </tr>`


        });
    }
}
ajax.send()
}

function exclude(id) {

    let mensagem = document.getElementById('message')
    let formData = new FormData()

    formData.append("id", id)

    let ajax = new XMLHttpRequest()

    ajax.open("POST", 'delete.php')

    ajax.onreadystatechange = () => {

        if (ajax.readyState == 4 && ajax.status == 200) {

            window.location.reload()

        }


    }

    ajax.send(formData)

}

function actualize(id){

    
    //let mensagem = document.getElementById('message')
    /*let formData = new FormData()

    formData.append("id", id)

    let ajax = new XMLHttpRequest()

    ajax.open("POST", 'selectUpdate.php')

    ajax.onreadystatechange = () => {

        if (ajax.readyState == 4 && ajax.status == 200) {


        }


    }

    ajax.send(formData)*/

    window.location = "udpate.html?id="+id

   

}