let tblFincas;
let tblFincasArchivosadjuntos;
const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');

//para adjuntar archivos
const formulariopredios = document.querySelector('#formulariopredios');
const btnAccionArchivosadjuntos = document.querySelector('#btnAccionArchivosadjuntos');


document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datables 
    tblFincas = $('#tblFincas').DataTable({
        ajax: {
            url: base_url + 'fincas/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'codigo' },
            { data: 'nombre_predio' },
            { data: 'latlong' },
            { data: 'valor' },
            { data: 'departamento' },
            { data: 'categoria' },
            { data: 'foto' },
            { data: 'archivosadjuntos' },
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

    //listar archivos adjuntos en datatable
    tblFincasArchivosadjuntos = $('#tblFincasArchivosadjuntos').DataTable({
        ajax: {
            url: base_url + 'fincas/listararchivosadjuntos',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre_archivo' },
            { data: 'ruta' },
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
        insertarRegistros(url, this, tblFincas, btnAccion, false);
    });


    formulariopredios.addEventListener('submit', function(e){
        e.preventDefault();
        const url = base_url + 'fincas/registrararchivosadjuntos';        
        insertarRegistrosOpcional(url, this, tblFincasArchivosadjuntos, btnAccionArchivosadjuntos, false);
    });
});

function mostrarArchivos(idMedida) {
    $("#id_predio").val(idMedida);
    firstTab.show()
    actualizartabla();

}

function actualizartabla(){
    var id_predio = $("#id_predio").val();
    $('.divarchivosadjuntos').empty();
    $.get(
            "consultararchivosfincas.php?id_predio="+id_predio,
            function(data) {
                
                var json = JSON.parse(JSON.stringify(data));
                
                for (i = 0; i < Object.keys(json.trabajadores).length; i++){
                    
                        $(".divarchivosadjuntos").append('<tr>' + 
                            '<td>' + (i+1) + '</td>' +
                            '<td>' + json.trabajadores[i].nombre_archivo + '</td>' +
                            '<td><a href="' + json.trabajadores[i].ruta + '"target="_blank"><button class="btn btn-info" type="button"><i class="fas fa-link">' + json.trabajadores[i].ruta + '</i></button></td></a>' +
                        '</i></tr>');   
                }
                

            }).fail(function(xhr, status, error) {
        console.error(error);
        alert('No se pudieron cargar las credenciales.');
    });


    tblFincasArchivosadjuntos = $('#tblFincasArchivosadjuntos').DataTable({
        ajax: {
            url: base_url + 'fincas/listararchivosadjuntos?id=3',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre_archivo' },
            { data: 'ruta' },
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
}