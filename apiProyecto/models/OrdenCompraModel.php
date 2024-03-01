<?php

class OrdenCompraModel
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
            //Consulta sql
            $vSql = "SELECT oc.*, doc.* FROM ordenCompra oc
            INNER JOIN detalleOrdenCompra doc ON oc.id = doc.idOrdenCompra;";

            //Ejecutar la consulta
            $vResultado = $this->enlase->ExecuteSQL($vSql);

            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e)
         {
            die($e->getMessage());
        }
    }
    public function get($id)
    {

        try 
        {
            //Consulta sql
            $vSql = "SELECT * FROM ordencompra where id=$id;";

            //Ejecutar la consulta
            $vResultado = $this->enlase->ExecuteSQL($vSql);

            // Retornar el objeto
            return $vResultado[0];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function allOrdenes($id)
    {
        try 
        {
            $bodega =new BodegaModel();
            $producto =new ProductoModel();
            $proveedor = new ProveedorModel();
            $vSql ="SELECT oc.*, doc.* FROM ordenCompra oc INNER JOIN detalleOrdenCompra doc ON oc.id = doc.idOrdenCompra WHERE oc.id = $id;";
            $vResultado = $this->enlase->executeSQL($vSql);
            if (!empty($vResultado)) 
            {
                $vResultado = $vResultado[0];
                $bodegas = $bodega->get($vResultado->idBodega);
                $vResultado->Bodega=$bodegas;
                $productos = $producto->get($vResultado->idProducto);
                $vResultado->Producto= $productos;
                $proveedors = $proveedor->get($vResultado->idProveedor);
                $vResultado->Proveedor= $proveedors;
            }
            return $vResultado;
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }   
    
}

