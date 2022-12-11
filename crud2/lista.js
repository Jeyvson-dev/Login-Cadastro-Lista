function listar(url){
let lista = document.getElementById('lista')
lista.innerHTML = ``
ajax = new XMLHttpRequest()

ajax.open('GET', url)

ajax.onreadystatechange = () =>{

    if (ajax.readyState == 4 && ajax.status == 200){
       
        var select = JSON.parse(ajax.responseText)

        lista.innerHTML = `<tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Sexo</th>
                            <th>Data de Nascimento</th>
                           </tr>`    
        select.forEach(element => {

            lista.innerHTML += `<tr>
                                  <td> ${element.nome} </td>
                                  <td> 
                                  ${element.idade} </td>
                                  <td> ${element.sexo} </td>
                                  <td> ${element.nascimento} </td>         
                                </tr>`
                                    
        });
    }
}
ajax.send()
}