-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 08:39:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lubricante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `cedula` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`cedula`, `email`, `contraseña`) VALUES
(1000000000, 'root@email.com', 'admin123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cedula` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombre`, `apellido`) VALUES
(1111111, 'pepe', 'paredes'),
(55555555, 'xxxxxxxxasdas', 'xxxxxxxsad'),
(88888888, 'Michael', 'Serrano'),
(123123123, 'adssadasd', 'asdasdasd'),
(123456789, 'jose', 'Vallejo'),
(165546512, 'Michaelsss', 'Hernandez'),
(1000000000, 'Administrador', 'Administrador'),
(1009999999, 'Daniel', 'Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(50) NOT NULL,
  `precio` double(50,0) NOT NULL,
  `stock` int(10) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombreproducto`, `precio`, `stock`, `descripcion`) VALUES
(1, 'Liquido de frenos', 8, 10, 'El Líquido de frenos es un componente esencial para el funcionamiento seguro y efectivo de cualquier vehículo equipado con frenos hidráulicos. Diseñado para transferir la fuerza del pedal de freno a las ruedas, este producto se encuentra entre los elementos más críticos para garantizar un rendimiento óptimo del sistema de frenado. Nuestro líquido de frenos de alta calidad ha sido cuidadosamente formulado y probado para ofrecer una excelente respuesta en condiciones diversas y extremas, brindando tranquilidad y seguridad a los conductores en cada trayecto.'),
(2, 'Aceite Castrol 80w90 Galon 14', 3, 5, 'Este aceite proporciona una excelente protección contra el desgaste del motor, lo que ayuda a prolongar la vida útil del mismo.'),
(3, 'Aceite Gulf 140 galón ', 9, 7, 'El Aceite Gulf 140 Galón es un lubricante de calidad superior, diseñado para brindar un rendimiento excepcional en una variedad de aplicaciones industriales y equipos de trabajo pesado. Este galón de aceite representa una solución confiable y eficiente para mantener su maquinaria en óptimas condiciones y proteger sus inversiones a largo plazo.'),
(4, 'Aceite Mobil Delvac', 105, 5, 'El Aceite Mobil Delvac es una avanzada y confiable línea de aceites lubricantes diseñada específicamente para motores diésel de alto rendimiento. Esta gama de productos representa la excelencia en lubricación y ofrece una serie de beneficios clave para garantizar el máximo rendimiento y protección de sus motores diésel, ya sea en vehículos comerciales, industriales o equipos pesados.'),
(5, 'Refrigerante freezetone galón', 5, 6, 'El Refrigerante Freezetone Galón es una solución avanzada y confiable para mantener el sistema de enfriamiento de su vehículo en condiciones óptimas. Este refrigerante de calidad superior ha sido diseñado para brindar una protección duradera contra el sobrecalentamiento y la corrosión, garantizando un rendimiento confiable y una vida útil prolongada de su motor.'),
(6, 'Filtro combustible Franing HCX-446', 5, 6, 'El Filtro de Combustible Franing HCX-446 es un componente esencial diseñado para garantizar un flujo de combustible limpio y libre de impurezas hacia el motor de su vehículo. Con una construcción de alta calidad y tecnología avanzada, este filtro proporciona una filtración eficiente y una protección óptima para el sistema de combustible, manteniendo el motor en su mejor rendimiento y prolongando su vida útil.'),
(7, 'Aceite Valvoline para motos 14', 4, 6, 'El Aceite Valvoline para Motos 1/4 es un lubricante de alto rendimiento especialmente formulado para proporcionar una protección excepcional y un funcionamiento óptimo en motores de motocicletas. Este producto representa la excelencia en lubricación y ha sido diseñado para satisfacer las demandas únicas de los motores de motos, garantizando un rendimiento suave, una potencia confiable y una durabilidad prolongada.'),
(8, 'Liquido de frenos 1 litro', 10, 6, 'El Líquido de Frenos de 1 litro es un fluido especializado diseñado para el sistema de frenos de vehículos, motocicletas y otros equipos que requieren un frenado seguro y eficiente. Este producto es esencial para mantener la integridad y el rendimiento óptimo del sistema de frenado, proporcionando confianza al conductor y seguridad para todos los ocupantes del vehículo.'),
(9, 'Aceite Castrol para motos 14', 5, 3, 'El Aceite Castrol para Motos 1/4 es un lubricante de alto rendimiento especialmente diseñado para satisfacer las exigentes necesidades de los motores de motocicletas. Con la calidad reconocida de la marca Castrol, este aceite proporciona una protección óptima y un rendimiento confiable, asegurando una experiencia de conducción suave y segura para los amantes de las dos ruedas.'),
(10, 'Aceite Kendal', 17, 6, 'El Aceite Kendall es un lubricante de motor de alta calidad que ha sido formulado y desarrollado para brindar un rendimiento excepcional y una protección óptima a los motores de vehículos modernos. Con décadas de experiencia en la industria y una reputación bien establecida, Kendall ha sido una elección confiable para conductores y entusiastas de motores en todo el mundo. Nuestro aceite Kendall ofrece una combinación de tecnología avanzada y componentes de primera calidad para garantizar que su motor funcione de manera eficiente y confiable, prolongando su vida útil y optimizando el rendimiento del vehículo.'),
(11, 'Aceite Castrol 25w60', 69, 3, 'El Aceite Castrol 25W-60 es un lubricante de motor especialmente diseñado para satisfacer las demandas de vehículos de alto rendimiento y motores sometidos a condiciones extremas. Con una reputación bien establecida en el mundo automotriz, Castrol ha sido un nombre confiable en la industria durante décadas. Este aceite proporciona una protección avanzada y un rendimiento excepcional en motores que requieren un nivel adicional de cuidado y mantenimiento debido a su uso intensivo, alta potencia y temperaturas elevadas.'),
(12, 'Filtro proSelec 21334', 4, 6, 'El filtro de aire ProSelec 21334 es un componente esencial para el sistema de admisión de aire de su vehículo. Diseñado para eliminar partículas y contaminantes del aire que ingresa al motor, este filtro garantiza un suministro limpio de aire para una combustión óptima y un rendimiento eficiente del motor. ProSelec ha sido reconocido en la industria automotriz por su compromiso con la calidad y rendimiento de sus productos, y el filtro de aire 21334 no es una excepción. Con una construcción robusta y materiales de alta calidad, este filtro está diseñado para brindar un rendimiento confiable y una protección adecuada al motor durante toda su vida útil.'),
(13, 'Refrigerante AC delco galon ', 15, 9, 'El refrigerante AC Delco en presentación de galón es una solución avanzada y de alta calidad diseñada para mantener la temperatura óptima del motor de su vehículo y protegerlo contra el sobrecalentamiento. Fabricado por AC Delco, una marca de renombre en la industria automotriz, este refrigerante ha sido formulado con precisión para brindar una protección efectiva contra la corrosión y el desgaste del sistema de enfriamiento, al tiempo que garantiza un rendimiento confiable en una variedad de condiciones de conducción.'),
(14, 'Filtro combustible Shogun FF5138', 6, 5, 'El filtro de combustible Shogun FF5138 es un componente vital para el sistema de suministro de combustible de su vehículo. Diseñado para eliminar impurezas y sedimentos presentes en el combustible, este filtro asegura un flujo limpio y confiable de combustible hacia el motor. Shogun es una marca reconocida en la industria automotriz por su enfoque en la calidad y rendimiento de sus productos, y el filtro de combustible FF5138 cumple con los más altos estándares para garantizar una protección adecuada del motor y un rendimiento eficiente.'),
(15, 'Filtro shogun RB187C', 5, 6, 'El filtro de aire Shogun RB187C es una pieza clave del sistema de admisión de aire de su vehículo. Diseñado para proporcionar una filtración eficiente, este filtro de aire garantiza que el aire que ingresa al motor esté libre de partículas y contaminantes que podrían afectar negativamente su rendimiento y eficiencia. Shogun es una marca reconocida en la industria automotriz por su enfoque en la calidad y rendimiento de sus productos, y el filtro de aire RB187C cumple con los más altos estándares para asegurar una protección óptima del motor y un rendimiento confiable.'),
(16, 'Filtro shogun', 5, 3, 'El filtro Shogun es una pieza esencial del sistema de mantenimiento y protección del motor de su vehículo. Diseñado con un enfoque en la calidad y rendimiento, este filtro se encarga de filtrar diferentes fluidos o gases en el vehículo para mantener un funcionamiento óptimo del motor y proteger sus componentes internos. La marca Shogun es reconocida por su compromiso con la excelencia y la confiabilidad de sus productos, y el filtro Shogun cumple con los más altos estándares para brindar una protección efectiva y un rendimiento óptimo.'),
(17, 'Aceite Valvodiesel 15w40', 15, 6, 'El Aceite Valvodiesel 15W-40 es un lubricante de alto rendimiento diseñado específicamente para motores diésel. Este aceite ha sido formulado con tecnología avanzada para proporcionar una protección óptima y un rendimiento confiable en motores sometidos a condiciones exigentes y de alto desempeño. Valvodiesel es una marca reconocida en la industria automotriz por su enfoque en la calidad y eficacia de sus productos, y el Aceite Valvodiesel 15W-40 cumple con los estándares más rigurosos para garantizar una protección completa del motor y una conducción segura.'),
(18, 'Aceite Magnatec 10w30 - 20w50', 18, 3, 'El Aceite Castrol Magnatec 10W-30 y 20W-50 son lubricantes de motor de alta calidad que han sido especialmente formulados para brindar una protección instantánea desde el momento en que se arranca el motor. Castrol Magnatec es una marca reconocida en la industria automotriz por su tecnología inteligente y avanzada que se adhiere a las partes críticas del motor, formando una capa de protección extra que reduce significativamente el desgaste y contribuye a un rendimiento confiable en diferentes condiciones de conducción.'),
(19, 'Aceite Gulf 85w140 Galon', 50, 3, 'El Aceite Gulf 85W-140 es un lubricante de alta calidad diseñado especialmente para transmisiones y ejes de vehículos. Este aceite ha sido formulado para proporcionar una protección óptima y un rendimiento confiable en sistemas de transmisión y ejes sometidos a condiciones de alto estrés y cargas pesadas. La marca Gulf es reconocida en la industria automotriz por su compromiso con la calidad y eficacia de sus productos, y el Aceite Gulf 85W-140 cumple con los estándares más rigurosos para asegurar una protección completa y una operación suave en transmisiones y ejes.'),
(20, 'Aceite Gulf 90 14', 8, 4, 'El Aceite Gulf 90 1/4 es un lubricante de alta calidad diseñado especialmente para transmisiones y ejes de vehículos. Este aceite ha sido formulado para proporcionar una protección óptima y un rendimiento confiable en sistemas de transmisión y ejes sometidos a condiciones de alto estrés y cargas pesadas. La marca Gulf es reconocida en la industria automotriz por su compromiso con la calidad y eficacia de sus productos, y el Aceite Gulf 85W-140 cumple con los estándares más rigurosos para asegurar una protección completa y una operación suave en transmisiones y ejes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `email`, `contraseña`) VALUES
(1111111, 'pepe@gmail.com', 'contra1234'),
(55555555, 'rooadasdsad@email.com', '$2y$10$PZwwRmcM05vNKb1BrmufJ.JRGPaMaVlYCtui/z9HR0xsDZe0jmW4e'),
(88888888, 'ejemplo@gmail.com', '123456789a'),
(123123123, 'ejemplo1@gmail.com', 'adadwawdawd434543'),
(123456789, 'ejemplo@gmail.com', '12345678910'),
(165546512, 'pepesssss@gmail.com', 'xxxxxxxx'),
(1009999999, 'asda@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(10) NOT NULL,
  `idcliente` int(10) NOT NULL,
  `idproducto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `preciototal` double(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD KEY `admin_persona` (`cedula`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD KEY `ventas_producto` (`idproducto`),
  ADD KEY `ventas_usuario` (`idcliente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `admin_persona` FOREIGN KEY (`cedula`) REFERENCES `persona` (`cedula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_persona` FOREIGN KEY (`cedula`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_usuario` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
