<?php
include_once 'views/templates/header.php';
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Datos de Fincas</h5>
        <hr>
        <form class="p-4" id="formulario" autocomplete="off">
            <input type="hidden" id="id" name="id" value="<?php echo $data['fincas']['id'];?>">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-2 ">
                    <label>RUC <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" id="ruc" name="ruc" class="form-control" value="<?php echo $data['fincas']['ruc'];?>" placeholder="RUC">
                    </div>
                    <span id="errorRuc" class="text-danger"></span>
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>NOMBRE <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['fincas']['nombre'];?>" placeholder="Nombre">
                    </div>
                    <span id="errorNombre" class="text-danger"></span>
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>TELEFONO <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="number" id="telefono" name="telefono" class="form-control" value="<?php echo $data['fincas']['telefono'];?>" placeholder="Telefono">
                    </div>
                    <span id="errorTelefono" class="text-danger"></span>   
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>CORREO <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $data['fincas']['correo'];?>" placeholder="Correo">
                    </div>
                    <span id="errorCorreo" class="text-danger"></span>
                </div>                
                <div class="col-lg-8 col-sm-6 mb-2">
                    <label>DIRECCION <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                        <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $data['fincas']['direccion'];?>" placeholder="Dirección">
                    </div>
                    <span id="errorDireccion" class="text-danger"></span>
                </div>
                <div class="col-lg-3 col-sm-6 mb-2">
                    <label>IMPUESTO (Opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                        <input type="number" id="impuesto" name="impuesto" class="form-control" value="<?php echo $data['fincas']['impuesto'];?>" placeholder="Impuesto">
                    </div>
                </div>
                <div class="col-lg-9 col-sm-6 mb-2">
                    <div class="form-group">
                        <label for="mensaje">MENSAJE (Opcional)</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" rows="3"><?php echo $data['fincas']['mensaje'];?></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-primary" type="submit" id="btnAccion">ACTUALIZAR</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'views/templates/footer.php';
?>