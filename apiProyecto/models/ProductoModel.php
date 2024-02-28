<?php
class ProductoModel
{
    public $enlase;
    public function __construct()
    {
        $this->enlase = new MySqlConnect();
    }
    public function all()
    {
        try
        {
            $vsql = "SELECT * FROM producto;";
            $vResultado = $this->enlase->ExecuteSQL ($vsql);
            return $vResultado;
        }catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function get($id)
    {
        try
        {
            $vsql = "SELECT * FROM producto where id=$id";
            $vResultado = $this->enlase->ExecuteSQL ($vsql);
            return $vResultado[0];
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function getProductoCategoria($idProducto)
    {
        try
        {
            $vsql = "SELECT p.id, c.nombre AS categoria,
            s.nombre AS subCategoria,
            p.nombre AS producto, 
            p.descripcion, p.costoUnitario, p.sku, p.cantidadStock
            FROM producto p
            JOIN subCategoria s ON p.idSubCategoria = s.id
            JOIN categoria c ON p.idCategoria = c.id
            WHERE p.id = $idProducto;";
            $vResultado = $this->enlase->ExecuteSQL ($vsql);
            return $vResultado[0];
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
}