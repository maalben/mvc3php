<?php require_once 'header.php'; ?>

        <h1>Modificación de producto</h1>
        <br>
        <?php foreach($consultaProductos as $datoProducto): ?>
        <form name="form1" method="POST" action="./?accion=guardarCambiosProducto">
        <p>Id: <input type="text" name="txtid" value="<?php echo $datoProducto['id'] ?>"></p>
            <p>categoria:
                <select name="selcategorias">
                    <?php foreach($consultaCategorias as $datos): ?>
                        <?php
                        if($datoProducto['idcategoria'] == $datos['id']){
                            ?>
                            <option selected value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
                            <?php
                        }else{
                            ?>
                            <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
                            <?php
                        }
                    ?>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Nombre producto: <input type="text" name="txtnombre" value="<?php echo $datoProducto['nombre'] ?>"></p>
            <p>Precio: <input type="text" name="txtprecio" value="<?php echo $datoProducto['precio'] ?>"></p>
            <p><input type="submit" name="btnguardarproducto" value="Guardar Producto"></p>
        </form>
        <?php endforeach; ?>

        <br>
        <br>
        <br>
        <a href="./?accion=menuProductos">Volver</a>
<?php require_once 'footer.php'; ?>