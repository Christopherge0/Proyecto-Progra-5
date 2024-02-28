<?php
/* Mostrar errores */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', "C:/xampp/htdocs/api/php_error_log");
/*Encabezada de las solicitudes*/
/*CORS*/
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');
/*--- Requerimientos Clases o librerías*/
require_once "models/MySqlConnect.php";
/***--- Agregar todos los modelos*/
require_once "models/ProductoModel.php";
require_once "models/OrdenCompraModel.php";
require_once "models/DetalleOrdenModel.php";
require_once "models/ProveedorModel.php";
require_once "models/BodegaModel.php";
require_once "models/UsuarioModel.php";
/***--- Agregar todos los controladores*/

require_once "controllers/ProductoControler.php";
require_once "controllers/OrdenCompra.php";
require_once "controllers/DetalleOrden.php";
require_once "controllers/Proveedor.php";
require_once "controllers/Bodega.php";
require_once "controllers/Usuario.php";
//Enrutador
//RoutesController.php
require_once "controllers/RoutesController.php";
$index = new RoutesController();
$index->index();
