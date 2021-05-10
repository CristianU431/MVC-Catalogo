<h1 class="page-header">
    <?php echo $producto->id != null ? $producto->categoria : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Producto">Productos</a></li>
  <li class="active"><?php echo $producto->id != null ? $producto->categoria : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $producto->id; ?>" />
    
    <div class="form-group">
        <label>categoria</label>
        <input type="text" name="categoria" value="<?php echo $producto->categoria; ?>" class="form-control" placeholder="categoria" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>nombre</label>
        <input type="text" name="nombre" value="<?php echo $producto->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>precio</label>
        <input type="text" name="precio" value="<?php echo $producto->precio; ?>" class="form-control" placeholder="Ingrese su precio" data-validacion-tipo="requerido|min:15" />
    </div>
    
    <div class="form-group">
        <label>especificaciones</label>
        <input type="text" name="especificaciones" value="<?php echo $producto->especificaciones; ?>" class="form-control" placeholder="Ingrese sus especificaciones" data-validacion-tipo="requerido|min:20" />
    </div>
    <div class="form-group">
        <label>imagen</label>
        <input type="text" name="imagen" value="<?php echo $producto->imagen; ?>" class="form-control" placeholder="Ingrese sus especificaciones" data-validacion-tipo="requerido|min:20" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-productono").submit(function(){
            return $(this).validate();
        });
    })
</script>