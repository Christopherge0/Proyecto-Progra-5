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
            $vSql = "SELECT * FROM ordencompra;";

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
    
}

