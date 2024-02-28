use stokify;
 
-- Insertar datos en la tabla rol
INSERT INTO rol (descripccion) VALUES 
('Administrador'),
('Encargado'),
('Empleado');

-- Insertar datos en la tabla ubicacion
INSERT INTO ubicacion (nombre, provincia, canton, distrito, direccionExacta) VALUES 
('Bodega San Jose 1', 'San José', 'San José', 'San José', 'Avenida central'),
('Bodega Coyol 1', 'Alajuela', 'Alajuela', 'San José de Alajuela', 'Zona Franca el Coyol'),
('Bodega Montesillos1', 'Alajuela', 'Alajuela', 'Alajuela', 'Zona Franca Z');

-- Insertar datos en la tabla bodega
INSERT INTO bodega (nombre, dimensione, capacidad, tieneCajaSeguridad, idUbicacion) VALUES 
('Principal', 'Grande', 50, true, 1),
('Secundaria', 'Mediana', 50, false, 2),
('Terciaria', 'Mediana', 50, false, 3);

-- Insertar datos en la tabla usuario
INSERT INTO usuario (id, nombre, email, telefono, contrasenia, idRol, estado) VALUES 
(118160876, 'Christopher Segura', 'crisgeseso@gmail.com', '85251048', 'admin', 1, true),
(118510232, 'Angelica Gonzalez', 'empleado@example.com', '87654321', 'admin123', 2, true),
(118510233, 'Empleado', 'empleado@example.com', '87654325', 'empleado123', 2, true);

-- Insertar datos en la tabla bodegaUsuario
INSERT INTO bodegaUsuario (idUsuario, idBodega) VALUES 
(118510232, 1),
(118510232, 3),
(118510233, 3),
(118510233, 2);
-- Insertar datos en la tabla categoria
INSERT INTO categoria (nombre) VALUES 
('Juegos'),
('Perifericos');

-- Insertar datos en la tabla subCategoria
INSERT INTO subCategoria (nombre, idCategoria) VALUES 
('Xbox', 1),
('Soni', 1),
('Nintendo', 1),
('Teclados', 2),
('Audifonos', 2),
('Ratones', 2);

-- Insertar datos en la tabla producto
INSERT INTO producto (nombre, descripcion, costoUnitario, idSubCategoria, idCategoria, sku, cantidadStock) VALUES 
('Halo Infinitive', 'Videojuego saga de Halo', 36000.00, 1, 1, 'JUE_XBO_01', 20),
('God of War', 'Video juego de dios de la guerra', 360000.00, 2, 1, 'JUE_SON_02', 20),
('Mario Wonder', 'Video juego de Mario plataforma', 360000.00, 3, 1, 'JUE_NIN_03', 20),
('K70 MK2', 'Teclado CORSAIR', 90000.00, 4, 2, 'PER_TEC_04', 20),
('Virtuoso', 'Audifonos Corsair', 112000.00, 5, 2, 'PER_AUD_05', 20),
('Darck Core Pro', 'Raton Corsair', 560000.00, 6, 2, 'PER_RAT_06', 20);

-- Insertar datos en la tabla inventario
INSERT INTO inventario (idProducto, idBodega, cantidadDisponible, cantidadMinima, cantidadMaxima, idUsuarioRegistro, idUsuarioActualizacion, fechaRegistro, fechaActualizacion) VALUES 
(1, 1, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
(2, 2, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
(3, 3, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
(4, 1, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
(5, 2, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
(6, 3, 20, 5, 25, 118160876, 118160876, DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW());
-- Insertar datos en la tabla proveedor
INSERT INTO proveedor (nombre, email, telefono, provincia, canton, distrito, direccion) VALUES 
('Proveedor Samtec', 'Samtec@gmail.com', '87037854', 'San José', 'San José', 'San José', '456 Avenida Central'),
('Proveedor Incomex', 'proveedora@gmail.com', '87045854', 'Alajuela', 'Alajuela', 'San José de Alajuela', '456 Avenida Principal'),
('Proveedor Productos Japoneses', 'proveedora@gmail.com', '87867854', 'San José', 'San José', 'La Uruca', '456 Avenida Principal');

-- Insertar datos en la tabla proveedorContacto
INSERT INTO proveedorContacto (idProveedor, nombre, telefono) VALUES 
(1, 'Contacto Samtec', '83975214'),
(2, 'Contacto Incomex', '839456214'),
(3, 'Contacto Productos Japoneses', '83978914');

-- Insertar datos en la tabla ordenCompra
INSERT INTO ordenCompra (idProveedor, idBodega, fechaGeneracion, fechaRecepcion, idUsuarioRegistro) VALUES 
(1, 1, NOW(), DATE_ADD(CURDATE(), INTERVAL 1 DAY) , 118160876),
(2, 1, NOW(), DATE_ADD(CURDATE(), INTERVAL 1 DAY) , 118160876);

-- Insertar datos en la tabla detalleOrdenCompra
INSERT INTO detalleOrdenCompra (idOrdenCompra, idProducto, cantidad) VALUES 
(1, 1, 5),
(2, 2, 5);

-- Insertar datos en la tabla traslado
INSERT INTO traslado (idBodegaOrigen, idBodegaDestino, fechaEnvio, fechaRecepcion, idUsuarioRegistro) VALUES 
(1, 2, NOW(), DATE_ADD(CURDATE(), INTERVAL 1 DAY) , 118160876),
(2, 3, NOW(), DATE_ADD(CURDATE(), INTERVAL 1 DAY) , 118160876);

-- Insertar datos en la tabla detalleTraslado
INSERT INTO detalleTraslado (idTraslado, idProducto, cantidad) VALUES 
(1, 1, 5),
(2, 2, 6);

-- Insertar datos en la tabla salidaInventario
INSERT INTO salidaInventario (idBodega, fechaSalida, idUsuarioRegistro, observacion) VALUES 
(1, NOW(), 118160876, 'Salida por venta'),
(2, NOW(), 118160876, 'Salida por venta');

-- Insertar datos en la tabla detalleSalidaInventario
INSERT INTO detalleSalidaInventario (idSalidaInventario, idProducto, cantidad) VALUES 
(1, 1, 2),
(2, 2, 2);

