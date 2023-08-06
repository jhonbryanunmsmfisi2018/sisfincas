let tblUsuarios;
const formulario = document.querySelector('#formulario');
const nombres = document.querySelector('#nombres');
const apellidos = document.querySelector('#apellidos');
const correo = document.querySelector('#correo');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');
const clave = document.querySelector('#clave');
const rol = document.querySelector('#rol');
const id = document.querySelector('#id');

//elementos para mostrar errores
const errorNombre = document.querySelector('#errorNombre');
const errorApellido = document.querySelector('#errorApellido');
const errorCorreo = document.querySelector('#errorCorreo');
const errorTelefono = document.querySelector('#errorTelefono');
const errorDireccion = document.querySelector('#errorDireccion');
const errorClave = document.querySelector('#errorClave');
const errorRol = document.querySelector('#errorRol');

const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblUsuarios = $('#tblUsuarios').DataTable({

        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombres' },
            { data: 'correo' },
            { data: 'telefono' },
            { data: 'direccion' },
            { data: 'rol' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons,
        responsive: true,
        order: [[0, 'asc']],
    });
    //Limpiar campos
    btnNuevo.addEventListener('click', function () {
        limpiarCampos();
    })

    //registrar usuarios
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        errorNombre.textContent = '';
        errorApellido.textContent = '';
        errorCorreo.textContent = '';
        errorTelefono.textContent = '';
        errorDireccion.textContent = '';
        errorClave.textContent = '';
        errorRol.textContent = '';
        if (nombres.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        } else if (apellidos.value == '') {
            errorApellido.textContent = 'EL APELLIDO ES REQUERIDO';
        }
        else if (correo.value == '') {
            errorCorreo.textContent = 'EL CORREO ES REQUERIDO';
        }
        else if (telefono.value == '') {
            errorTelefono.textContent = 'EL TELEFONO ES REQUERIDO';
        }
        else if (direccion.value == '') {
            errorDireccion.textContent = 'LA DIRECCION ES REQUERIDO';
        }
        else if (clave.value == '') {
            errorClave.textContent = 'LA CLAVE ES REQUERIDO';
        }
        else if (rol.value == '') {
            errorRol.textContent = 'EL ROL ES REQUERIDO';
        } else {
            const url = base_url + 'usuarios/registrar';
            insertarRegistros(url, this,tblUsuarios,btnAccion,true);
        }
    })

})

//function para eliminar usuario
function eliminarUsuario(idUsuario) {
    const url = base_url + 'usuarios/eliminar/' + idUsuario;
    eliminarRegistros(url, tblUsuarios);
}

//function para recuperar los datos (editar)
function editarUsuario(idUsuario) {
    const url = base_url + 'usuarios/editar/' + idUsuario; //metodo editar
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
            nombres.value = res.nombre;
            apellidos.value = res.apellidos;
            correo.value = res.correo;
            telefono.value = res.telefono;
            direccion.value = res.direccion;
            rol.value = res.rol;
            clave.value = '0000000';
            clave.setAttribute('readonly', 'readonly');
            btnAccion.textContent = 'Actualizar';
            const firstTabEl = document.querySelector('#nav-tab button:last-child')
            const firstTab = new bootstrap.Tab(firstTabEl)
            firstTab.show()
        }
    }
}

function limpiarCampos() {
    id.value = '';
    btnNuevo.textContent = 'Registrar';
    clave.removeAttribute('readonly');
    formulario.reset();
    nombres.focus();
}