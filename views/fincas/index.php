<?php include_once 'views/templates/header.php' ?>

<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-fincas-tab" data-bs-toggle="tab" data-bs-target="#nav-fincas" type="button" role="tab" aria-controls="nav-fincas" aria-selected="true">Fincas</button>
                <button class="nav-link" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">NUEVO</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="nav-fincas" role="tabpanel" aria-labelledby="nav-fincas-tab" tabindex="0">
                <h5 class="card-title text-center"><i class="fas fa-list"></i> Listado de Fincas</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover nowrap" id="tblFincas" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Cod</th> <!--codigo-->
                                <th>Direccion</th> <!--descripcion-->
                                <th>Lat/Long</th> <!--p.compra-->
                                <th>Valor Inm</th> <!--p.venta-->
                                <th>Ubicación</th> 
                                <th>P. Registral</th> 
                                <th>Categoria</th> <!--categoria-->
                                <th>Documentos</th> <!--foto-->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade p-3" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">
                <form id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <div class="col-md-3 mb-3">
                            <label for="nombre">Codigo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="N° Codigo">
                            </div>
                            <span id="errorCodigo" class="text-danger"></span>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="precio_compra">Direccion</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="text" name="precio_compra" id="precio_compra" placeholder="Nombre de Dirección">
                            </div>
                            <span id="errorDireccion" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="precio_venta">Lat/Long</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="text" name="precio_venta" id="precio_venta" placeholder="Dirección de Lat/Long">
                            </div>
                            <span id="errorLat_Long" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="valor">Valor Inm</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor del Inmueble">
                            </div>
                            <span id="errorValor" class="text-danger"></span>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="ubicacion">Ubicacion</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="text" name="ubicacion" id="ubicacion" placeholder="Ubicacion">
                            </div>
                            <span id="errorUbicacion" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="p_registral">P. Registral</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                <input class="form-control" type="number" name="p_registral" id="p_registral" placeholder="Partida registral">
                            </div>

                            <span id="errorP_registral" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="id_categoria">Categoria</label>
                                <select id="id_categoria" class="form-control" name="id_categoria">
                                    <option value="">Seleccionar</option>
                                    <?php foreach ($data['categorias'] as $categoria) {?>
                                        <option value="<?php echo $categoria['id'];?>"><?php echo $categoria['categoria'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <span id="errorCategoria" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="foto">Documentos</label>
                                <input id="foto" class="form-control" type="file" name="foto">
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-danger" type="button" id="btnNuevo">NUEVO</button>
                        <button class="btn btn-primary" type="submit" id="btnAccion">REGISTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php' ?>