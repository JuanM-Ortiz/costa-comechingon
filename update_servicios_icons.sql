-- Script para actualizar íconos de servicios (ID 1-6)
-- Actualización de íconos FontAwesome para servicios básicos

-- Gas (ID 1)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-fire' 
WHERE `id` = 1;

-- Electricidad (ID 2)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-bolt' 
WHERE `id` = 2;

-- Agua corriente (ID 3)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-tint' 
WHERE `id` = 3;

-- Internet (ID 4)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-wifi' 
WHERE `id` = 4;

-- Cable TV (ID 5)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-tv' 
WHERE `id` = 5;

-- TV Satelital (ID 6)
UPDATE `servicios` 
SET `fa_icon` = 'fa-solid fa-satellite' 
WHERE `id` = 6;

-- Verificar los cambios
SELECT `id`, `descripcion`, `fa_icon` 
FROM `servicios` 
WHERE `id` BETWEEN 1 AND 6 
ORDER BY `id`; 