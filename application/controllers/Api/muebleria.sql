
CREATE TABLE `categorias` (
  `IdCategoria` int(10) NOT NULL,
  `Tipo` varchar(60) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Status` varchar(60) NOT NULL,
  `Fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `categorias` (`IdCategoria`, `Tipo`, `Nombre`, `Status`, `Fecha_alta`) VALUES
(1, 'jardin', 'podadora', 'vigente', '2023-11-24 10:02:00'),
(3, 'comedor', 'sillas', 'vigente', '2021-07-23 12:45:22'),
(4, 'sala', 'sillon', 'vigente', '2022-12-31 18:45:22');

CREATE TABLE `entrada_salida` (
  `IdEntrada` int(11) NOT NULL,
  `Fecha_entrada` datetime NOT NULL,
  `Fecha_salida` datetime NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `entrada_salida` (`IdEntrada`, `Fecha_entrada`, `Fecha_salida`, `IdProducto`) VALUES
(1, '2023-07-26 21:17:58', '2023-07-26 21:17:58', 1),
(4, '2001-11-24 10:01:00', '2002-11-24 10:01:00', 10),
(5, '2022-11-24 10:01:00', '2023-11-24 10:02:00', 10);


CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Piezas` int(11) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Fecha_registro` datetime NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`IdProducto`, `IdCategoria`, `Marca`, `Nombre`, `Piezas`, `Precio`, `Fecha_registro`, `Status`) VALUES
(1, 1, 'LG', 'Pantalla', 10, 8146, '2020-07-28 21:06:21', 'vigente'),
(3, 2, 'todomex', 'silla', 100, 256, '2023-11-24 10:02:00', 'vigente'),
(4, 2, 'artesanal', 'mesa redonda', 5, 2454, '2023-07-04 13:06:22', 'baja');


CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido_pat` varchar(100) NOT NULL,
  `Apellido_mat` varchar(100) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fecha_registro` datetime NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`IdUsuarios`, `Nombre`, `Apellido_pat`, `Apellido_mat`, `Puesto`, `Foto`, `Password`, `Fecha_registro`, `Email`) VALUES
(1, 'daniel de jesus', 'ambrocio', 'reyes', 'gerente', 'dan.jpg', 'tacos', '2023-07-26 06:27:30', 'daniel@gmail.com'),
(3, 'anette', 'hernandez', 'escarcega', 'gerente', 'anette.jpg', 'efvafdb', '2023-07-26 08:30:30', 'anette@gmail.com'),
(4, 'karlos', 'luengas', 'cabrera', 'lider', 'karlosfoto.jpg', 'ehnfhfsz', '2023-07-11 18:47:30', 'karlosluengas@gmail.com'),
(5, 'mayra', 'merino', 'mendez', 'gerente', 'mayrafotonueva.jpg', 'fevbqtbgcadw', '2022-12-15 10:27:33', 'mayramerino@gmail.com');


ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `entrada_salida`
--
ALTER TABLE `entrada_salida`
  ADD PRIMARY KEY (`IdEntrada`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrada_salida`
--
ALTER TABLE `entrada_salida`
  MODIFY `IdEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
