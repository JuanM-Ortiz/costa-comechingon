-- Script de Seed Data para Base de Datos Inmobiliaria
-- Datos de muestra para San Luis, Argentina

-- Limpiar datos existentes (opcional - comentar si no se desea)
-- DELETE FROM propiedades_tipo_publicaciones;
-- DELETE FROM propiedades_imagenes;
-- DELETE FROM propiedades_servicios;
-- DELETE FROM propiedades_comodidades;
-- DELETE FROM propiedades_ambientes;
-- DELETE FROM propiedades;

-- ========================================
-- INSERTAR AMBIENTES ADICIONALES
-- ========================================
INSERT INTO `ambientes` (`descripcion`) VALUES
('Dormitorio principal'),
('Dormitorio secundario'),
('Sala de estar'),
('Comedor'),
('Cocina americana'),
('Baño completo'),
('Baño de servicio'),
('Balcón'),
('Terraza'),
('Jardín'),
('Patio'),
('Garaje'),
('Cochera'),
('Lavadero'),
('Despensa'),
('Estudio'),
('Biblioteca'),
('Gimnasio'),
('Sala de juegos'),
('Quincho');

-- ========================================
-- INSERTAR ZONAS DE SAN LUIS
-- ========================================
INSERT INTO `zonas` (`descripcion`) VALUES
('Centro'),
('Nueva Galia'),
('Villa de Merlo'),
('San Francisco del Monte de Oro'),
('Carpintería'),
('Los Molles'),
('Cortaderas'),
('La Toma'),
('Villa Mercedes'),
('San Luis Capital'),
('Potrero de los Funes'),
('El Trapiche'),
('La Florida'),
('Juana Koslay'),
('El Volcán'),
('Luján'),
('Concarán'),
('Quines'),
('Santa Rosa del Conlara'),
('Naschel');

-- ========================================
-- INSERTAR LOCALIDADES DE SAN LUIS
-- ========================================
INSERT INTO `localidades` (`descripcion`) VALUES
('San Luis'),
('Villa Mercedes'),
('Merlo'),
('San Francisco del Monte de Oro'),
('La Toma'),
('Concarán'),
('Quines'),
('Santa Rosa del Conlara'),
('Naschel'),
('Nueva Galia'),
('Carpintería'),
('Los Molles'),
('Cortaderas'),
('Potrero de los Funes'),
('El Trapiche'),
('La Florida'),
('Juana Koslay'),
('El Volcán'),
('Luján'),
('San Martín');

-- ========================================
-- INSERTAR SERVICIOS ADICIONALES
-- ========================================
INSERT INTO `servicios` (`descripcion`, `fa_icon`) VALUES
('Gas natural', 'fa-solid fa-fire'),
('Electricidad', 'fa-solid fa-bolt'),
('Agua corriente', 'fa-solid fa-tint'),
('Cloacas', 'fa-solid fa-water'),
('Internet', 'fa-solid fa-wifi'),
('Cable TV', 'fa-solid fa-tv'),
('TV Satelital', 'fa-solid fa-satellite'),
('Seguridad 24hs', 'fa-solid fa-shield-alt'),
('Limpieza', 'fa-solid fa-broom'),
('Mantenimiento', 'fa-solid fa-tools'),
('Calefacción', 'fa-solid fa-thermometer-half'),
('Aire acondicionado', 'fa-solid fa-snowflake'),
('Alarma', 'fa-solid fa-bell'),
('Portero', 'fa-solid fa-user-shield'),
('Ascensor', 'fa-solid fa-arrow-up'),
('Estacionamiento', 'fa-solid fa-parking'),
('Ropa de cama', 'fa-solid fa-bed'),
('Toallas', 'fa-solid fa-bath'),
('Cocina equipada', 'fa-solid fa-utensils'),
('WiFi gratuito', 'fa-solid fa-wifi');

