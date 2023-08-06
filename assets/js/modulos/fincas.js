let tblFincas;
const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datables 
    tblFincas = $('#tblFincas').DataTable({
        ajax: {
            url: base_url + 'fincas/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'codigo' },
            { data: 'descripcion' },
            { data: 'precio_compra' },
            { data: 'precio_venta' },
            { data: 'cantidad' },
            { data: 'medida' },
            { data: 'categoria' },
            { data: 'foto' },
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

    //Registrar fincas
    
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        const url = base_url + 'fincas/registrar';        
        insertarRegistros(url, this, tblFincas, btnAccion, true);
    })
})