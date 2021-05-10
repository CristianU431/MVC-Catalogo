<?php
require_once 'model/producto.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $producto = new Producto();
        
        if(isset($_REQUEST['id'])){
            $producto = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/producto/producto-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $producto = new Producto();
        
        $producto->id = $_REQUEST['id'];
        $producto->categoria = $_REQUEST['categoria'];
        $producto->nombre = $_REQUEST['nombre'];
        $producto->precio = $_REQUEST['precio'];
        $producto->especificaciones = $_REQUEST['especificaciones'];
        $producto->imagen = $_REQUEST['imagen'];

        $producto->id > 0 
            ? $this->model->Actualizar($producto)
            : $this->model->Registrar($producto);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}