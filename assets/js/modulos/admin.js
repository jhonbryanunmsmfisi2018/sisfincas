const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');

const ruc = document.querySelector('#ruc');
const nombre = document.querySelector('#nombre');
const correo = document.querySelector('#correo');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');

const errorRuc = document.querySelector('#errorRuc');
const errorNombre = document.querySelector('#errorNombre');
const errorCorreo = document.querySelector('#errorCorreo');
const errorTelefono = document.querySelector('#errorTelefono');
const errorDireccion = document.querySelector('#errorDireccion');

document.addEventListener('DOMContentLoaded', function () {
    //Inicializar un editor
    ClassicEditor
        .create(document.querySelector('#mensaje'), {
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
        })
        .catch(error => {
            console.error(error);
        });

    //Actualizar datos
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorRuc.textContent = '';
        errorNombre.textContent = '';
        errorCorreo.textContent = '';
        errorTelefono.textContent = '';
        errorDireccion.textContent = '';
        if (ruc.value == '') {
            errorRuc.textContent = 'El ruc es requerido';
        } else if (nombre.value == '') {
            errorNombre.textContent = 'El nombre es requerido';
        } else if (correo.value == '') {
            errorCorreo.textContent = 'El correo es requerido';
        } else if (telefono.value == '') {
            errorTelefono.textContent = 'El telefono es requerido';
        } else if (direccion.value == '') {
            errorDireccion.textContent = 'La direccion es requerida';
        } else {
            const url = base_url + 'admin/modificar';
            insertarRegistros(url,this,null,btnAccion,false);
        }
    })
})
