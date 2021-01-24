SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

--
-- Base de datos: `Usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE Usuarios (
  user varchar(10) NOT NULL PRIMARY KEY,
  clave varchar(15) NOT NULL,
  nombre varchar(20) NOT NULL,
  email varchar(25) NOT NULL,
  plan int NOT NULL,
  estado varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO Usuarios (user, clave, nombre, email, plan, estado) VALUES
('admin','12345','Administrador','admin@system.com',3,'A'),
('user01','user01clave','Fernando Pérez','user01@gmailio.com',0,'A'),
('user02','user02clave','Carmen García','user02@gmailio.com',1,'B'),
('yes33','micasa23','Jesica Rico','yes33@gmailio.com',2,'I'),
('user0001','User0001$','Fernando García','cosa01@iestetuan.es',1,'A');