-- ========================================
-- INSERTAR COMODIDADES ADICIONALES
-- ========================================
INSERT INTO `comodidades` (`descripcion`, `fa_icon`) VALUES
('Piscina', 'fa-solid fa-swimming-pool'),
('Parrilla', 'fa-solid fa-fire'),
('Jardín', 'fa-solid fa-seedling'),
('Terraza', 'fa-solid fa-umbrella-beach'),
('Balcón', 'fa-solid fa-door-open'),
('Garaje', 'fa-solid fa-car'),
('Cochera', 'fa-solid fa-warehouse'),
('Quincho', 'fa-solid fa-utensils'),
('Asador', 'fa-solid fa-fire'),
('Horno de barro', 'fa-solid fa-fire'),
('Fogón', 'fa-solid fa-fire'),
('Mirador', 'fa-solid fa-mountain'),
('Spa', 'fa-solid fa-spa'),
('Gimnasio', 'fa-solid fa-dumbbell'),
('Sala de juegos', 'fa-solid fa-gamepad'),
('Biblioteca', 'fa-solid fa-book'),
('Home theater', 'fa-solid fa-tv'),
('Bodega', 'fa-solid fa-wine-bottle'),
('Helipuerto', 'fa-solid fa-helicopter'),
('Pista de tenis', 'fa-solid fa-table-tennis');

-- ========================================
-- INSERTAR PROPIEDADES DE MUESTRA
-- ========================================
INSERT INTO `propiedades` (`titulo`, `id_tipo_propiedad`, `descripcion`, `superficie_cubierta`, `superficie`, `pisos`, `dormitorios`, `baños`, `id_localidad`, `id_zona`, `disponible`, `maps_url`, `codigo`, `imagen_portada`, `es_destacada`) VALUES
('Casa de Campo en Merlo', 2, 'Hermosa casa de campo con vista a las sierras, ideal para descanso y recreación. Cuenta con amplios espacios verdes y todas las comodidades necesarias.', 180, 500, 1, 3, 2, 3, 3, 1, 'https://maps.google.com/?q=Merlo+San+Luis', 'PROP001', 'casa1.jpg', 1),
('Departamento en Centro San Luis', 6, 'Moderno departamento en el corazón de San Luis, cercano a todos los servicios y comercios. Ideal para profesionales.', 85, 85, 1, 2, 1, 1, 1, 1, 'https://maps.google.com/?q=San+Luis+Capital', 'PROP002', 'casa2.jpg', 0),
('Chacra en Potrero de los Funes', 1, 'Extensa chacra con producción agrícola y ganadera. Incluye casa principal, galpones y corrales. Excelente inversión.', 200, 1500, 1, 4, 3, 14, 14, 1, 'https://maps.google.com/?q=Potrero+de+los+Funes', 'PROP003', 'casa3.jpg', 1),
('Casa Quinta en El Trapiche', 5, 'Encantadora casa quinta con frutales y huerta orgánica. Ambiente familiar y tranquilo, perfecto para vivir en contacto con la naturaleza.', 150, 800, 1, 3, 2, 15, 15, 1, 'https://maps.google.com/?q=El+Trapiche+San+Luis', 'PROP004', 'main.jpg', 0),
('Lote Residencial en Villa Mercedes', 4, 'Lote de 500m² en barrio residencial de Villa Mercedes. Servicios completos, calles asfaltadas y cercano a escuelas.', 0, 500, 0, 0, 0, 2, 9, 1, 'https://maps.google.com/?q=Villa+Mercedes+San+Luis', 'PROP005', '105524main.jpg', 0),
('Casa de Montaña en Los Molles', 2, 'Casa de montaña con diseño rústico y moderno. Vista panorámica a las sierras, ideal para turismo o residencia permanente.', 120, 300, 1, 2, 2, 12, 12, 1, 'https://maps.google.com/?q=Los+Molles+San+Luis', 'PROP006', 'casa1.jpg', 1),
('Campo Ganadero en Concarán', 3, 'Campo de 200 hectáreas dedicado a la ganadería. Incluye casa de campo, aguadas y alambrados. Excelente para producción.', 100, 2000000, 1, 2, 1, 6, 6, 1, 'https://maps.google.com/?q=Concarán+San+Luis', 'PROP007', 'casa2.jpg', 0),
('Departamento Premium en Juana Koslay', 6, 'Lujoso departamento con amenities de primer nivel. Piscina, gimnasio y seguridad 24hs. Vista a las sierras.', 110, 110, 1, 2, 2, 17, 17, 1, 'https://maps.google.com/?q=Juana+Koslay+San+Luis', 'PROP008', 'casa3.jpg', 1),
('Casa Familiar en La Toma', 2, 'Casa familiar en barrio tranquilo de La Toma. Amplio jardín, garaje para 2 autos y todos los servicios básicos.', 140, 400, 1, 3, 2, 5, 5, 1, 'https://maps.google.com/?q=La+Toma+San+Luis', 'PROP009', 'main.jpg', 0),
('Chacra Turística en San Francisco', 1, 'Chacra convertida en complejo turístico. Cabañas, restaurante y actividades recreativas. Negocio en funcionamiento.', 300, 800, 1, 5, 4, 4, 4, 1, 'https://maps.google.com/?q=San+Francisco+del+Monte+de+Oro', 'PROP010', '105722105524main.jpg', 1);

