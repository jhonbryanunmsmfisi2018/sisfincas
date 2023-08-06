let tblCategorias;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datables 
    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + 'categorias/listarInactivos',
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
})
function restaurarCategoria(idCategoria) {
    const url = base_url + 'categorias/restaurar/' + idCategoria;
    restaurarRegistros(url,tblCategorias);
}
