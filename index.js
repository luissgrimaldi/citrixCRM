let sidebarBtn = document.querySelector(".header__logo")


sidebarBtn.addEventListener("click", function(){
    let sidebar=document.getElementById("sidebar");
    let main=document.getElementById("main");
    sidebar.classList.toggle("sidebar--toggle");
    main.classList.toggle("main--toggle")
});

let headerBtn = document.getElementById("header__plus")
headerBtn.addEventListener("click", function(){
    let headerNav=document.getElementById("header__nav");
    headerNav.classList.toggle("header__nav--toggle")
});

let profile = document.querySelector(".header__li-user");
profile.addEventListener("click",function(){
    let profileMenu = document.querySelector(".header__li-user__ul");

    profileMenu.classList.toggle("header__li-user__ul--toggle");
    if(profile.style.transform == "scale(1)"){
        profile.removeAttribute("style")
    }else{
        profile.style.transform = "scale(1)"
    }
})


document.getElementById("campo").addEventListener("keyup", getCodigos)

function getCodigos() {

    let buscador = document.getElementById("campo").value
    let lista = document.getElementById("lista")

    if (buscador.length > 0) {

        let url = "backend/buscador.php"
        let formData = new FormData()
        formData.append("campo", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

document.getElementById("buscadorcontactos").addEventListener("keyup", getContactos)

function getContactos() {

    let buscador = document.getElementById("buscadorcontactos").value
    let lista = document.getElementById("listaContactos")

    if (buscador.length > 0) {

        let url2 = "backend/buscadorcontactos.php"
        let formData2 = new FormData()
        formData2.append("buscadorcontactos", buscador)

        fetch(url2, {
            method: "POST",
            body: formData2,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

function seleccionarContacto(id,nombre) {

    let buscador = document.getElementById("buscadorcontactos")
    let inputhide = document.getElementById("contacto_id")
    let lista = document.getElementById("listaContactos")

    buscador.value = nombre;
    inputhide.value = id;

    lista.style.display = 'none'
    
}