-- ========================================
-- INSERTAR RELACIONES PROPIEDADES-AMBIENTES
-- ========================================
-- Casa de Campo en Merlo
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7), (1, 8), (1, 10), (1, 12), (1, 14);

-- Departamento en Centro San Luis
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5), (2, 6), (2, 8), (2, 12);

-- Chacra en Potrero de los Funes
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5), (3, 6), (3, 7), (3, 10), (3, 11), (3, 12), (3, 13), (3, 14), (3, 15);

-- Casa Quinta en El Trapiche
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(4, 1), (4, 2), (4, 3), (4, 4), (4, 5), (4, 6), (4, 10), (4, 11), (4, 15);

-- Casa de Montaña en Los Molles
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(6, 1), (6, 2), (6, 3), (6, 4), (6, 5), (6, 6), (6, 8), (6, 10);

-- Campo Ganadero en Concarán
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(7, 1), (7, 2), (7, 3), (7, 4), (7, 5), (7, 6), (7, 10), (7, 12), (7, 13);

-- Departamento Premium en Juana Koslay
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(8, 1), (8, 2), (8, 3), (8, 4), (8, 5), (8, 6), (8, 8), (8, 12), (8, 15), (8, 17), (8, 18);

-- Casa Familiar en La Toma
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5), (9, 6), (9, 10), (9, 12), (9, 13);

-- Chacra Turística en San Francisco
INSERT INTO `propiedades_ambientes` (`id_propiedad`, `id_ambiente`) VALUES
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5), (10, 6), (10, 7), (10, 8), (10, 10), (10, 11), (10, 12), (10, 15), (10, 19);

-- ========================================
-- INSERTAR RELACIONES PROPIEDADES-COMODIDADES
-- ========================================
-- Casa de Campo en Merlo
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(1, 1), (1, 2), (1, 3), (1, 8), (1, 12);

-- Departamento en Centro San Luis
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(2, 5), (2, 6);

-- Chacra en Potrero de los Funes
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(3, 2), (3, 3), (3, 6), (3, 7), (3, 8), (3, 9), (3, 10), (3, 11);

-- Casa Quinta en El Trapiche
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(4, 2), (4, 3), (4, 8), (4, 9), (4, 10), (4, 11);

-- Casa de Montaña en Los Molles
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(6, 2), (6, 5), (6, 12);

-- Campo Ganadero en Concarán
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(7, 2), (7, 3), (7, 6), (7, 7), (7, 8);

-- Departamento Premium en Juana Koslay
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(8, 1), (8, 5), (8, 13), (8, 14), (8, 15), (8, 16), (8, 17);

-- Casa Familiar en La Toma
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(9, 2), (9, 3), (9, 6), (9, 7);

-- Chacra Turística en San Francisco
INSERT INTO `propiedades_comodidades` (`id_propiedad`, `id_comodidad`) VALUES
(10, 1), (10, 2), (10, 3), (10, 8), (10, 9), (10, 10), (10, 11), (10, 12), (10, 15), (10, 16), (10, 17);

-- ========================================
-- INSERTAR RELACIONES PROPIEDADES-SERVICIOS
-- ========================================
-- Casa de Campo en Merlo
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7), (1, 11), (1, 12);

-- Departamento en Centro San Luis
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5), (2, 6), (2, 7), (2, 8), (2, 15), (2, 16);

-- Chacra en Potrero de los Funes
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5), (3, 6), (3, 7), (3, 8), (3, 10), (3, 11), (3, 12);

-- Casa Quinta en El Trapiche
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(4, 1), (4, 2), (4, 3), (4, 4), (4, 5), (4, 6), (4, 7), (4, 11), (4, 12);

-- Casa de Montaña en Los Molles
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(6, 1), (6, 2), (6, 3), (6, 4), (6, 5), (6, 6), (6, 7), (6, 11), (6, 12);

