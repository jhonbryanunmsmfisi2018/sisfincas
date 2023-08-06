let tblCategorias;
const formulario = document.querySelector('#formulario');
const id = document.querySelector('#id');
const nombre = document.querySelector('#nombre');
const errorNombre = document.querySelector('#errorNombre');
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datables 
    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + 'categorias/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'categoria' },
            { data: 'fecha' },  
            { data: 'acciones' }
        ],
        languaje: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons,
        responsive: true,
        order: [[0, 'asc']],
    });
    btnNuevo.addEventListener('click', function(){
        id.value = '';  
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    })
    //registrar categorias
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorNombre.textContent = '';
        if (nombre.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        } else {
            const url = base_url + 'categorias/registrar';
            insertarRegistros(url, this, tblCategorias, btnAccion, false);
        }
    });

})

function eliminarCategoria(idCategoria) {
    const url = base_url + 'categorias/eliminar/' + idCategoria;
    eliminarRegistros(url, tblCategorias);
}

function editarCategoria(idCategoria) {
    const url = base_url + 'categorias/editar/' + idCategoria; //metodo editar
    //hacer una instancia del objeto XMLHttpRequest
    const http = new XMLHttpRequest();
    //abrir una conexión - POST -GET
    http.open('GET', url, true);
    //Enviar datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            nombre.value = res.categoria;
            btnAccion.textContent = 'Actualizar';            
            firstTab.show()
        }
    }
}