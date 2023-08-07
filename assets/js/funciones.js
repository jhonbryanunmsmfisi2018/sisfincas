const firstTabEl = document.querySelector('#nav-tab button:last-child')
const firstTab = new bootstrap.Tab(firstTabEl)

app.use((req, res, next) => {
    res.setHeader("Access-Control-Allow-Origin", "*");
    res.setHeader(
      "Access-Control-Allow-Methods",
      "OPTIONS, GET, POST, PUT, PATCH, DELETE"
    );
    res.setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization");
    next();
  });

function insertarRegistros(url, idFormulario, tbl, idButton, accion) {

    console.log(idFormulario);
    //crear forData
    const data = new FormData(idFormulario);
    //hacer una instancia del objeto XMLHttpRequest 
    const http = new XMLHttpRequest();
    //abrir una conexión - POST -GET
    http.open('POST', url, true);
    //Enviar datos
    http.send(data);
    //verificar estados

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // const res = JSON.parse(this.responseText);   
            // console.log(this.responseText);

            const res = JSON.parse(this.responseText);
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: res.type,
                title: res.msg,
                showConfirmButton: false,
                timer: 2000
            })
            if (res.type == 'success') {
                if (accion) {
                    clave.removeAttribute('readonly');
                }

                if (tbl != null) {
                    document.querySelector('#id').value = '';
                    idButton.textContent = 'Registrar';
                    idFormulario.reset();
                    tbl.ajax.reload();
                }
            }
        }
    }
}

//caso de registro de archivos adjuntos (no funcionaba con la funcion de arriba)
function insertarRegistrosOpcional(url, idFormulario, tbl, idButton, accion) {
    //crear forData
    const data = new FormData(idFormulario);
    //hacer una instancia del objeto XMLHttpRequest 
    const http = new XMLHttpRequest();
    //abrir una conexión - POST -GET
    http.open('POST', url, true);
    //Enviar datos
    http.send(data);
    //verificar estados

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // const res = JSON.parse(this.responseText);   
            // console.log(this.responseText);

            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: "success",
                title: "Correcto",
                showConfirmButton: false,
                timer: 2000
            })

            idFormulario.reset();
            //tbl.ajax.reload();
            actualizartabla();
        }
    }
}

function eliminarRegistros(url, tbl) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El registro no se eliminara de forma permanente, solo cambiara el estado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            //hacer una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            //abrir una conexión - POST -GET
            http.open('GET', url, true);
            //Enviar datos 
            http.send();
            //verificar estados
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // const res = JSON.parse(this.responseText);   
                    // console.log(this.responseText);

                    const res = JSON.parse(this.responseText);
 
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if (res.type == 'success') {
                        tbl.ajax.reload();
                        icon: res.msg;
                    }
                }
            }
        }
    })
}   

function restaurarRegistros(url, tbl) {
    Swal.fire({
        title: 'Esta seguro de restaurar usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Restaurar!'
    }).then((result) => {
        if (result.isConfirmed) {
            //hacer una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            //abrir una conexión - POST -GET
            http.open('GET', url, true);
            //Enviar datos
            http.send();
            //verificar estados
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // const res = JSON.parse(this.responseText);   
                    // console.log(this.responseText);

                    // console 
                    const res = JSON.parse(this.responseText);

                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 2000

                    })
                    if (res.type == 'success') {
                        tbl.ajax.reload();
                    }
                }
            }
        }
    })
}

// function restaurarRegistros(url, tbl) {
//     Swal.fire({
//         title: 'Esta seguro de restaurar usuario?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, Restaurar!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             //hacer una instancia del objeto XMLHttpRequest
//             const http = new XMLHttpRequest();
//             //abrir una conexión - POST -GET
//             http.open('GET', url, true);
//             //Enviar datos
//             http.send();
//             //verificar estados
//             http.onreadystatechange = function () {
//                 if (this.readyState == 4 && this.status == 200) {
//                     // const res = JSON.parse(this.responseText);
//                     // console.log(this.responseText);

//                     // console
//                     const res = JSON.parse(this.responseText);

//                     Swal.fire({
//                         toast: true,
//                         position: 'top-right',
//                         icon: res.type,
//                         title: res.msg,
//                         showConfirmButton: false,
//                         timer: 2000

//                     })
//                     if (res.type == 'success') {
//                         tbl.ajax.reload();
//                     }
//                 }
//             }
//         }
//     })
// }