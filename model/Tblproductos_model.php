<?php 
class Tblproductos_model{

    private $bd;
    private $tblproductos;

    public function __construct(){
        $this->bd = Conexion::getConexion();
        $this->tblproductos = array();
    }

    public function insertProductos($dato){
        $idcategoria = $dato['idcategoria'];
        $nombre = $dato['nombreproducto'];
        $precio = $dato['precio'];
        $consulta = "INSERT INTO tblproductos (idcategoria, nombre, precio) VALUES ($idcategoria, '$nombre', $precio)";
        mysqli_query($this->bd, $consulta) or die ("Error al guardar el producto.");
    }

    public function consultarProductos(){
        $consulta = $this->bd->query("SELECT p.id, c.nombre AS 'categoria', p.nombre, p.precio FROM tblproductos p INNER JOIN tblcategorias c ON p.idcategoria = c.id");
        while($fila=$consulta->fetch_assoc()){
            $this->tblproductos[] = $fila;
        }
        return $this->tblproductos;
    }

    public function consultarProductoPorId($id){
        $consulta = $this->bd->query("SELECT * FROM tblproductos WHERE id = " . $id);
        $fila = $consulta->fetch_assoc();
        $this->tblproductos[] = $fila;
        return $this->tblproductos;
    }

    public function actualizarProducto($dato){
        $idproducto = $dato['id'];
        $idcategoria = $dato['categoria'];
        $nombre = $dato['nombre'];
        $precio = $dato['precio'];
        $consulta = "UPDATE tblproductos SET idcategoria=$idcategoria, nombre='$nombre', precio=$precio  WHERE id = $idproducto";
        mysqli_query($this->bd, $consulta) or die ("Error al actualizar los cambios del producto.");
    }

}

?>