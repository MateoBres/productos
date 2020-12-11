<form method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" autofocus value="<?= $nombre ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?= $precio ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?= $stock ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria" class="form-control">
                <option value="">Seleccioná una categoría</option>
                <?php
                require_once 'config.php';
                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
                mysqli_set_charset($link, DB_CHARSET);
                $sql = 'SELECT * FROM categorias ORDER BY nombre';
                $rs = mysqli_query($link, $sql);
                
                while ($fila = mysqli_fetch_assoc($rs)) {
                ?>
                <option value="<?= $fila['id_categoria'] ?>" <?php if($marca==$fila['id_categoria']){echo 'selected';}?>><?= $fila['nombre'] ?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="marca">Marca</label>
            <select id="marca" name="marca" class="form-control">
                <option value="">Seleccioná una marca</option>
                <?php
                $rs = mysqli_query($link, 'SELECT * FROM marcas ORDER BY nombre');
                mysqli_close($link);
                while ($fila = mysqli_fetch_assoc($rs)) {
                ?>
                <option value="<?= $fila['id_marca'] ?>"<?php if($marca==$fila['id_marca']){echo 'selected';}?>><?= $fila['nombre'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <p>Garantía:</p>
    <div class="custom-control custom-radio">
        <input type="radio" id="garantia6meses" value="6"
            <?php if ($garantia === '6') {echo 'checked';} ?>
            name="garantia" class="custom-control-input">
        <label class="custom-control-label" for="garantia6meses">6 meses</label>
    </div>
        <div class="custom-control custom-radio">
        <input type="radio" id="garantia12meses" value="12"
            <?php if ($garantia === '12') {echo 'checked';} ?>
            name="garantia" class="custom-control-input">
        <label class="custom-control-label" for="garantia12meses">12 meses</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="garantia24meses" value="24"
            <?php if ($garantia === '24') {echo 'checked';} ?>
            name="garantia" class="custom-control-input">
        <label class="custom-control-label" for="garantia24meses">24 meses</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="garantia36meses" value="36"
            <?php if ($garantia === '36') {echo 'checked';} ?>
            name="garantia" class="custom-control-input">
        <label class="custom-control-label" for="garantia36meses">36 meses</label>
    </div>

    <br>
    <div class='container'>             
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" value='1'
                    <?php if ($envio === '1') {echo 'checked';} ?>
                    type="checkbox" id="envio" name="envio">
                <label class="form-check-label" for="envio">
                Envío sin cargo
                </label>
            </div>
        </div>
        <?php if(!isset($foto)):?>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="detalles">Descripción</label>
        <textarea class="form-control" id="detalles" name="detalles" rows="3"><?= $detalles ?></textarea>
    </div>
    <div class='my-3'>            
        <input type="submit" class="btn btn-success" name='submit' value="<?= $textoBoton ?>">
    </div>
</form>
