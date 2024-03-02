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
            $vsql = " SELECT  producto.id, producto.nombre AS productoNombre, producto.descripcion, 
            producto.costoUnitario AS productoCostoUnitario, producto.sku AS producto_sku, 
            producto.cantidadStock, producto.idSubCategoria, subCategoria.nombre AS subCategoriaNombre,
            subCategoria.idCategoria, categoria.nombre AS categoriaNombre
            FROM producto
            INNER JOIN subCategoria ON producto.idSubCategoria = subCategoria.id
            INNER JOIN categoria ON subCategoria.idCategoria = categoria.id;";
            
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
            $categoriaM = new CategoriaModel();
            $subCtegoriaM = new SubCategoriaModel();
            $vsql = "SELECT * FROM producto where id=$idProducto";
            $vResultado = $this->enlase->ExecuteSQL ($vsql);
            if (!empty($vResultado)) 
            {
                $vResultado = $vResultado[0];
                $categoria = $categoriaM->get($vResultado->idCategoria);
                $vResultado->Categoria = $categoria;
                $subCtegoria = $subCtegoriaM->get($vResultado->idSubCategoria);
                $vResultado->SubCategoria = $subCtegoria;
            }
            return $vResultado;
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
}