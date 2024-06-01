-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2024 a las 16:45:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbolerodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclubes`
--

CREATE TABLE `tblclubes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Estadio` varchar(255) DEFAULT NULL,
  `Capacidad` int(11) DEFAULT NULL,
  `FKIdPatrocinadorPrincipal` int(11) DEFAULT NULL,
  `FKIdpatrocinadorUniforme` int(11) DEFAULT NULL,
  `FKIdPatrocinadorPecho` int(11) DEFAULT NULL,
  `FKIdPatrocinadorManga` int(11) DEFAULT NULL,
  `FKIdPatrocinadorEspalda` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDFichajes` int(11) DEFAULT NULL,
  `FKIDTemporadas` int(11) DEFAULT NULL,
  `FKIDPartido` int(11) DEFAULT NULL,
  `FKIDEstadisticas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblclubes`
--

INSERT INTO `tblclubes` (`ID`, `Nombre`, `Ciudad`, `Direccion`, `Estadio`, `Capacidad`, `FKIdPatrocinadorPrincipal`, `FKIdpatrocinadorUniforme`, `FKIdPatrocinadorPecho`, `FKIdPatrocinadorManga`, `FKIdPatrocinadorEspalda`, `FKIDPlantilla`, `FKIDNacionalidades`, `FKIDLigas`, `FKIDFichajes`, `FKIDTemporadas`, `FKIDPartido`, `FKIDEstadisticas`) VALUES
(1, 'Arsenal', 'Londres', NULL, 'Emirates Stadium', 60704, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(2, 'Aston Villa', 'Birmingham', NULL, 'Villa Park', 42657, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, 'Bournemouth', 'Bournemouth', NULL, 'Vitality Stadium', 11307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(4, 'Brentford', 'Londres', NULL, 'Gtech Community Stadium', 17250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(5, 'Brighton & Hove Albion', 'Brighton & Hove', NULL, 'Amex Stadium', 31800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(6, 'Burnley', 'Burnley', NULL, 'Turf Moor', 21944, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, 'Chelsea', 'Londres', NULL, 'Stamford Bridge', 40343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(8, 'Crystal Palace', 'Londres', NULL, 'Selhurst Park', 25486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(9, 'Everton', 'Liverpool', NULL, 'Goodison Park', 39414, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(10, 'Fulham', 'Londres', NULL, 'Craven Cottage', 22384, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(11, 'Liverpool', 'Liverpool', NULL, 'Anfield', 53394, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(12, 'Luton Town', 'Luton', NULL, 'Kenilworth Road', 10356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(13, 'Manchester City', 'Mánchester', NULL, 'Etihad Stadium', 53400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(14, 'Manchester United', 'Mánchester', NULL, 'Old Trafford', 74310, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(15, 'Newcastle United', 'Newcastle', NULL, 'St James\ Park', 52305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(16, 'Nottingham Forest', 'Nottingham', NULL, 'City Ground', 30332, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(17, 'Sheffield United', 'Sheffield', NULL, 'Bramall Lane', 32050, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(18, 'Tottenham Hotspur', 'Londres', NULL, 'Tottenham Hotspur Stadium', 62850, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(19, 'West Ham United', 'Londres', NULL, 'London Stadium', 62500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(20, 'Wolverhampton Wanderers', 'Wolverhampton', NULL, 'Molineux Stadium', 31750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestadisticas`
--

CREATE TABLE `tblestadisticas` (
  `ID` int(11) NOT NULL,
  `Posesion` decimal(5,2) DEFAULT NULL,
  `TirosEsquina` int(11) DEFAULT NULL,
  `Marcador` int(11) DEFAULT NULL,
  `TiroArco` int(11) DEFAULT NULL,
  `Empate` int(11) DEFAULT NULL,
  `VictoriaVisitante` int(11) DEFAULT NULL,
  `VictoriaLocal` int(11) DEFAULT NULL,
  `Faltas` int(11) DEFAULT NULL,
  `Goles` int(11) DEFAULT NULL,
  `Atajadas` int(11) DEFAULT NULL,
  `TarjetasAmarillas` int(11) DEFAULT NULL,
  `TarjetasRojas` int(11) DEFAULT NULL,
  `FKIDPartido` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDClub` int(11) DEFAULT NULL,
  `FKIDSeleccionesNacionales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfichajes`
--

CREATE TABLE `tblfichajes` (
  `ID` int(11) NOT NULL,
  `TipoFichaje` varchar(50) DEFAULT NULL,
  `ClubAnterior` int(11) DEFAULT NULL,
  `ClubActual` int(11) DEFAULT NULL,
  `CostoFichaje` decimal(10,2) DEFAULT NULL,
  `FKIDTemporada` int(11) DEFAULT NULL,
  `FKIDPlantillas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinvitados`
--

CREATE TABLE `tblinvitados` (
  `IdInvitado` int(11) NOT NULL,
  `Género` varchar(50) DEFAULT NULL,
  `País` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `FKIDRoles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblinvitados`
--

INSERT INTO `tblinvitados` (`IdInvitado`, `Género`, `País`, `Ciudad`, `Edad`, `FKIDRoles`) VALUES
(1, 'Masculino', 'España', 'Madrid', 28, 1),
(2, 'Femenino', 'Estados Unidos', 'Nueva York', 34, 1),
(3, 'Masculino', 'Francia', 'París', 22, 1),
(4, 'Femenino', 'Canadá', 'Toronto', 30, 1),
(5, 'Masculino', 'Alemania', 'Berlín', 25, 1),
(6, 'Femenino', 'Reino Unido', 'Londres', 29, 1),
(7, 'Masculino', 'Italia', 'Roma', 27, 1),
(8, 'Femenino', 'Australia', 'Sídney', 32, 1),
(9, 'Masculino', 'Brasil', 'Río de Janeiro', 31, 1),
(10, 'Femenino', 'México', 'Ciudad de México', 26, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblligas`
--

CREATE TABLE `tblligas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `NumeroEquipos` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL,
  `FKIDTemporada` int(11) DEFAULT NULL,
  `FKIDPartidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblligas`
--

INSERT INTO `tblligas` (`ID`, `Nombre`, `NumeroEquipos`, `FKIDClubes`, `FKIDNacionalidades`, `FKIDTemporada`, `FKIDPartidos`) VALUES
(1, 'Premier League', 20, NULL, 142, NULL, NULL),
(2, 'EFL Championship', 24, NULL, 142, NULL, NULL),
(3, 'EFL League One', 24, NULL, 142, NULL, NULL),
(4, 'EFL League Two', 24, NULL, 142, NULL, NULL),
(5, 'National League', 24, NULL, 142, NULL, NULL),
(6, 'National League North', 24, NULL, 142, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnacionalidades`
--

CREATE TABLE `tblnacionalidades` (
  `ID` int(11) NOT NULL,
  `Nombres` varchar(255) DEFAULT NULL,
  `Capital` varchar(255) DEFAULT NULL,
  `Idiomas` varchar(255) DEFAULT NULL,
  `Continente` varchar(255) DEFAULT NULL,
  `Monedas` varchar(255) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblnacionalidades`
--

INSERT INTO `tblnacionalidades` (`ID`, `Nombres`, `Capital`, `Idiomas`, `Continente`, `Monedas`, `FKIDPlantilla`, `FKIDLigas`, `FKIDClubes`) VALUES
(1, 'Afganistán', 'Kabul', 'Pastún y Dari (persa)', 'Asia', 'Afgani afgano (AFN)', NULL, NULL, NULL),
(2, 'Albania', 'Tirana', 'Albanés', 'Europa', 'Lek albanés (ALL)', NULL, NULL, NULL),
(3, 'Alemania', 'Berlín', 'Alemán', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(4, 'Andorra', 'Andorra la Vella', 'Catalán', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(5, 'Angola', 'Luanda', 'Portugués', 'África', 'Kwanza angoleño (AOA)', NULL, NULL, NULL),
(6, 'Arabia Saudita', 'Riad', 'Árabe', 'Asia', 'Riyal saudí (SAR)', NULL, NULL, NULL),
(7, 'Argelia', 'Argel', 'Árabe', 'África', 'Dinar argelino (DZD)', NULL, NULL, NULL),
(8, 'Argentina', 'Buenos Aires', 'Español', 'América del Sur', 'Peso argentino (ARS)', NULL, NULL, NULL),
(9, 'Armenia', 'Ereván', 'Armenio', 'Asia', 'Dram armenio (AMD)', NULL, NULL, NULL),
(10, 'Australia', 'Canberra', 'Inglés', 'Oceanía', 'Dólar australiano (AUD)', NULL, NULL, NULL),
(11, 'Austria', 'Viena', 'Alemán', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(12, 'Azerbaiyán', 'Bakú', 'Azerbaiyano', 'Asia', 'Manat azerbaiyano (AZN)', NULL, NULL, NULL),
(13, 'Bahréin', 'Manama', 'Árabe', 'Asia', 'Dinar bahreiní (BHD)', NULL, NULL, NULL),
(14, 'Bangladesh', 'Daca', 'Bengalí', 'Asia', 'Taka bangladesí (BDT)', NULL, NULL, NULL),
(15, 'Barbados', 'Bridgetown', 'Inglés', 'América del Norte', 'Dólar de Barbados (BBD)', NULL, NULL, NULL),
(16, 'Bélgica', 'Bruselas', 'Neerlandés, Francés, Alemán', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(17, 'Belice', 'Belmopán', 'Inglés', 'América Central', 'Dólar beliceño (BZD)', NULL, NULL, NULL),
(18, 'Benín', 'Porto Novo', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(19, 'Bielorrusia', 'Minsk', 'Bielorruso, Ruso', 'Europa', 'Rublo bielorruso (BYN)', NULL, NULL, NULL),
(20, 'Birmania (Myanmar)', 'Naypyidaw', 'Birmano', 'Asia', 'Kyat birmano (MMK)', NULL, NULL, NULL),
(21, 'Bolivia', 'Sucre / La Paz', 'Español, Quechua', 'América del Sur', 'Boliviano (BOB)', NULL, NULL, NULL),
(22, 'Bosnia y Herzegovina', 'Sarajevo', 'Bosnio, Croata, Serbio', 'Europa', 'Marco convertible (BAM)', NULL, NULL, NULL),
(23, 'Botsuana', 'Gaborone', 'Setsuana, Inglés', 'África', 'Pula botsuano (BWP)', NULL, NULL, NULL),
(24, 'Brasil', 'Brasilia', 'Portugués', 'América del Sur', 'Real brasileño (BRL)', NULL, NULL, NULL),
(25, 'Brunei', 'Bandar Seri Begawan', 'Malayo', 'Asia', 'Dólar de Brunéi (BND)', NULL, NULL, NULL),
(26, 'Bulgaria', 'Sofía', 'Búlgaro', 'Europa', 'Lev búlgaro (BGN)', NULL, NULL, NULL),
(27, 'Burkina Faso', 'Uagadugú', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(28, 'Burundi', 'Buyumbura', 'Kirundi, Francés', 'África', 'Franco burundés (BIF)', NULL, NULL, NULL),
(29, 'Bután', 'Thimphu', 'Dzongkha', 'Asia', 'Ngultrum butanés (BTN)', NULL, NULL, NULL),
(30, 'Cabo Verde', 'Praia', 'Portugués', 'África', 'Escudo caboverdiano (CVE)', NULL, NULL, NULL),
(31, 'Camboya', 'Nom Pen', 'Jemer', 'Asia', 'Riel camboyano (KHR)', NULL, NULL, NULL),
(32, 'Camerún', 'Yaundé', 'Francés, Inglés', 'África', 'Franco CFA de África Central (XAF)', NULL, NULL, NULL),
(33, 'Canadá', 'Ottawa', 'Inglés, Francés', 'América del Norte', 'Dólar canadiense (CAD)', NULL, NULL, NULL),
(34, 'Catar', 'Doha', 'Árabe', 'Asia', 'Riyal catarí (QAR)', NULL, NULL, NULL),
(35, 'Chad', 'Yamena', 'Árabe, Francés', 'África', 'Franco CFA de África Central (XAF)', NULL, NULL, NULL),
(36, 'Chile', 'Santiago', 'Español', 'América del Sur', 'Peso chileno (CLP)', NULL, NULL, NULL),
(37, 'China', 'Pekín', 'Mandarín', 'Asia', 'Yuan chino (CNY)', NULL, NULL, NULL),
(38, 'Chipre', 'Nicosia', 'Griego, Turco', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(39, 'Ciudad del Vaticano', 'Ciudad del Vaticano', 'Italiano, Latín', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(40, 'Colombia', 'Bogotá', 'Español', 'América del Sur', 'Peso colombiano (COP)', NULL, NULL, NULL),
(41, 'Comoras', 'Moroni', 'Árabe, Francés', 'África', 'Franco comorense (KMF)', NULL, NULL, NULL),
(42, 'Corea del Norte', 'Pionyang', 'Coreano', 'Asia', 'Won norcoreano (KPW)', NULL, NULL, NULL),
(43, 'Corea del Sur', 'Seúl', 'Coreano', 'Asia', 'Won surcoreano (KRW)', NULL, NULL, NULL),
(44, 'Costa de Marfil', 'Yamusukro / Abiyán', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(45, 'Costa Rica', 'San José', 'Español', 'América Central', 'Colón costarricense (CRC)', NULL, NULL, NULL),
(46, 'Croacia', 'Zagreb', 'Croata', 'Europa', 'Kuna croata (HRK)', NULL, NULL, NULL),
(47, 'Cuba', 'La Habana', 'Español', 'América del Norte', 'Peso cubano (CUP)', NULL, NULL, NULL),
(48, 'Dinamarca', 'Copenhague', 'Danés', 'Europa', 'Corona danesa (DKK)', NULL, NULL, NULL),
(49, 'Dominica', 'Roseau', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', NULL, NULL, NULL),
(50, 'Ecuador', 'Quito', 'Español', 'América del Sur', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(51, 'Egipto', 'El Cairo', 'Árabe', 'África', 'Libra egipcia (EGP)', NULL, NULL, NULL),
(52, 'El Salvador', 'San Salvador', 'Español', 'América Central', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(53, 'Emiratos Árabes Unidos', 'Abu Dabi', 'Árabe', 'Asia', 'Dirham de los Emiratos Árabes Unidos (AED)', NULL, NULL, NULL),
(54, 'Eritrea', 'Asmara', 'Tigrigna, Árabe', 'África', 'Nakfa eritreo (ERN)', NULL, NULL, NULL),
(55, 'Eslovaquia', 'Bratislava', 'Eslovaco', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(56, 'Eslovenia', 'Liubliana', 'Esloveno', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(57, 'España', 'Madrid', 'Español', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(58, 'Estados Unidos', 'Washington, D.C.', 'Inglés', 'América del Norte', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(59, 'Estonia', 'Tallin', 'Estonio', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(60, 'Etiopía', 'Adís Abeba', 'Amarigna, Oromigna, Tigrigna', 'África', 'Birr etíope (ETB)', NULL, NULL, NULL),
(61, 'Filipinas', 'Manila', 'Filipino, Inglés', 'Asia', 'Peso filipino (PHP)', NULL, NULL, NULL),
(62, 'Finlandia', 'Helsinki', 'Finés, Sueco', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(63, 'Fiyi', 'Suva', 'Fiyiano, Inglés', 'Oceanía', 'Dólar fiyiano (FJD)', NULL, NULL, NULL),
(64, 'Francia', 'París', 'Francés', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(65, 'Gabón', 'Libreville', 'Francés', 'África', 'Franco CFA de África Central (XAF)', NULL, NULL, NULL),
(66, 'Gambia', 'Banjul', 'Inglés', 'África', 'Dalasi gambiano (GMD)', NULL, NULL, NULL),
(67, 'Georgia', 'Tiflis', 'Georgiano', 'Asia', 'Lari georgiano (GEL)', NULL, NULL, NULL),
(68, 'Ghana', 'Acra', 'Inglés, Akan', 'África', 'Cedi ghanés (GHS)', NULL, NULL, NULL),
(69, 'Granada', 'Saint George\´s', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', NULL, NULL, NULL),
(70, 'Grecia', 'Atenas', 'Griego', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(71, 'Guatemala', 'Ciudad de Guatemala', 'Español', 'América Central', 'Quetzal guatemalteco (GTQ)', NULL, NULL, NULL),
(72, 'Guinea', 'Conakri', 'Francés', 'África', 'Franco guineano (GNF)', NULL, NULL, NULL),
(73, 'Guinea Ecuatorial', 'Malabo / Bata', 'Español, Francés', 'África', 'Franco CFA de África Central (XAF)', NULL, NULL, NULL),
(74, 'Guinea-Bisáu', 'Bissau', 'Portugués', 'África', 'Franco guineano (XOF)', NULL, NULL, NULL),
(75, 'Guyana', 'Georgetown', 'Inglés', 'América del Sur', 'Dólar guyanés (GYD)', NULL, NULL, NULL),
(76, 'Haití', 'Puerto Príncipe', 'Francés, Creole', 'América del Norte', 'Gourde haitiano (HTG)', NULL, NULL, NULL),
(77, 'Honduras', 'Tegucigalpa', 'Español', 'América Central', 'Lempira hondureño (HNL)', NULL, NULL, NULL),
(78, 'Hungría', 'Budapest', 'Húngaro', 'Europa', 'Forinto húngaro (HUF)', NULL, NULL, NULL),
(79, 'India', 'Nueva Delhi', 'Hindi, Inglés', 'Asia', 'Rupia india (INR)', NULL, NULL, NULL),
(80, 'Indonesia', 'Yakarta', 'Indonesio', 'Asia', 'Rupia indonesia (IDR)', NULL, NULL, NULL),
(81, 'Irak', 'Bagdad', 'Árabe', 'Asia', 'Dinar iraquí (IQD)', NULL, NULL, NULL),
(82, 'Irán', 'Teherán', 'Persa', 'Asia', 'Rial iraní (IRR)', NULL, NULL, NULL),
(83, 'Irlanda', 'Dublín', 'Inglés, Irlandés', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(84, 'Islandia', 'Reikiavik', 'Islandés', 'Europa', 'Corona islandesa (ISK)', NULL, NULL, NULL),
(85, 'Islas Cook', 'Avarua', 'Cookiano, Maorí, Inglés', 'Oceanía', 'Dólar neozelandés (NZD)', NULL, NULL, NULL),
(86, 'Islas Marshall', 'Majuro', 'Marshallese, Inglés', 'Oceanía', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(87, 'Islas Salomón', 'Honiara', 'Pijin, Inglés', 'Oceanía', 'Dólar de las Islas Salomón (SBD)', NULL, NULL, NULL),
(88, 'Israel', 'Jerusalén (No reconocida internacionalmente)', 'Hebreo', 'Asia', 'Nuevo séquel israelí (ILS)', NULL, NULL, NULL),
(89, 'Italia', 'Roma', 'Italiano', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(90, 'Jamaica', 'Kingston', 'Inglés', 'América del Norte', 'Dólar jamaiquino (JMD)', NULL, NULL, NULL),
(91, 'Japón', 'Tokio', 'Japonés', 'Asia', 'Yen japonés (JPY)', NULL, NULL, NULL),
(92, 'Jordania', 'Amán', 'Árabe', 'Asia', 'Dinar jordano (JOD)', NULL, NULL, NULL),
(93, 'Kazajistán', 'Nursultán (anteriormente Astaná)', 'Kazajo, Ruso', 'Asia', 'Tenge kazajo (KZT)', NULL, NULL, NULL),
(94, 'Kenia', 'Nairobi', 'Suajili, Inglés', 'África', 'Chelín keniano (KES)', NULL, NULL, NULL),
(95, 'Kirguistán', 'Biskek', 'Kirguís, Ruso', 'Asia', 'Som kirguís (KGS)', NULL, NULL, NULL),
(96, 'Kiribati', 'Tarawa', 'Kiribati, Inglés', 'Oceanía', 'Dólar australiano (AUD)', NULL, NULL, NULL),
(97, 'Kuwait', 'Kuwait', 'Árabe', 'Asia', 'Dinar kuwaití (KWD)', NULL, NULL, NULL),
(98, 'Laos', 'Vientián', 'Lao', 'Asia', 'Kip laosiano (LAK)', NULL, NULL, NULL),
(99, 'Lesoto', 'Maseru', 'Sesotho, Inglés', 'África', 'Loti lesothense (LSL), Rand sudafricano (ZAR)', NULL, NULL, NULL),
(100, 'Letonia', 'Riga', 'Letón', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(101, 'Líbano', 'Beirut', 'Árabe', 'Asia', 'Libra libanesa (LBP)', NULL, NULL, NULL),
(102, 'Liberia', 'Monrovia', 'Inglés', 'África', 'Dólar liberiano (LRD)', NULL, NULL, NULL),
(103, 'Libia', 'Trípoli', 'Árabe', 'África', 'Dinar libio (LYD)', NULL, NULL, NULL),
(104, 'Liechtenstein', 'Vaduz', 'Alemán', 'Europa', 'Franco suizo (CHF)', NULL, NULL, NULL),
(105, 'Lituania', 'Vilna', 'Lituano', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(106, 'Luxemburgo', 'Luxemburgo', 'Luxemburgués, Francés, Alemán', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(107, 'Madagascar', 'Antananarivo', 'Malgache, Francés', 'África', 'Ariary malgache (MGA)', NULL, NULL, NULL),
(108, 'Malasia', 'Kuala Lumpur', 'Malayo', 'Asia', 'Ringgit malayo (MYR)', NULL, NULL, NULL),
(109, 'Malawi', 'Lilongüe', 'Chewa, Inglés', 'África', 'Kwacha malauí (MWK)', NULL, NULL, NULL),
(110, 'Maldivas', 'Malé', 'Dhivehi', 'Asia', 'Rufiyaa maldiva (MVR)', NULL, NULL, NULL),
(111, 'Malí', 'Bamako', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(112, 'Malta', 'La Valeta', 'Maltés, Inglés', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(113, 'Marruecos', 'Rabat', 'Árabe, Tamazight', 'África', 'Dirham marroquí (MAD)', NULL, NULL, NULL),
(114, 'Mauricio', 'Port Louis', 'Inglés, Francés', 'África', 'Rupia mauriciana (MUR)', NULL, NULL, NULL),
(115, 'Mauritania', 'Nuakchot', 'Árabe, Francés', 'África', 'Uguiya mauritano (MRU)', NULL, NULL, NULL),
(116, 'México', 'Ciudad de México', 'Español', 'América del Norte', 'Peso mexicano (MXN)', NULL, NULL, NULL),
(117, 'Micronesia', 'Palikir', 'Inglés', 'Oceanía', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(118, 'Moldavia', 'Chisináu', 'Rumano', 'Europa', 'Leu moldavo (MDL)', NULL, NULL, NULL),
(119, 'Mónaco', 'Mónaco', 'Francés', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(120, 'Mongolia', 'Ulán Bator', 'Mongol', 'Asia', 'Tugrik mongol (MNT)', NULL, NULL, NULL),
(121, 'Montenegro', 'Podgorica', 'Montenegrino, Serbio', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(122, 'Mozambique', 'Maputo', 'Portugués', 'África', 'Metical mozambiqueño (MZN)', NULL, NULL, NULL),
(123, 'Namibia', 'Windhoek', 'Inglés, Afrikáans', 'África', 'Dólar namibio (NAD)', NULL, NULL, NULL),
(124, 'Nauru', 'Yaren', 'Nauruano, Inglés', 'Oceanía', 'Dólar australiano (AUD)', NULL, NULL, NULL),
(125, 'Nepal', 'Katmandú', 'Nepalí', 'Asia', 'Rupia nepalesa (NPR)', NULL, NULL, NULL),
(126, 'Nicaragua', 'Managua', 'Español', 'América Central', 'Córdoba nicaragüense (NIO)', NULL, NULL, NULL),
(127, 'Níger', 'Niamey', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(128, 'Nigeria', 'Abuya', 'Inglés', 'África', 'Naira nigeriano (NGN)', NULL, NULL, NULL),
(129, 'Noruega', 'Oslo', 'Noruego, Sami', 'Europa', 'Corona noruega (NOK)', NULL, NULL, NULL),
(130, 'Nueva Zelanda', 'Wellington', 'Inglés, Maorí', 'Oceanía', 'Dólar neozelandés (NZD)', NULL, NULL, NULL),
(131, 'Omán', 'Mascate', 'Árabe', 'Asia', 'Rial omaní (OMR)', NULL, NULL, NULL),
(132, 'Países Bajos (Holanda)', 'Ámsterdam', 'Neerlandés', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(133, 'Pakistán', 'Islamabad', 'Urdu, Inglés', 'Asia', 'Rupia pakistaní (PKR)', NULL, NULL, NULL),
(134, 'Palaos', 'Melekeok', 'Palauano, Inglés', 'Oceanía', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(135, 'Palestina (Territorios Palestinos Ocupados)', 'Ramala (Administrativa)', 'Árabe', 'Asia', 'Nuevo séquel palestino (ILS)', NULL, NULL, NULL),
(136, 'Panamá', 'Ciudad de Panamá', 'Español', 'América Central', 'Balboa panameño (PAB)', NULL, NULL, NULL),
(137, 'Papúa Nueva Guinea', 'Puerto Moresby', 'Inglés', 'Oceanía', 'Kina papú (PGK)', NULL, NULL, NULL),
(138, 'Paraguay', 'Asunción', 'Español, Guaraní', 'América del Sur', 'Guaraní paraguayo (PYG)', NULL, NULL, NULL),
(139, 'Perú', 'Lima', 'Español', 'América del Sur', 'Sol peruano (PEN)', NULL, NULL, NULL),
(140, 'Polonia', 'Varsovia', 'Polaco', 'Europa', 'Zloty polaco (PLN)', NULL, NULL, NULL),
(141, 'Portugal', 'Lisboa', 'Portugués', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(142, 'Reino Unido', 'Londres', 'Inglés, Galés, Escocés, Irlandés', 'Europa', 'Libra esterlina (GBP)', NULL, NULL, NULL),
(143, 'República Centroafricana', 'Bangui', 'Francés, Sangro', 'África', 'Franco CFA de África Central (XAF)', NULL, NULL, NULL),
(144, 'República Checa', 'Praga', 'Checo', 'Europa', 'Corona checa (CZK)', NULL, NULL, NULL),
(145, 'República Dominicana', 'Santo Domingo', 'Español', 'América del Norte', 'Peso dominicano (DOP)', NULL, NULL, NULL),
(146, 'Ruanda', 'Kigali', 'Kinyarwanda, Francés, Inglés', 'África', 'Franco ruandés (RWF)', NULL, NULL, NULL),
(147, 'Rumania', 'Bucarest', 'Rumano', 'Europa', 'Leu rumano (RON)', NULL, NULL, NULL),
(148, 'Rusia', 'Moscú', 'Ruso', 'Europa / Asia', 'Rublo ruso (RUB)', NULL, NULL, NULL),
(149, 'Samoa', 'Apia', 'Samoano, Inglés', 'Oceanía', 'Tala samoano (WST)', NULL, NULL, NULL),
(150, 'San Cristóbal y Nieves', 'Basseterre', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', NULL, NULL, NULL),
(151, 'San Marino', 'San Marino', 'Italiano', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(152, 'Santa Lucía', 'Castries', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', NULL, NULL, NULL),
(153, 'San Vicente y las Granadinas', 'Kingstown', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', NULL, NULL, NULL),
(154, 'Santa Sede (Ciudad del Vaticano)', 'Ciudad del Vaticano', 'Latín, Italiano', 'Europa', 'Euro (EUR)', NULL, NULL, NULL),
(155, 'Santo Tomé y Príncipe', 'Santo Tomé', 'Portugués', 'África', 'Dobra santotomense (STD)', NULL, NULL, NULL),
(156, 'Senegal', 'Dakar', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(157, 'Serbia', 'Belgrado', 'Serbio', 'Europa', 'Dinar serbio (RSD)', NULL, NULL, NULL),
(158, 'Seychelles', 'Victoria', 'Seychellense, Francés, Inglés', 'África', 'Rupia seychellense (SCR)', NULL, NULL, NULL),
(159, 'Sierra Leona', 'Freetown', 'Inglés', 'África', 'Leone sierraleonés (SLL)', NULL, NULL, NULL),
(160, 'Singapur', 'Singapur', 'Malayo, Mandarín, Tamil, Inglés', 'Asia', 'Dólar de Singapur (SGD)', NULL, NULL, NULL),
(161, 'Siria', 'Damasco', 'Árabe', 'Asia', 'Libra siria (SYP)', NULL, NULL, NULL),
(162, 'Somalia', 'Mogadiscio', 'Somalí, Árabe', 'África', 'Chelín somalí (SOS)', NULL, NULL, NULL),
(163, 'Sri Lanka', 'Colombo', 'Singalés, Tamil', 'Asia', 'Rupia de Sri Lanka (LKR)', NULL, NULL, NULL),
(164, 'Suazilandia', 'Lobamba', 'Suazi, Inglés', 'África', 'Lilangeni suazi (SZL)', NULL, NULL, NULL),
(165, 'Sudáfrica', 'Bloemfontein, Ciudad del Cabo, Pretoria', 'Afrikáans, Inglés, Suazi', 'África', 'Rand sudafricano (ZAR)', NULL, NULL, NULL),
(166, 'Sudán', 'Jartum', 'Árabe', 'África', 'Libra sudanesa (SDG)', NULL, NULL, NULL),
(167, 'Sudán del Sur', 'Yuba', 'Inglés, Árabe', 'África', 'Libra sursudanesa (SSP)', NULL, NULL, NULL),
(168, 'Suecia', 'Estocolmo', 'Sueco', 'Europa', 'Corona sueca (SEK)', NULL, NULL, NULL),
(169, 'Suiza', 'Berna', 'Alemán, Francés, Italiano, Romanche', 'Europa', 'Franco suizo (CHF)', NULL, NULL, NULL),
(170, 'Surinam', 'Paramaribo', 'Neerlandés', 'América del Sur', 'Dólar surinamés (SRD)', NULL, NULL, NULL),
(171, 'Tailandia', 'Bangkok', 'Tailandés', 'Asia', 'Baht tailandés (THB)', NULL, NULL, NULL),
(172, 'Taiwán', 'Taipéi', 'Chino (mandarín)', 'Asia', 'Nuevo dólar taiwanés (TWD)', NULL, NULL, NULL),
(173, 'Tanzania', 'Dodoma', 'Suajili, Inglés', 'África', 'Chelín tanzano (TZS)', NULL, NULL, NULL),
(174, 'Tayikistán', 'Dusambé', 'Tayiko', 'Asia', 'Somoni tayiko (TJS)', NULL, NULL, NULL),
(175, 'Timor-Leste', 'Dili', 'Tetun, Portugués', 'Asia', 'Dólar estadounidense (USD)', NULL, NULL, NULL),
(176, 'Togo', 'Lomé', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', NULL, NULL, NULL),
(177, 'Tonga', 'Nukualofa', 'Tongano, Inglés', 'Oceanía', 'Paʻanga tongano (TOP)', NULL, NULL, NULL),
(178, 'Trinidad y Tobago', 'Puerto España', 'Inglés', 'América del Norte', 'Dólar de Trinidad y Tobago (TTD)', NULL, NULL, NULL),
(179, 'Túnez', 'Túnez', 'Árabe', 'África', 'Dinar tunecino (TND)', NULL, NULL, NULL),
(180, 'Turkmenistán', 'Asgabat', 'Turcomano', 'Asia', 'Manat turcomano (TMT)', NULL, NULL, NULL),
(181, 'Turquía', 'Ankara', 'Turco', 'Asia / Europa', 'Lira turca (TRY)', NULL, NULL, NULL),
(182, 'Tuvalu', 'Funafuti', 'Tuvaluano, Inglés', 'Oceanía', 'Dólar australiano (AUD)', NULL, NULL, NULL),
(183, 'Ucrania', 'Kiev', 'Ucraniano', 'Europa', 'Grivnia ucraniana (UAH)', NULL, NULL, NULL),
(184, 'Uganda', 'Kampala', 'Suajili, Inglés', 'África', 'Chelín ugandés (UGX)', NULL, NULL, NULL),
(185, 'Uruguay', 'Montevideo', 'Español', 'América del Sur', 'Peso uruguayo (UYU)', NULL, NULL, NULL),
(186, 'Uzbekistán', 'Taskent', 'Uzbeko', 'Asia', 'Som uzbeko (UZS)', NULL, NULL, NULL),
(187, 'Vanuatu', 'Port Vila', 'Bislama, Inglés, Francés', 'Oceanía', 'Vatu vanuatuense (VUV)', NULL, NULL, NULL),
(188, 'Venezuela', 'Caracas', 'Español', 'América del Sur', 'Bolívar venezolano (VES)', NULL, NULL, NULL),
(189, 'Vietnam', 'Hanoi', 'Vietnamita', 'Asia', 'Dong vietnamita (VND)', NULL, NULL, NULL),
(190, 'Yemen', 'Saná', 'Árabe', 'Asia', 'Rial yemení (YER)', NULL, NULL, NULL),
(191, 'Yibuti', 'Yibuti', 'Árabe, Francés', 'África', 'Franco yibutiano (DJF)', NULL, NULL, NULL),
(192, 'Zambia', 'Lusaka', 'Inglés', 'África', 'Kwacha zambiano (ZMW)', NULL, NULL, NULL),
(193, 'Zimbabue', 'Harare', 'Inglés, Shona, Sindebele', 'África', 'Dólar zimbabuense (ZWL)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpartidos`
--

CREATE TABLE `tblpartidos` (
  `ID` int(11) NOT NULL,
  `Calendario` varchar(255) DEFAULT NULL,
  `ClubLocal` int(11) DEFAULT NULL,
  `ClubVisitante` int(11) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `ResultadoLocal` int(11) DEFAULT NULL,
  `ResultadoVisitante` int(11) DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Goles` int(11) DEFAULT NULL,
  `TarjetasAmarillas` int(11) DEFAULT NULL,
  `TarjetasRojas` int(11) DEFAULT NULL,
  `DoblesAmarillas` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpatrocinadores`
--

CREATE TABLE `tblpatrocinadores` (
  `ID` int(11) NOT NULL,
  `RazonSocial` varchar(255) DEFAULT NULL,
  `TipoContrato` varchar(255) DEFAULT NULL,
  `TiempoContrato` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  `FKIDSeleccionesNacionales` int(11) DEFAULT NULL,
  `FKIDTemporadas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblpatrocinadores`
--

INSERT INTO `tblpatrocinadores` (`ID`, `RazonSocial`, `TipoContrato`, `TiempoContrato`, `FKIDPlantilla`, `FKIDClubes`, `FKIDSeleccionesNacionales`, `FKIDTemporadas`) VALUES
(1, '32Red', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Adidas', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'AIA', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'American Express', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Angry Birds', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Bet365', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'BetVictor', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Betway', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'BK8', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Cadbury', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Cazoo', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Castore', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'CFK Group', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Cinch', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Dafabet', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Emirates', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Etihad Airways', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Fly Emirates', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Fun88', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Hollywoodbets', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Hummel', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Kaiyun.com', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'King Power', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Kappa', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Macron', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'ManBetX', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'New Balance', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Nike', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Puma', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'SBOTOP', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Sela', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Sky Bet', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Socios.com', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Stake', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Standard Chartered', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'TeamViewer', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Three', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'TBC', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Umbro', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Utilita', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Visit Rwanda', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Vitality', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'W88', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblplantillas`
--

CREATE TABLE `tblplantillas` (
  `ID` int(11) NOT NULL,
  `Dorsal` int(11) DEFAULT NULL,
  `Posicion` varchar(255) DEFAULT NULL,
  `Nombres` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Estatura` decimal(5,2) DEFAULT NULL,
  `PieHabil` varchar(255) DEFAULT NULL,
  `PrecioMercado` decimal(10,2) DEFAULT NULL,
  `PartidosJugados` int(11) DEFAULT NULL,
  `TiempoJugado` int(11) DEFAULT NULL,
  `Goles` int(11) DEFAULT NULL,
  `Asistencias` int(11) DEFAULT NULL,
  `Atajadas` int(11) DEFAULT NULL,
  `TarjetasAmarillas` int(11) DEFAULT NULL,
  `DoblesAmarillas` int(11) DEFAULT NULL,
  `RojasDirectas` int(11) DEFAULT NULL,
  `FKTemporada` int(11) DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL,
  `FKIDSeleccionNacional` int(11) DEFAULT NULL,
  `FKIDPatrocinadores` int(11) DEFAULT NULL,
  `FKIDPartidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `IdRol` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `FKIDInvitados` int(11) DEFAULT NULL,
  `FKIDUsuarios` int(11) DEFAULT NULL,
  `FKIDTrabajadores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblroles`
--

INSERT INTO `tblroles` (`IdRol`, `Nombre`, `FKIDInvitados`, `FKIDUsuarios`, `FKIDTrabajadores`) VALUES
(1, 'Invitado', NULL, NULL, NULL),
(2, 'Básico', NULL, NULL, NULL),
(3, 'Estrella', NULL, NULL, NULL),
(4, 'Premium', NULL, NULL, NULL),
(5, 'Administrador', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblseleccionesnacionales`
--

CREATE TABLE `tblseleccionesnacionales` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(250) DEFAULT NULL,
  `AñoFundacion` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblseleccionesnacionales`
--

INSERT INTO `tblseleccionesnacionales` (`ID`, `Nombre`, `AñoFundacion`, `FKIDPlantilla`, `FKIDNacionalidades`) VALUES
(1, NULL, NULL, NULL, 1),
(2, 'selección de fútbol de albania', 1930, NULL, 2),
(3, 'selección de fútbol de alemania', 1900, NULL, 3),
(4, 'selección de fútbol de andorra', 1994, NULL, 4),
(5, 'selección de fútbol de angola', 1976, NULL, 5),
(6, 'selección de fútbol de arabia saudita', 1956, NULL, 6),
(7, 'selección de fútbol de argelia', 1962, NULL, 7),
(8, 'selección de fútbol de argentina', 1893, NULL, 8),
(9, 'selección de fútbol de armenia', 1992, NULL, 9),
(10, 'selección de fútbol de australia', 1963, NULL, 10),
(11, 'selección de fútbol de austria', 1904, NULL, 11),
(12, 'selección de fútbol de azerbaiyán', 1992, NULL, 12),
(13, 'selección de fútbol de bahréin', 1957, NULL, 13),
(14, 'selección de fútbol de bangladés', 1972, NULL, NULL),
(15, 'selección de fútbol de barbados', 1925, NULL, 15),
(16, 'selección de fútbol de bélgica', 1895, NULL, 16),
(17, 'selección de fútbol de belice', 1980, NULL, 17),
(18, 'selección de fútbol de benín', 1962, NULL, 18),
(19, 'selección de fútbol de bielorrusia', 1991, NULL, 19),
(20, 'selección de fútbol de birmania (myanmar)', NULL, NULL, 20),
(21, 'selección de fútbol de bolivia', 1925, NULL, 21),
(22, 'selección de fútbol de bosnia y herzegovina', 1992, NULL, 22),
(23, 'selección de fútbol de botsuana', 1968, NULL, 23),
(24, 'selección de fútbol de brasil', 1914, NULL, 24),
(25, NULL, NULL, NULL, 25),
(26, 'selección de fútbol de bulgaria', 1924, NULL, 26),
(27, 'selección de fútbol de burkina faso', 1960, NULL, 27),
(28, 'selección de fútbol de burundi', 1972, NULL, 28),
(29, NULL, NULL, NULL, 29),
(30, 'selección de fútbol de cabo verde', 1975, NULL, 30),
(31, NULL, NULL, NULL, 31),
(32, 'selección de fútbol de camerún', 1959, NULL, 32),
(33, 'selección de fútbol de canadá', 1912, NULL, 33),
(34, 'selección de fútbol de catar', 1960, NULL, 34),
(35, NULL, NULL, NULL, 35),
(36, 'selección de fútbol de chile', 1895, NULL, 36),
(37, 'selección de fútbol de china', 1924, NULL, 37),
(38, 'selección de fútbol de chipre', 1934, NULL, 38),
(39, NULL, NULL, NULL, 39),
(40, 'selección de fútbol de colombia', 1924, NULL, 40),
(41, NULL, NULL, NULL, 41),
(42, 'selección de fútbol de corea del norte', 1945, NULL, 42),
(43, 'selección de fútbol de corea del sur', 1945, NULL, 43),
(44, 'selección de fútbol de costa de marfil', 1960, NULL, 44),
(45, 'selección de fútbol de costa rica', 1921, NULL, 45),
(46, 'selección de fútbol de croacia', 1990, NULL, 46),
(47, 'selección de fútbol de cuba', 1924, NULL, 47),
(48, 'selección de fútbol de dinamarca', 1889, NULL, 48),
(49, NULL, 1970, NULL, 49),
(50, 'selección de fútbol de ecuador', 1925, NULL, 50),
(51, 'selección de fútbol de egipto', 1921, NULL, 51),
(52, 'selección de fútbol de el salvador', 1921, NULL, 52),
(53, 'selección de fútbol de emiratos árabes unidos', 1971, NULL, 53),
(54, NULL, NULL, NULL, 54),
(55, 'selección de fútbol de eslovaquia', 1993, NULL, 55),
(56, 'selección de fútbol de eslovenia', 1991, NULL, 56),
(57, 'selección de fútbol de españa', 1913, NULL, 57),
(58, 'selección de fútbol de estados unidos', 1885, NULL, 58),
(59, 'selección de fútbol de estonia', 1921, NULL, 59),
(60, NULL, NULL, NULL, 60),
(61, NULL, NULL, NULL, 61),
(62, 'selección de fútbol de finlandia', 1907, NULL, 62),
(63, NULL, NULL, NULL, 63),
(64, 'selección de fútbol de francia', 1904, NULL, 64),
(65, 'selección de fútbol de gabón', 1962, NULL, 65),
(66, 'selección de fútbol de gambia', 1952, NULL, 66),
(67, 'selección de fútbol de georgia', 1990, NULL, 67),
(68, 'selección de fútbol de ghana', 1957, NULL, 68),
(69, NULL, NULL, NULL, 69),
(70, 'selección de fútbol de grecia', 1926, NULL, 70),
(71, 'selección de fútbol de guatemala', 1919, NULL, 71),
(72, 'selección de fútbol de guinea', 1962, NULL, 72),
(73, 'selección de fútbol de guinea ecuatorial', 1960, NULL, 73),
(74, 'selección de fútbol de guinea bisáu', 1973, NULL, NULL),
(75, NULL, 1902, NULL, 75),
(76, 'selección de fútbol de haití', 1904, NULL, 76),
(77, 'selección de fútbol de honduras', 1951, NULL, 77),
(78, 'selección de fútbol de hungría', 1901, NULL, 78),
(79, 'selección de fútbol de india', 1937, NULL, 79),
(80, NULL, 1930, NULL, 80),
(81, 'selección de fútbol de irak', 1948, NULL, 81),
(82, 'selección de fútbol de irán', 1920, NULL, 82),
(83, 'selección de fútbol de irlanda', 1921, NULL, 83),
(84, 'selección de fútbol de islandia', 1947, NULL, 84),
(85, NULL, NULL, NULL, 85),
(86, NULL, NULL, NULL, 86),
(87, NULL, 1978, NULL, 87),
(88, 'selección de fútbol de israel', 1928, NULL, 88),
(89, 'selección de fútbol de italia', 1898, NULL, 89),
(90, 'selección de fútbol de jamaica', 1910, NULL, 90),
(91, 'selección de fútbol de japón', 1921, NULL, 91),
(92, 'selección de fútbol de jordania', 1949, NULL, 92),
(93, 'selección de fútbol de kazajistán', 1992, NULL, 93),
(94, 'selección de fútbol de kenia', 1960, NULL, 94),
(95, 'selección de fútbol de kirguistán', 1992, NULL, 95),
(96, NULL, NULL, NULL, 96),
(97, 'selección de fútbol de kuwait', 1952, NULL, 97),
(98, NULL, NULL, NULL, 98),
(99, 'selección de fútbol de lesoto', 1932, NULL, 99),
(100, 'selección de fútbol de letonia', 1921, NULL, 100),
(101, 'selección de fútbol de líbano', 1933, NULL, 101),
(102, 'selección de fútbol de liberia', 1936, NULL, 102),
(103, 'selección de fútbol de libia', 1962, NULL, 103),
(104, 'selección de fútbol de liechtenstein', 1934, NULL, 104),
(105, 'selección de fútbol de lituania', 1922, NULL, 105),
(106, 'selección de fútbol de luxemburgo', 1908, NULL, 106),
(107, NULL, NULL, NULL, 107),
(108, 'selección de fútbol de malasia', 1963, NULL, 108),
(109, 'selección de fútbol de moldavia', 1991, NULL, 118),
(110, NULL, NULL, NULL, 119),
(111, 'selección de fútbol de mongolia', 1959, NULL, 120),
(112, 'selección de fútbol de montenegro', 2006, NULL, 121),
(113, NULL, NULL, NULL, 122),
(114, 'selección de fútbol de namibia', 1990, NULL, 123),
(115, NULL, NULL, NULL, 124),
(116, NULL, NULL, NULL, 125),
(117, 'selección de fútbol de nicaragua', 1931, NULL, 126),
(118, 'selección de fútbol de níger', 1960, NULL, 127),
(119, 'selección de fútbol de nigeria', 1945, NULL, 128),
(120, 'selección de fútbol de noruega', 1908, NULL, 129),
(121, 'selección de fútbol de nueva zelanda', 1891, NULL, 130),
(122, 'selección de fútbol de omán', 1978, NULL, 131),
(123, 'selección de fútbol de los países bajos', 1904, NULL, 132),
(124, NULL, NULL, NULL, 133),
(125, NULL, NULL, NULL, 134),
(126, NULL, NULL, NULL, 135),
(127, 'selección de fútbol de panamá', 1937, NULL, 136),
(128, 'selección de fútbol de perú', 1927, NULL, 139),
(129, 'selección de fútbol de polonia', 1919, NULL, 140),
(130, 'selección de fútbol de portugal', 1914, NULL, 141),
(131, 'selección de fútbol de inglaterra (parte del reino unido)', 1872, NULL, 142),
(132, 'selección de fútbol de república centroafricana', 1961, NULL, 143),
(133, 'selección de fútbol de república checa', 1994, NULL, 144),
(134, 'selección de fútbol de república del congo (congo brazzaville)', 1962, NULL, NULL),
(135, 'selección de fútbol de república democrática del congo (congo kinshasa)', 1963, NULL, NULL),
(136, 'selección de fútbol de república dominicana', 1953, NULL, 145),
(137, 'selección de fútbol de ruanda', 1972, NULL, 146),
(138, 'selección de fútbol de rumania', 1909, NULL, 147),
(139, 'selección de fútbol de rusia', 1912, NULL, 148),
(140, NULL, NULL, NULL, 149),
(141, 'selección de fútbol de san cristóbal y nieves', 1932, NULL, 150),
(142, NULL, 1931, NULL, 151),
(143, NULL, NULL, NULL, 152),
(144, 'selección de fútbol de santo tomé y príncipe', 1975, NULL, 155),
(145, 'selección de fútbol de senegal', 1960, NULL, 156),
(146, 'selección de fútbol de serbia', 1919, NULL, 157),
(147, NULL, NULL, NULL, 158),
(148, 'selección de fútbol de sierra leona', 1960, NULL, 159),
(149, 'selección de fútbol de singapur', 1892, NULL, 160),
(150, 'selección de fútbol de siria', 1936, NULL, 161),
(151, NULL, 1939, NULL, 163),
(152, 'selección de fútbol de suazilandia', 1968, NULL, 164),
(153, 'selección de fútbol de sudáfrica', 1992, NULL, 165),
(154, 'selección de fútbol de sudán', 1936, NULL, 166),
(155, NULL, NULL, NULL, 167),
(156, 'selección de fútbol de suecia', 1904, NULL, 168),
(157, 'selección de fútbol de suiza', 1904, NULL, 169),
(158, 'selección de fútbol de surinam', 1920, NULL, 170),
(159, 'selección de fútbol de tailandia', 1916, NULL, 171),
(160, NULL, NULL, NULL, 172),
(161, 'selección de fútbol de tayikistán', 1936, NULL, 174),
(162, NULL, NULL, NULL, NULL),
(163, 'selección de fútbol de togo', 1960, NULL, 176),
(164, NULL, NULL, NULL, 177),
(165, 'selección de fútbol de trinidad y tobago', 1908, NULL, 178),
(166, 'selección de fútbol de túnez', 1956, NULL, 179),
(167, NULL, NULL, NULL, 180),
(168, 'selección de fútbol de turquía', 1923, NULL, 181),
(169, NULL, NULL, NULL, 182),
(170, 'selección de fútbol de ucrania', 1991, NULL, 183),
(171, 'selección de fútbol de uganda', 1924, NULL, 184),
(172, 'selección de fútbol de uruguay', 1900, NULL, 185),
(173, 'selección de fútbol de uzbekistán', 1992, NULL, 186),
(174, NULL, NULL, NULL, 187),
(175, 'selección de fútbol de venezuela', 1926, NULL, 188),
(176, 'selección de fútbol de vietnam', 1961, NULL, 189),
(177, 'selección de fútbol de yemen', 1962, NULL, 190),
(178, NULL, NULL, NULL, 191),
(179, 'selección de fútbol de zambia', 1929, NULL, 192),
(180, 'selección de fútbol de zimbabue', 1965, NULL, 193);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltemporadas`
--

CREATE TABLE `tbltemporadas` (
  `IdTemporada` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `FechaInicial` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbltemporadas`
--

INSERT INTO `tbltemporadas` (`IdTemporada`, `Nombre`, `FechaInicial`, `FechaFinal`, `FKIDLigas`, `FKIDClubes`) VALUES
(1, 'Premier League', '2023-08-14', '2024-05-22', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltrabajadores`
--

CREATE TABLE `tbltrabajadores` (
  `IdTrabajador` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Sueldo` decimal(10,2) DEFAULT NULL,
  `FKIDRoles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbltrabajadores`
--

INSERT INTO `tbltrabajadores` (`IdTrabajador`, `Nombre`, `CorreoElectronico`, `Area`, `Sueldo`, `FKIDRoles`) VALUES
(1, 'Erik Darney', 'Erick.hdz9628@gmail.com', 'Administrador', 2000000.00, 5),
(2, 'Juan Pablo', 'juanpabl1535@gmail.com', 'Administrador', 2000000.00, 5),
(3, 'Gabriel', 'gabrielchaparro@gmail.com', 'Administrador', 2000000.00, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `IdUsuario` int(11) NOT NULL,
  `FKIDRoles` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Documento` int(15) NOT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Contraseña` int(11) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `TokenRecuperacion` varchar(255) NOT NULL,
  `Verificado` tinyint(1) NOT NULL,
  `MembresiaInicio` date NOT NULL,
  `MembresiaFin` date NOT NULL,
  `Teléfono` varchar(20) DEFAULT NULL,
  `País` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Género` varchar(50) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblclubes`
--
ALTER TABLE `tblclubes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_PatrocinadorPrincipal` (`FKIdPatrocinadorPrincipal`),
  ADD KEY `FK_PatrocinadorUniforme` (`FKIdpatrocinadorUniforme`),
  ADD KEY `FK_PatrocinadorPecho` (`FKIdPatrocinadorPecho`),
  ADD KEY `FK_PatrocinadorManga` (`FKIdPatrocinadorManga`),
  ADD KEY `FK_PatrocinadorEspalda` (`FKIdPatrocinadorEspalda`),
  ADD KEY `FK_Club_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_Club_Nacionalidades` (`FKIDNacionalidades`),
  ADD KEY `FK_Club_Ligas` (`FKIDLigas`),
  ADD KEY `FK_Club_Fichajes` (`FKIDFichajes`),
  ADD KEY `FK_Club_Temporadas` (`FKIDTemporadas`),
  ADD KEY `FK_Club_Estadisticas` (`FKIDEstadisticas`),
  ADD KEY `FK_ClubPartido` (`FKIDPartido`);

--
-- Indices de la tabla `tblestadisticas`
--
ALTER TABLE `tblestadisticas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Estadisticas_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_Estadisticas_Club` (`FKIDClub`),
  ADD KEY `FK_Estadisticas_SeleccionesNacionales` (`FKIDSeleccionesNacionales`),
  ADD KEY `FK_EstadisticasPartido` (`FKIDPartido`);

--
-- Indices de la tabla `tblfichajes`
--
ALTER TABLE `tblfichajes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Fichajes_Temporada` (`FKIDTemporada`),
  ADD KEY `FK_Fichajes_Plantilla` (`FKIDPlantillas`),
  ADD KEY `FK_Fichajes_ClubAnterior` (`ClubAnterior`),
  ADD KEY `FK_Fichajes_ClubActual` (`ClubActual`);

--
-- Indices de la tabla `tblinvitados`
--
ALTER TABLE `tblinvitados`
  ADD PRIMARY KEY (`IdInvitado`),
  ADD KEY `FK_Invitados_Roles` (`FKIDRoles`);

--
-- Indices de la tabla `tblligas`
--
ALTER TABLE `tblligas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Ligas_Clubes` (`FKIDClubes`),
  ADD KEY `FK_Ligas_Nacionalidades` (`FKIDNacionalidades`),
  ADD KEY `FK_Ligas_Temporada` (`FKIDTemporada`),
  ADD KEY `FK_LigasPartidos` (`FKIDPartidos`);

--
-- Indices de la tabla `tblnacionalidades`
--
ALTER TABLE `tblnacionalidades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Nacionalidades_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_Nacionalidades_Ligas` (`FKIDLigas`),
  ADD KEY `FK_Nacionalidades_Clubes` (`FKIDClubes`);

--
-- Indices de la tabla `tblpartidos`
--
ALTER TABLE `tblpartidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Partidos_ClubLocal` (`ClubLocal`),
  ADD KEY `FK_Partidos_ClubVisitante` (`ClubVisitante`),
  ADD KEY `FK_Partidos_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_Partidos_Ligas` (`FKIDLigas`);

--
-- Indices de la tabla `tblpatrocinadores`
--
ALTER TABLE `tblpatrocinadores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Patrocinadores_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_Patrocinadores_Clubes` (`FKIDClubes`),
  ADD KEY `FK_Patrocinadores_SeleccionesNacionales` (`FKIDSeleccionesNacionales`),
  ADD KEY `FK_Patrocinadores_Temporadas` (`FKIDTemporadas`);

--
-- Indices de la tabla `tblplantillas`
--
ALTER TABLE `tblplantillas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Plantillas_Temporada` (`FKTemporada`),
  ADD KEY `FK_Plantillas_Ligas` (`FKIDLigas`),
  ADD KEY `FK_Plantillas_Clubes` (`FKIDClubes`),
  ADD KEY `FK_Plantillas_Nacionalidades` (`FKIDNacionalidades`),
  ADD KEY `FK_Plantillas_SeleccionNacional` (`FKIDSeleccionNacional`),
  ADD KEY `FK_Plantillas_Patrocinadores` (`FKIDPatrocinadores`),
  ADD KEY `FK_PlantillasPartidos` (`FKIDPartidos`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`IdRol`),
  ADD KEY `FK_Roles_Invitados` (`FKIDInvitados`),
  ADD KEY `FK_Roles_Usuarios` (`FKIDUsuarios`),
  ADD KEY `FK_Roles_Trabajadores` (`FKIDTrabajadores`);

--
-- Indices de la tabla `tblseleccionesnacionales`
--
ALTER TABLE `tblseleccionesnacionales`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_SeleccionesNacionales_Plantilla` (`FKIDPlantilla`),
  ADD KEY `FK_SeleccionesNacionales_Nacionalidades` (`FKIDNacionalidades`);

--
-- Indices de la tabla `tbltemporadas`
--
ALTER TABLE `tbltemporadas`
  ADD PRIMARY KEY (`IdTemporada`),
  ADD KEY `FK_Temporadas_Ligas` (`FKIDLigas`),
  ADD KEY `FK_Temporadas_Clubes` (`FKIDClubes`);

--
-- Indices de la tabla `tbltrabajadores`
--
ALTER TABLE `tbltrabajadores`
  ADD PRIMARY KEY (`IdTrabajador`),
  ADD KEY `FK_Trabajadores_Roles` (`FKIDRoles`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `FK_Usuarios_Roles` (`FKIDRoles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblclubes`
--
ALTER TABLE `tblclubes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tblestadisticas`
--
ALTER TABLE `tblestadisticas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfichajes`
--
ALTER TABLE `tblfichajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinvitados`
--
ALTER TABLE `tblinvitados`
  MODIFY `IdInvitado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblligas`
--
ALTER TABLE `tblligas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblnacionalidades`
--
ALTER TABLE `tblnacionalidades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT de la tabla `tblpartidos`
--
ALTER TABLE `tblpartidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpatrocinadores`
--
ALTER TABLE `tblpatrocinadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tblplantillas`
--
ALTER TABLE `tblplantillas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblseleccionesnacionales`
--
ALTER TABLE `tblseleccionesnacionales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `tbltemporadas`
--
ALTER TABLE `tbltemporadas`
  MODIFY `IdTemporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbltrabajadores`
--
ALTER TABLE `tbltrabajadores`
  MODIFY `IdTrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblclubes`
--
ALTER TABLE `tblclubes`
  ADD CONSTRAINT `FK_ClubPartido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Club_Estadisticas` FOREIGN KEY (`FKIDEstadisticas`) REFERENCES `tblestadisticas` (`ID`),
  ADD CONSTRAINT `FK_Club_Fichajes` FOREIGN KEY (`FKIDFichajes`) REFERENCES `tblfichajes` (`ID`),
  ADD CONSTRAINT `FK_Club_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  ADD CONSTRAINT `FK_Club_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  ADD CONSTRAINT `FK_Club_Partido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Club_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  ADD CONSTRAINT `FK_Club_Temporadas` FOREIGN KEY (`FKIDTemporadas`) REFERENCES `tbltemporadas` (`IdTemporada`),
  ADD CONSTRAINT `FK_PatrocinadorEspalda` FOREIGN KEY (`FKIdPatrocinadorEspalda`) REFERENCES `tblpatrocinadores` (`ID`),
  ADD CONSTRAINT `FK_PatrocinadorManga` FOREIGN KEY (`FKIdPatrocinadorManga`) REFERENCES `tblpatrocinadores` (`ID`),
  ADD CONSTRAINT `FK_PatrocinadorPecho` FOREIGN KEY (`FKIdPatrocinadorPecho`) REFERENCES `tblpatrocinadores` (`ID`),
  ADD CONSTRAINT `FK_PatrocinadorPrincipal` FOREIGN KEY (`FKIdPatrocinadorPrincipal`) REFERENCES `tblpatrocinadores` (`ID`),
  ADD CONSTRAINT `FK_PatrocinadorUniforme` FOREIGN KEY (`FKIdpatrocinadorUniforme`) REFERENCES `tblpatrocinadores` (`ID`);

--
-- Filtros para la tabla `tblestadisticas`
--
ALTER TABLE `tblestadisticas`
  ADD CONSTRAINT `FK_EstadisticasPartido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Estadisticas_Club` FOREIGN KEY (`FKIDClub`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Estadisticas_Partido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Estadisticas_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  ADD CONSTRAINT `FK_Estadisticas_SeleccionesNacionales` FOREIGN KEY (`FKIDSeleccionesNacionales`) REFERENCES `tblseleccionesnacionales` (`ID`);

--
-- Filtros para la tabla `tblfichajes`
--
ALTER TABLE `tblfichajes`
  ADD CONSTRAINT `FK_Fichajes_ClubActual` FOREIGN KEY (`ClubActual`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Fichajes_ClubAnterior` FOREIGN KEY (`ClubAnterior`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Fichajes_Plantilla` FOREIGN KEY (`FKIDPlantillas`) REFERENCES `tblplantillas` (`ID`),
  ADD CONSTRAINT `FK_Fichajes_Temporada` FOREIGN KEY (`FKIDTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`);

--
-- Filtros para la tabla `tblinvitados`
--
ALTER TABLE `tblinvitados`
  ADD CONSTRAINT `FK_Invitados_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`);

--
-- Filtros para la tabla `tblligas`
--
ALTER TABLE `tblligas`
  ADD CONSTRAINT `FK_LigasPartidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Ligas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Ligas_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  ADD CONSTRAINT `FK_Ligas_Partidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Ligas_Temporada` FOREIGN KEY (`FKIDTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`);

--
-- Filtros para la tabla `tblnacionalidades`
--
ALTER TABLE `tblnacionalidades`
  ADD CONSTRAINT `FK_Nacionalidades_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Nacionalidades_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  ADD CONSTRAINT `FK_Nacionalidades_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`);

--
-- Filtros para la tabla `tblpartidos`
--
ALTER TABLE `tblpartidos`
  ADD CONSTRAINT `FK_Partidos_ClubLocal` FOREIGN KEY (`ClubLocal`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Partidos_ClubVisitante` FOREIGN KEY (`ClubVisitante`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Partidos_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  ADD CONSTRAINT `FK_Partidos_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`);

--
-- Filtros para la tabla `tblpatrocinadores`
--
ALTER TABLE `tblpatrocinadores`
  ADD CONSTRAINT `FK_Patrocinadores_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Patrocinadores_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  ADD CONSTRAINT `FK_Patrocinadores_SeleccionesNacionales` FOREIGN KEY (`FKIDSeleccionesNacionales`) REFERENCES `tblseleccionesnacionales` (`ID`),
  ADD CONSTRAINT `FK_Patrocinadores_Temporadas` FOREIGN KEY (`FKIDTemporadas`) REFERENCES `tbltemporadas` (`IdTemporada`);

--
-- Filtros para la tabla `tblplantillas`
--
ALTER TABLE `tblplantillas`
  ADD CONSTRAINT `FK_PlantillasPartidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Partidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Patrocinadores` FOREIGN KEY (`FKIDPatrocinadores`) REFERENCES `tblpatrocinadores` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_SeleccionNacional` FOREIGN KEY (`FKIDSeleccionNacional`) REFERENCES `tblseleccionesnacionales` (`ID`),
  ADD CONSTRAINT `FK_Plantillas_Temporada` FOREIGN KEY (`FKTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`);

--
-- Filtros para la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD CONSTRAINT `FK_Roles_Invitados` FOREIGN KEY (`FKIDInvitados`) REFERENCES `tblinvitados` (`IdInvitado`),
  ADD CONSTRAINT `FK_Roles_Trabajadores` FOREIGN KEY (`FKIDTrabajadores`) REFERENCES `tbltrabajadores` (`IdTrabajador`),
  ADD CONSTRAINT `FK_Roles_Usuarios` FOREIGN KEY (`FKIDUsuarios`) REFERENCES `tblusuarios` (`IdUsuario`);

--
-- Filtros para la tabla `tblseleccionesnacionales`
--
ALTER TABLE `tblseleccionesnacionales`
  ADD CONSTRAINT `FK_SeleccionesNacionales_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  ADD CONSTRAINT `FK_SeleccionesNacionales_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`);

--
-- Filtros para la tabla `tbltemporadas`
--
ALTER TABLE `tbltemporadas`
  ADD CONSTRAINT `FK_Temporadas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  ADD CONSTRAINT `FK_Temporadas_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`);

--
-- Filtros para la tabla `tbltrabajadores`
--
ALTER TABLE `tbltrabajadores`
  ADD CONSTRAINT `FK_Trabajadores_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`);

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `FK_Usuarios_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