-- Campo Ganadero en Concarán
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(7, 1), (7, 2), (7, 3), (7, 4), (7, 5), (7, 6), (7, 7), (7, 10);

-- Departamento Premium en Juana Koslay
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(8, 1), (8, 2), (8, 3), (8, 4), (8, 5), (8, 6), (8, 7), (8, 8), (8, 9), (8, 10), (8, 11), (8, 12), (8, 13), (8, 14), (8, 15), (8, 16), (8, 17), (8, 18), (8, 19), (8, 20);

-- Casa Familiar en La Toma
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5), (9, 6), (9, 7), (9, 16), (9, 17);

-- Chacra Turística en San Francisco
INSERT INTO `propiedades_servicios` (`id_propiedad`, `id_servicio`) VALUES
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5), (10, 6), (10, 7), (10, 8), (10, 9), (10, 10), (10, 11), (10, 12), (10, 13), (10, 14), (10, 15), (10, 16), (10, 17), (10, 18), (10, 19), (10, 20);

-- ========================================
-- INSERTAR IMÁGENES DE PROPIEDADES
-- ========================================
-- Casa de Campo en Merlo
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(1, 'casa1.jpg', 1),
(1, 'casa2.jpg', 0),
(1, 'casa3.jpg', 0),
(1, 'main.jpg', 0);

-- Departamento en Centro San Luis
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(2, 'casa2.jpg', 1),
(2, 'casa1.jpg', 0),
(2, 'casa3.jpg', 0);

-- Chacra en Potrero de los Funes
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(3, 'casa3.jpg', 1),
(3, 'casa1.jpg', 0),
(3, 'casa2.jpg', 0),
(3, 'main.jpg', 0);

-- Casa Quinta en El Trapiche
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(4, 'main.jpg', 1),
(4, 'casa1.jpg', 0),
(4, 'casa2.jpg', 0),
(4, 'casa3.jpg', 0);

-- Lote Residencial en Villa Mercedes
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(5, '105524main.jpg', 1),
(5, 'main.jpg', 0);

-- Casa de Montaña en Los Molles
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(6, 'casa1.jpg', 1),
(6, 'casa2.jpg', 0),
(6, 'casa3.jpg', 0),
(6, 'main.jpg', 0);

-- Campo Ganadero en Concarán
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(7, 'casa2.jpg', 1),
(7, 'casa1.jpg', 0),
(7, 'casa3.jpg', 0),
(7, 'main.jpg', 0);

-- Departamento Premium en Juana Koslay
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(8, 'casa3.jpg', 1),
(8, 'casa1.jpg', 0),
(8, 'casa2.jpg', 0),
(8, 'main.jpg', 0);

-- Casa Familiar en La Toma
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(9, 'main.jpg', 1),
(9, 'casa1.jpg', 0),
(9, 'casa2.jpg', 0),
(9, 'casa3.jpg', 0);

-- Chacra Turística en San Francisco
INSERT INTO `propiedades_imagenes` (`id_propiedad`, `imagen`, `es_principal`) VALUES
(10, '105722105524main.jpg', 1),
(10, 'casa1.jpg', 0),
(10, 'casa2.jpg', 0),
(10, 'casa3.jpg', 0),
(10, 'main.jpg', 0);

-- ========================================
-- INSERTAR TIPOS DE PUBLICACIÓN Y PRECIOS
-- ========================================
-- Casa de Campo en Merlo - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(1, 2, 85000, 2);

-- Departamento en Centro San Luis - Alquiler
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(2, 1, 45000, 1);

-- Chacra en Potrero de los Funes - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(3, 2, 150000, 2);

-- Casa Quinta en El Trapiche - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(4, 2, 65000, 2);

-- Lote Residencial en Villa Mercedes - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(5, 2, 25000, 2);

-- Casa de Montaña en Los Molles - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(6, 2, 75000, 2);

-- Campo Ganadero en Concarán - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(7, 2, 200000, 2);

-- Departamento Premium en Juana Koslay - Alquiler
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(8, 1, 80000, 1);

-- Casa Familiar en La Toma - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(9, 2, 55000, 2);

-- Chacra Turística en San Francisco - Venta
INSERT INTO `propiedades_tipo_publicaciones` (`id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(10, 2, 120000, 2);

-- ========================================
-- FIN DEL SCRIPT DE SEED DATA
-- ======================================== 