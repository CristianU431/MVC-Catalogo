<head>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<img src="images/logo.png"alt="CuscoTrend">



<div id="header">
			<ul class="nav">
				<li><a href="">Inicio</a></li>
				<li><a href="">Categorias</a>
					<ul>
						<li><a href="">Gadgets</a></li>
						<li><a href="">Fajas</a></li>
						<li><a href="">Audifonos y Parlantes</a></li>
						<li><a href="">Impresoras</a>
					</ul>
				</li>
			</ul>
		</div>



<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Producto&a=Crud">Nuevo producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">categoria</th>
            <th>nombre</th>
            <th>precio</th>
            <th style="width:120px;">especificaciones</th>
            <th style="width:120px;">imagen</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->categoria; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->especificaciones; ?></td>
            <td><?php echo $r->imagen; ?></td>
            <td>
                <a href="?c=Producto&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
