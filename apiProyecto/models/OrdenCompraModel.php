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
            $vSql = "	SELECT ordenCompra.id,  ordenCompra.fechaGeneracion,  ordenCompra.fechaRecepcion, ordenCompra.idProveedor,
            proveedor.nombre AS proveedorNombre, ordenCompra.idBodega, bodega.nombre AS bodegaNombre, ordenCompra.idUsuarioRegistro, 
            usuario.nombre AS usuarioNombre, usuario.email AS usuarioEmail, detalleOrdenCompra.idProducto,
            producto.nombre AS productoNombre, producto.descripcion AS productoDescripcion,  producto.costoUnitario,
            producto.idSubCategoria AS productoIdSubCategoria, producto.idCategoria AS productoIdCategoria, producto.sku AS productoSku,
            producto.cantidadStock AS productoCantidadStock
            FROM ordenCompra
            INNER JOIN proveedor ON ordenCompra.idProveedor = proveedor.id
            INNER JOIN bodega ON ordenCompra.idBodega = bodega.id
            INNER JOIN usuario ON ordenCompra.idUsuarioRegistro = usuario.id
            INNER JOIN detalleOrdenCompra ON ordenCompra.id = detalleOrdenCompra.idOrdenCompra
            INNER JOIN producto ON detalleOrdenCompra.idProducto = producto.id;";
            //Ejecutar la consulta
            $vResultado = $this->enlase->ExecuteSQL($vSql);
            return $vResultado;
        }catch (Exception $e) {
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

