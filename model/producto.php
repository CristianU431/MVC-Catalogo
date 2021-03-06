<?php
class Producto
{
	private $pdo;
    
    public $id;
    public $categoria;
    public $nombre;
    public $precio;
    public $especificaciones;
	public $imagen;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tproducto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tproducto WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tproducto WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tproducto SET 
						categoria          = ?, 
						nombre        = ?,
                        precio        = ?,
						especificaciones            = ?,
						imagen            = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->categoria, 
                        $data->nombre,
                        $data->precio,
                        $data->especificaciones,
						$data->imagen,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO tproducto(categoria,nombre,precio,especificaciones,imagen) 
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->categoria,
                    $data->nombre, 
                    $data->precio, 
                    $data->especificaciones,
					$data->imagen,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}