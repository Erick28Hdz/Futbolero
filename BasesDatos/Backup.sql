
CREATE TABLE `tblclubes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `FKIDEstadisticas` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PatrocinadorPrincipal` (`FKIdPatrocinadorPrincipal`),
  KEY `FK_PatrocinadorUniforme` (`FKIdpatrocinadorUniforme`),
  KEY `FK_PatrocinadorPecho` (`FKIdPatrocinadorPecho`),
  KEY `FK_PatrocinadorManga` (`FKIdPatrocinadorManga`),
  KEY `FK_PatrocinadorEspalda` (`FKIdPatrocinadorEspalda`),
  KEY `FK_Club_Plantilla` (`FKIDPlantilla`),
  KEY `FK_Club_Nacionalidades` (`FKIDNacionalidades`),
  KEY `FK_Club_Ligas` (`FKIDLigas`),
  KEY `FK_Club_Fichajes` (`FKIDFichajes`),
  KEY `FK_Club_Temporadas` (`FKIDTemporadas`),
  KEY `FK_Club_Estadisticas` (`FKIDEstadisticas`),
  KEY `FK_ClubPartido` (`FKIDPartido`),
  CONSTRAINT `FK_ClubPartido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Club_Estadisticas` FOREIGN KEY (`FKIDEstadisticas`) REFERENCES `tblestadisticas` (`ID`),
  CONSTRAINT `FK_Club_Fichajes` FOREIGN KEY (`FKIDFichajes`) REFERENCES `tblfichajes` (`ID`),
  CONSTRAINT `FK_Club_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  CONSTRAINT `FK_Club_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  CONSTRAINT `FK_Club_Partido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Club_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  CONSTRAINT `FK_Club_Temporadas` FOREIGN KEY (`FKIDTemporadas`) REFERENCES `tbltemporadas` (`IdTemporada`),
  CONSTRAINT `FK_PatrocinadorEspalda` FOREIGN KEY (`FKIdPatrocinadorEspalda`) REFERENCES `tblpatrocinadores` (`ID`),
  CONSTRAINT `FK_PatrocinadorManga` FOREIGN KEY (`FKIdPatrocinadorManga`) REFERENCES `tblpatrocinadores` (`ID`),
  CONSTRAINT `FK_PatrocinadorPecho` FOREIGN KEY (`FKIdPatrocinadorPecho`) REFERENCES `tblpatrocinadores` (`ID`),
  CONSTRAINT `FK_PatrocinadorPrincipal` FOREIGN KEY (`FKIdPatrocinadorPrincipal`) REFERENCES `tblpatrocinadores` (`ID`),
  CONSTRAINT `FK_PatrocinadorUniforme` FOREIGN KEY (`FKIdpatrocinadorUniforme`) REFERENCES `tblpatrocinadores` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('1', 'Arsenal', 'Londres', '', 'Emirates Stadium', '60704', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('2', 'Aston Villa', 'Birmingham', '', 'Villa Park', '42657', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('3', 'Bournemouth', 'Bournemouth', '', 'Vitality Stadium', '11307', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('4', 'Brentford', 'Londres', '', 'Gtech Community Stadium', '17250', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('5', 'Brighton & Hove Albion', 'Brighton & Hove', '', 'Amex Stadium', '31800', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('6', 'Burnley', 'Burnley', '', 'Turf Moor', '21944', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('7', 'Chelsea', 'Londres', '', 'Stamford Bridge', '40343', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('8', 'Crystal Palace', 'Londres', '', 'Selhurst Park', '25486', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('9', 'Everton', 'Liverpool', '', 'Goodison Park', '39414', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('10', 'Fulham', 'Londres', '', 'Craven Cottage', '22384', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('11', 'Liverpool', 'Liverpool', '', 'Anfield', '53394', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('12', 'Luton Town', 'Luton', '', 'Kenilworth Road', '10356', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('13', 'Manchester City', 'Mánchester', '', 'Etihad Stadium', '53400', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('14', 'Manchester United', 'Mánchester', '', 'Old Trafford', '74310', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('15', 'Newcastle United', 'Newcastle', '', 'St James' Park', '52305', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('16', 'Nottingham Forest', 'Nottingham', '', 'City Ground', '30332', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('17', 'Sheffield United', 'Sheffield', '', 'Bramall Lane', '32050', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('18', 'Tottenham Hotspur', 'Londres', '', 'Tottenham Hotspur Stadium', '62850', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('19', 'West Ham United', 'Londres', '', 'London Stadium', '62500', '', '', '', '', '', '', '', '1', '', '', '', '');
INSERT INTO tblclubes (ID, Nombre, Ciudad, Direccion, Estadio, Capacidad, FKIdPatrocinadorPrincipal, FKIdpatrocinadorUniforme, FKIdPatrocinadorPecho, FKIdPatrocinadorManga, FKIdPatrocinadorEspalda, FKIDPlantilla, FKIDNacionalidades, FKIDLigas, FKIDFichajes, FKIDTemporadas, FKIDPartido, FKIDEstadisticas) VALUES ('20', 'Wolverhampton Wanderers', 'Wolverhampton', '', 'Molineux Stadium', '31750', '', '', '', '', '', '', '', '1', '', '', '', '');

CREATE TABLE `tblestadisticas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `FKIDSeleccionesNacionales` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Estadisticas_Plantilla` (`FKIDPlantilla`),
  KEY `FK_Estadisticas_Club` (`FKIDClub`),
  KEY `FK_Estadisticas_SeleccionesNacionales` (`FKIDSeleccionesNacionales`),
  KEY `FK_EstadisticasPartido` (`FKIDPartido`),
  CONSTRAINT `FK_EstadisticasPartido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Estadisticas_Club` FOREIGN KEY (`FKIDClub`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Estadisticas_Partido` FOREIGN KEY (`FKIDPartido`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Estadisticas_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  CONSTRAINT `FK_Estadisticas_SeleccionesNacionales` FOREIGN KEY (`FKIDSeleccionesNacionales`) REFERENCES `tblseleccionesnacionales` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tblfichajes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TipoFichaje` varchar(50) DEFAULT NULL,
  `ClubAnterior` int(11) DEFAULT NULL,
  `ClubActual` int(11) DEFAULT NULL,
  `CostoFichaje` decimal(10,2) DEFAULT NULL,
  `FKIDTemporada` int(11) DEFAULT NULL,
  `FKIDPlantillas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Fichajes_Temporada` (`FKIDTemporada`),
  KEY `FK_Fichajes_Plantilla` (`FKIDPlantillas`),
  KEY `FK_Fichajes_ClubAnterior` (`ClubAnterior`),
  KEY `FK_Fichajes_ClubActual` (`ClubActual`),
  CONSTRAINT `FK_Fichajes_ClubActual` FOREIGN KEY (`ClubActual`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Fichajes_ClubAnterior` FOREIGN KEY (`ClubAnterior`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Fichajes_Plantilla` FOREIGN KEY (`FKIDPlantillas`) REFERENCES `tblplantillas` (`ID`),
  CONSTRAINT `FK_Fichajes_Temporada` FOREIGN KEY (`FKIDTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tblinvitados` (
  `IdInvitado` int(11) NOT NULL AUTO_INCREMENT,
  `Género` varchar(50) DEFAULT NULL,
  `País` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `FKIDRoles` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdInvitado`),
  KEY `FK_Invitados_Roles` (`FKIDRoles`),
  CONSTRAINT `FK_Invitados_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('1', 'Masculino', 'España', 'Madrid', '28', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('2', 'Femenino', 'Estados Unidos', 'Nueva York', '34', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('3', 'Masculino', 'Francia', 'París', '22', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('4', 'Femenino', 'Canadá', 'Toronto', '30', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('5', 'Masculino', 'Alemania', 'Berlín', '25', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('6', 'Femenino', 'Reino Unido', 'Londres', '29', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('7', 'Masculino', 'Italia', 'Roma', '27', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('8', 'Femenino', 'Australia', 'Sídney', '32', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('9', 'Masculino', 'Brasil', 'Río de Janeiro', '31', '1');
INSERT INTO tblinvitados (IdInvitado, Género, País, Ciudad, Edad, FKIDRoles) VALUES ('10', 'Femenino', 'México', 'Ciudad de México', '26', '1');

CREATE TABLE `tblligas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `NumeroEquipos` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL,
  `FKIDTemporada` int(11) DEFAULT NULL,
  `FKIDPartidos` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Ligas_Clubes` (`FKIDClubes`),
  KEY `FK_Ligas_Nacionalidades` (`FKIDNacionalidades`),
  KEY `FK_Ligas_Temporada` (`FKIDTemporada`),
  KEY `FK_LigasPartidos` (`FKIDPartidos`),
  CONSTRAINT `FK_LigasPartidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Ligas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Ligas_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  CONSTRAINT `FK_Ligas_Partidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Ligas_Temporada` FOREIGN KEY (`FKIDTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('1', 'Premier League', '20', '', '142', '', '');
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('2', 'EFL Championship', '24', '', '142', '', '');
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('3', 'EFL League One', '24', '', '142', '', '');
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('4', 'EFL League Two', '24', '', '142', '', '');
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('5', 'National League', '24', '', '142', '', '');
INSERT INTO tblligas (ID, Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES ('6', 'National League North', '24', '', '142', '', '');

CREATE TABLE `tblnacionalidades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(255) DEFAULT NULL,
  `Capital` varchar(255) DEFAULT NULL,
  `Idiomas` varchar(255) DEFAULT NULL,
  `Continente` varchar(255) DEFAULT NULL,
  `Monedas` varchar(255) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Nacionalidades_Plantilla` (`FKIDPlantilla`),
  KEY `FK_Nacionalidades_Ligas` (`FKIDLigas`),
  KEY `FK_Nacionalidades_Clubes` (`FKIDClubes`),
  CONSTRAINT `FK_Nacionalidades_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Nacionalidades_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  CONSTRAINT `FK_Nacionalidades_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('1', 'Afganistán', 'Kabul', 'Pastún y Dari (persa)', 'Asia', 'Afgani afgano (AFN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('2', 'Albania', 'Tirana', 'Albanés', 'Europa', 'Lek albanés (ALL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('3', 'Alemania', 'Berlín', 'Alemán', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('4', 'Andorra', 'Andorra la Vella', 'Catalán', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('5', 'Angola', 'Luanda', 'Portugués', 'África', 'Kwanza angoleño (AOA)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('6', 'Arabia Saudita', 'Riad', 'Árabe', 'Asia', 'Riyal saudí (SAR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('7', 'Argelia', 'Argel', 'Árabe', 'África', 'Dinar argelino (DZD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('8', 'Argentina', 'Buenos Aires', 'Español', 'América del Sur', 'Peso argentino (ARS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('9', 'Armenia', 'Ereván', 'Armenio', 'Asia', 'Dram armenio (AMD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('10', 'Australia', 'Canberra', 'Inglés', 'Oceanía', 'Dólar australiano (AUD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('11', 'Austria', 'Viena', 'Alemán', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('12', 'Azerbaiyán', 'Bakú', 'Azerbaiyano', 'Asia', 'Manat azerbaiyano (AZN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('13', 'Bahréin', 'Manama', 'Árabe', 'Asia', 'Dinar bahreiní (BHD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('14', 'Bangladesh', 'Daca', 'Bengalí', 'Asia', 'Taka bangladesí (BDT)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('15', 'Barbados', 'Bridgetown', 'Inglés', 'América del Norte', 'Dólar de Barbados (BBD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('16', 'Bélgica', 'Bruselas', 'Neerlandés, Francés, Alemán', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('17', 'Belice', 'Belmopán', 'Inglés', 'América Central', 'Dólar beliceño (BZD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('18', 'Benín', 'Porto Novo', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('19', 'Bielorrusia', 'Minsk', 'Bielorruso, Ruso', 'Europa', 'Rublo bielorruso (BYN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('20', 'Birmania (Myanmar)', 'Naypyidaw', 'Birmano', 'Asia', 'Kyat birmano (MMK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('21', 'Bolivia', 'Sucre / La Paz', 'Español, Quechua', 'América del Sur', 'Boliviano (BOB)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('22', 'Bosnia y Herzegovina', 'Sarajevo', 'Bosnio, Croata, Serbio', 'Europa', 'Marco convertible (BAM)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('23', 'Botsuana', 'Gaborone', 'Setsuana, Inglés', 'África', 'Pula botsuano (BWP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('24', 'Brasil', 'Brasilia', 'Portugués', 'América del Sur', 'Real brasileño (BRL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('25', 'Brunei', 'Bandar Seri Begawan', 'Malayo', 'Asia', 'Dólar de Brunéi (BND)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('26', 'Bulgaria', 'Sofía', 'Búlgaro', 'Europa', 'Lev búlgaro (BGN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('27', 'Burkina Faso', 'Uagadugú', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('28', 'Burundi', 'Buyumbura', 'Kirundi, Francés', 'África', 'Franco burundés (BIF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('29', 'Bután', 'Thimphu', 'Dzongkha', 'Asia', 'Ngultrum butanés (BTN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('30', 'Cabo Verde', 'Praia', 'Portugués', 'África', 'Escudo caboverdiano (CVE)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('31', 'Camboya', 'Nom Pen', 'Jemer', 'Asia', 'Riel camboyano (KHR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('32', 'Camerún', 'Yaundé', 'Francés, Inglés', 'África', 'Franco CFA de África Central (XAF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('33', 'Canadá', 'Ottawa', 'Inglés, Francés', 'América del Norte', 'Dólar canadiense (CAD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('34', 'Catar', 'Doha', 'Árabe', 'Asia', 'Riyal catarí (QAR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('35', 'Chad', 'Yamena', 'Árabe, Francés', 'África', 'Franco CFA de África Central (XAF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('36', 'Chile', 'Santiago', 'Español', 'América del Sur', 'Peso chileno (CLP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('37', 'China', 'Pekín', 'Mandarín', 'Asia', 'Yuan chino (CNY)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('38', 'Chipre', 'Nicosia', 'Griego, Turco', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('39', 'Ciudad del Vaticano', 'Ciudad del Vaticano', 'Italiano, Latín', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('40', 'Colombia', 'Bogotá', 'Español', 'América del Sur', 'Peso colombiano (COP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('41', 'Comoras', 'Moroni', 'Árabe, Francés', 'África', 'Franco comorense (KMF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('42', 'Corea del Norte', 'Pionyang', 'Coreano', 'Asia', 'Won norcoreano (KPW)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('43', 'Corea del Sur', 'Seúl', 'Coreano', 'Asia', 'Won surcoreano (KRW)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('44', 'Costa de Marfil', 'Yamusukro / Abiyán', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('45', 'Costa Rica', 'San José', 'Español', 'América Central', 'Colón costarricense (CRC)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('46', 'Croacia', 'Zagreb', 'Croata', 'Europa', 'Kuna croata (HRK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('47', 'Cuba', 'La Habana', 'Español', 'América del Norte', 'Peso cubano (CUP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('48', 'Dinamarca', 'Copenhague', 'Danés', 'Europa', 'Corona danesa (DKK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('49', 'Dominica', 'Roseau', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('50', 'Ecuador', 'Quito', 'Español', 'América del Sur', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('51', 'Egipto', 'El Cairo', 'Árabe', 'África', 'Libra egipcia (EGP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('52', 'El Salvador', 'San Salvador', 'Español', 'América Central', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('53', 'Emiratos Árabes Unidos', 'Abu Dabi', 'Árabe', 'Asia', 'Dirham de los Emiratos Árabes Unidos (AED)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('54', 'Eritrea', 'Asmara', 'Tigrigna, Árabe', 'África', 'Nakfa eritreo (ERN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('55', 'Eslovaquia', 'Bratislava', 'Eslovaco', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('56', 'Eslovenia', 'Liubliana', 'Esloveno', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('57', 'España', 'Madrid', 'Español', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('58', 'Estados Unidos', 'Washington, D.C.', 'Inglés', 'América del Norte', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('59', 'Estonia', 'Tallin', 'Estonio', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('60', 'Etiopía', 'Adís Abeba', 'Amarigna, Oromigna, Tigrigna', 'África', 'Birr etíope (ETB)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('61', 'Filipinas', 'Manila', 'Filipino, Inglés', 'Asia', 'Peso filipino (PHP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('62', 'Finlandia', 'Helsinki', 'Finés, Sueco', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('63', 'Fiyi', 'Suva', 'Fiyiano, Inglés', 'Oceanía', 'Dólar fiyiano (FJD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('64', 'Francia', 'París', 'Francés', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('65', 'Gabón', 'Libreville', 'Francés', 'África', 'Franco CFA de África Central (XAF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('66', 'Gambia', 'Banjul', 'Inglés', 'África', 'Dalasi gambiano (GMD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('67', 'Georgia', 'Tiflis', 'Georgiano', 'Asia', 'Lari georgiano (GEL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('68', 'Ghana', 'Acra', 'Inglés, Akan', 'África', 'Cedi ghanés (GHS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('69', 'Granada', 'Saint George's', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('70', 'Grecia', 'Atenas', 'Griego', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('71', 'Guatemala', 'Ciudad de Guatemala', 'Español', 'América Central', 'Quetzal guatemalteco (GTQ)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('72', 'Guinea', 'Conakri', 'Francés', 'África', 'Franco guineano (GNF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('73', 'Guinea Ecuatorial', 'Malabo / Bata', 'Español, Francés', 'África', 'Franco CFA de África Central (XAF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('74', 'Guinea-Bisáu', 'Bissau', 'Portugués', 'África', 'Franco guineano (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('75', 'Guyana', 'Georgetown', 'Inglés', 'América del Sur', 'Dólar guyanés (GYD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('76', 'Haití', 'Puerto Príncipe', 'Francés, Creole', 'América del Norte', 'Gourde haitiano (HTG)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('77', 'Honduras', 'Tegucigalpa', 'Español', 'América Central', 'Lempira hondureño (HNL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('78', 'Hungría', 'Budapest', 'Húngaro', 'Europa', 'Forinto húngaro (HUF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('79', 'India', 'Nueva Delhi', 'Hindi, Inglés', 'Asia', 'Rupia india (INR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('80', 'Indonesia', 'Yakarta', 'Indonesio', 'Asia', 'Rupia indonesia (IDR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('81', 'Irak', 'Bagdad', 'Árabe', 'Asia', 'Dinar iraquí (IQD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('82', 'Irán', 'Teherán', 'Persa', 'Asia', 'Rial iraní (IRR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('83', 'Irlanda', 'Dublín', 'Inglés, Irlandés', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('84', 'Islandia', 'Reikiavik', 'Islandés', 'Europa', 'Corona islandesa (ISK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('85', 'Islas Cook', 'Avarua', 'Cookiano, Maorí, Inglés', 'Oceanía', 'Dólar neozelandés (NZD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('86', 'Islas Marshall', 'Majuro', 'Marshallese, Inglés', 'Oceanía', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('87', 'Islas Salomón', 'Honiara', 'Pijin, Inglés', 'Oceanía', 'Dólar de las Islas Salomón (SBD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('88', 'Israel', 'Jerusalén (No reconocida internacionalmente)', 'Hebreo', 'Asia', 'Nuevo séquel israelí (ILS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('89', 'Italia', 'Roma', 'Italiano', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('90', 'Jamaica', 'Kingston', 'Inglés', 'América del Norte', 'Dólar jamaiquino (JMD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('91', 'Japón', 'Tokio', 'Japonés', 'Asia', 'Yen japonés (JPY)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('92', 'Jordania', 'Amán', 'Árabe', 'Asia', 'Dinar jordano (JOD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('93', 'Kazajistán', 'Nursultán (anteriormente Astaná)', 'Kazajo, Ruso', 'Asia', 'Tenge kazajo (KZT)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('94', 'Kenia', 'Nairobi', 'Suajili, Inglés', 'África', 'Chelín keniano (KES)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('95', 'Kirguistán', 'Biskek', 'Kirguís, Ruso', 'Asia', 'Som kirguís (KGS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('96', 'Kiribati', 'Tarawa', 'Kiribati, Inglés', 'Oceanía', 'Dólar australiano (AUD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('97', 'Kuwait', 'Kuwait', 'Árabe', 'Asia', 'Dinar kuwaití (KWD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('98', 'Laos', 'Vientián', 'Lao', 'Asia', 'Kip laosiano (LAK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('99', 'Lesoto', 'Maseru', 'Sesotho, Inglés', 'África', 'Loti lesothense (LSL), Rand sudafricano (ZAR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('100', 'Letonia', 'Riga', 'Letón', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('101', 'Líbano', 'Beirut', 'Árabe', 'Asia', 'Libra libanesa (LBP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('102', 'Liberia', 'Monrovia', 'Inglés', 'África', 'Dólar liberiano (LRD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('103', 'Libia', 'Trípoli', 'Árabe', 'África', 'Dinar libio (LYD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('104', 'Liechtenstein', 'Vaduz', 'Alemán', 'Europa', 'Franco suizo (CHF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('105', 'Lituania', 'Vilna', 'Lituano', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('106', 'Luxemburgo', 'Luxemburgo', 'Luxemburgués, Francés, Alemán', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('107', 'Madagascar', 'Antananarivo', 'Malgache, Francés', 'África', 'Ariary malgache (MGA)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('108', 'Malasia', 'Kuala Lumpur', 'Malayo', 'Asia', 'Ringgit malayo (MYR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('109', 'Malawi', 'Lilongüe', 'Chewa, Inglés', 'África', 'Kwacha malauí (MWK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('110', 'Maldivas', 'Malé', 'Dhivehi', 'Asia', 'Rufiyaa maldiva (MVR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('111', 'Malí', 'Bamako', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('112', 'Malta', 'La Valeta', 'Maltés, Inglés', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('113', 'Marruecos', 'Rabat', 'Árabe, Tamazight', 'África', 'Dirham marroquí (MAD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('114', 'Mauricio', 'Port Louis', 'Inglés, Francés', 'África', 'Rupia mauriciana (MUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('115', 'Mauritania', 'Nuakchot', 'Árabe, Francés', 'África', 'Uguiya mauritano (MRU)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('116', 'México', 'Ciudad de México', 'Español', 'América del Norte', 'Peso mexicano (MXN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('117', 'Micronesia', 'Palikir', 'Inglés', 'Oceanía', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('118', 'Moldavia', 'Chisináu', 'Rumano', 'Europa', 'Leu moldavo (MDL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('119', 'Mónaco', 'Mónaco', 'Francés', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('120', 'Mongolia', 'Ulán Bator', 'Mongol', 'Asia', 'Tugrik mongol (MNT)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('121', 'Montenegro', 'Podgorica', 'Montenegrino, Serbio', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('122', 'Mozambique', 'Maputo', 'Portugués', 'África', 'Metical mozambiqueño (MZN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('123', 'Namibia', 'Windhoek', 'Inglés, Afrikáans', 'África', 'Dólar namibio (NAD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('124', 'Nauru', 'Yaren', 'Nauruano, Inglés', 'Oceanía', 'Dólar australiano (AUD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('125', 'Nepal', 'Katmandú', 'Nepalí', 'Asia', 'Rupia nepalesa (NPR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('126', 'Nicaragua', 'Managua', 'Español', 'América Central', 'Córdoba nicaragüense (NIO)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('127', 'Níger', 'Niamey', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('128', 'Nigeria', 'Abuya', 'Inglés', 'África', 'Naira nigeriano (NGN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('129', 'Noruega', 'Oslo', 'Noruego, Sami', 'Europa', 'Corona noruega (NOK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('130', 'Nueva Zelanda', 'Wellington', 'Inglés, Maorí', 'Oceanía', 'Dólar neozelandés (NZD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('131', 'Omán', 'Mascate', 'Árabe', 'Asia', 'Rial omaní (OMR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('132', 'Países Bajos (Holanda)', 'Ámsterdam', 'Neerlandés', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('133', 'Pakistán', 'Islamabad', 'Urdu, Inglés', 'Asia', 'Rupia pakistaní (PKR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('134', 'Palaos', 'Melekeok', 'Palauano, Inglés', 'Oceanía', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('135', 'Palestina (Territorios Palestinos Ocupados)', 'Ramala (Administrativa)', 'Árabe', 'Asia', 'Nuevo séquel palestino (ILS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('136', 'Panamá', 'Ciudad de Panamá', 'Español', 'América Central', 'Balboa panameño (PAB)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('137', 'Papúa Nueva Guinea', 'Puerto Moresby', 'Inglés', 'Oceanía', 'Kina papú (PGK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('138', 'Paraguay', 'Asunción', 'Español, Guaraní', 'América del Sur', 'Guaraní paraguayo (PYG)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('139', 'Perú', 'Lima', 'Español', 'América del Sur', 'Sol peruano (PEN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('140', 'Polonia', 'Varsovia', 'Polaco', 'Europa', 'Zloty polaco (PLN)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('141', 'Portugal', 'Lisboa', 'Portugués', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('142', 'Reino Unido', 'Londres', 'Inglés, Galés, Escocés, Irlandés', 'Europa', 'Libra esterlina (GBP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('143', 'República Centroafricana', 'Bangui', 'Francés, Sangro', 'África', 'Franco CFA de África Central (XAF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('144', 'República Checa', 'Praga', 'Checo', 'Europa', 'Corona checa (CZK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('145', 'República Dominicana', 'Santo Domingo', 'Español', 'América del Norte', 'Peso dominicano (DOP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('146', 'Ruanda', 'Kigali', 'Kinyarwanda, Francés, Inglés', 'África', 'Franco ruandés (RWF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('147', 'Rumania', 'Bucarest', 'Rumano', 'Europa', 'Leu rumano (RON)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('148', 'Rusia', 'Moscú', 'Ruso', 'Europa / Asia', 'Rublo ruso (RUB)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('149', 'Samoa', 'Apia', 'Samoano, Inglés', 'Oceanía', 'Tala samoano (WST)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('150', 'San Cristóbal y Nieves', 'Basseterre', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('151', 'San Marino', 'San Marino', 'Italiano', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('152', 'Santa Lucía', 'Castries', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('153', 'San Vicente y las Granadinas', 'Kingstown', 'Inglés', 'América del Norte', 'Dólar del Caribe Oriental (XCD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('154', 'Santa Sede (Ciudad del Vaticano)', 'Ciudad del Vaticano', 'Latín, Italiano', 'Europa', 'Euro (EUR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('155', 'Santo Tomé y Príncipe', 'Santo Tomé', 'Portugués', 'África', 'Dobra santotomense (STD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('156', 'Senegal', 'Dakar', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('157', 'Serbia', 'Belgrado', 'Serbio', 'Europa', 'Dinar serbio (RSD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('158', 'Seychelles', 'Victoria', 'Seychellense, Francés, Inglés', 'África', 'Rupia seychellense (SCR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('159', 'Sierra Leona', 'Freetown', 'Inglés', 'África', 'Leone sierraleonés (SLL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('160', 'Singapur', 'Singapur', 'Malayo, Mandarín, Tamil, Inglés', 'Asia', 'Dólar de Singapur (SGD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('161', 'Siria', 'Damasco', 'Árabe', 'Asia', 'Libra siria (SYP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('162', 'Somalia', 'Mogadiscio', 'Somalí, Árabe', 'África', 'Chelín somalí (SOS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('163', 'Sri Lanka', 'Colombo', 'Singalés, Tamil', 'Asia', 'Rupia de Sri Lanka (LKR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('164', 'Suazilandia', 'Lobamba', 'Suazi, Inglés', 'África', 'Lilangeni suazi (SZL)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('165', 'Sudáfrica', 'Bloemfontein, Ciudad del Cabo, Pretoria', 'Afrikáans, Inglés, Suazi', 'África', 'Rand sudafricano (ZAR)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('166', 'Sudán', 'Jartum', 'Árabe', 'África', 'Libra sudanesa (SDG)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('167', 'Sudán del Sur', 'Yuba', 'Inglés, Árabe', 'África', 'Libra sursudanesa (SSP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('168', 'Suecia', 'Estocolmo', 'Sueco', 'Europa', 'Corona sueca (SEK)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('169', 'Suiza', 'Berna', 'Alemán, Francés, Italiano, Romanche', 'Europa', 'Franco suizo (CHF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('170', 'Surinam', 'Paramaribo', 'Neerlandés', 'América del Sur', 'Dólar surinamés (SRD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('171', 'Tailandia', 'Bangkok', 'Tailandés', 'Asia', 'Baht tailandés (THB)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('172', 'Taiwán', 'Taipéi', 'Chino (mandarín)', 'Asia', 'Nuevo dólar taiwanés (TWD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('173', 'Tanzania', 'Dodoma', 'Suajili, Inglés', 'África', 'Chelín tanzano (TZS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('174', 'Tayikistán', 'Dusambé', 'Tayiko', 'Asia', 'Somoni tayiko (TJS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('175', 'Timor-Leste', 'Dili', 'Tetun, Portugués', 'Asia', 'Dólar estadounidense (USD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('176', 'Togo', 'Lomé', 'Francés', 'África', 'Franco CFA de África Occidental (XOF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('177', 'Tonga', 'Nukualofa', 'Tongano, Inglés', 'Oceanía', 'Paʻanga tongano (TOP)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('178', 'Trinidad y Tobago', 'Puerto España', 'Inglés', 'América del Norte', 'Dólar de Trinidad y Tobago (TTD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('179', 'Túnez', 'Túnez', 'Árabe', 'África', 'Dinar tunecino (TND)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('180', 'Turkmenistán', 'Asgabat', 'Turcomano', 'Asia', 'Manat turcomano (TMT)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('181', 'Turquía', 'Ankara', 'Turco', 'Asia / Europa', 'Lira turca (TRY)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('182', 'Tuvalu', 'Funafuti', 'Tuvaluano, Inglés', 'Oceanía', 'Dólar australiano (AUD)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('183', 'Ucrania', 'Kiev', 'Ucraniano', 'Europa', 'Grivnia ucraniana (UAH)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('184', 'Uganda', 'Kampala', 'Suajili, Inglés', 'África', 'Chelín ugandés (UGX)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('185', 'Uruguay', 'Montevideo', 'Español', 'América del Sur', 'Peso uruguayo (UYU)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('186', 'Uzbekistán', 'Taskent', 'Uzbeko', 'Asia', 'Som uzbeko (UZS)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('187', 'Vanuatu', 'Port Vila', 'Bislama, Inglés, Francés', 'Oceanía', 'Vatu vanuatuense (VUV)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('188', 'Venezuela', 'Caracas', 'Español', 'América del Sur', 'Bolívar venezolano (VES)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('189', 'Vietnam', 'Hanoi', 'Vietnamita', 'Asia', 'Dong vietnamita (VND)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('190', 'Yemen', 'Saná', 'Árabe', 'Asia', 'Rial yemení (YER)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('191', 'Yibuti', 'Yibuti', 'Árabe, Francés', 'África', 'Franco yibutiano (DJF)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('192', 'Zambia', 'Lusaka', 'Inglés', 'África', 'Kwacha zambiano (ZMW)', '', '', '');
INSERT INTO tblnacionalidades (ID, Nombres, Capital, Idiomas, Continente, Monedas, FKIDPlantilla, FKIDLigas, FKIDClubes) VALUES ('193', 'Zimbabue', 'Harare', 'Inglés, Shona, Sindebele', 'África', 'Dólar zimbabuense (ZWL)', '', '', '');

CREATE TABLE `tblpartidos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `FKIDLigas` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Partidos_ClubLocal` (`ClubLocal`),
  KEY `FK_Partidos_ClubVisitante` (`ClubVisitante`),
  KEY `FK_Partidos_Plantilla` (`FKIDPlantilla`),
  KEY `FK_Partidos_Ligas` (`FKIDLigas`),
  CONSTRAINT `FK_Partidos_ClubLocal` FOREIGN KEY (`ClubLocal`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Partidos_ClubVisitante` FOREIGN KEY (`ClubVisitante`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Partidos_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  CONSTRAINT `FK_Partidos_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tblpatrocinadores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocial` varchar(255) DEFAULT NULL,
  `TipoContrato` varchar(255) DEFAULT NULL,
  `TiempoContrato` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  `FKIDSeleccionesNacionales` int(11) DEFAULT NULL,
  `FKIDTemporadas` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Patrocinadores_Plantilla` (`FKIDPlantilla`),
  KEY `FK_Patrocinadores_Clubes` (`FKIDClubes`),
  KEY `FK_Patrocinadores_SeleccionesNacionales` (`FKIDSeleccionesNacionales`),
  KEY `FK_Patrocinadores_Temporadas` (`FKIDTemporadas`),
  CONSTRAINT `FK_Patrocinadores_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Patrocinadores_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`),
  CONSTRAINT `FK_Patrocinadores_SeleccionesNacionales` FOREIGN KEY (`FKIDSeleccionesNacionales`) REFERENCES `tblseleccionesnacionales` (`ID`),
  CONSTRAINT `FK_Patrocinadores_Temporadas` FOREIGN KEY (`FKIDTemporadas`) REFERENCES `tbltemporadas` (`IdTemporada`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('1', '32Red', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('2', 'Adidas', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('3', 'AIA', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('4', 'American Express', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('5', 'Angry Birds', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('6', 'Bet365', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('7', 'BetVictor', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('8', 'Betway', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('9', 'BK8', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('10', 'Cadbury', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('11', 'Cazoo', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('12', 'Castore', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('13', 'CFK Group', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('14', 'Cinch', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('15', 'Dafabet', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('16', 'Emirates', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('17', 'Etihad Airways', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('18', 'Fly Emirates', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('19', 'Fun88', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('20', 'Hollywoodbets', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('21', 'Hummel', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('22', 'Kaiyun.com', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('23', 'King Power', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('24', 'Kappa', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('25', 'Macron', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('26', 'ManBetX', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('27', 'New Balance', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('28', 'Nike', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('29', 'Puma', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('30', 'SBOTOP', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('31', 'Sela', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('32', 'Sky Bet', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('33', 'Socios.com', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('34', 'Stake', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('35', 'Standard Chartered', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('36', 'TeamViewer', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('37', 'Three', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('38', 'TBC', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('39', 'Umbro', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('40', 'Utilita', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('41', 'Visit Rwanda', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('42', 'Vitality', '', '', '', '', '', '');
INSERT INTO tblpatrocinadores (ID, RazonSocial, TipoContrato, TiempoContrato, FKIDPlantilla, FKIDClubes, FKIDSeleccionesNacionales, FKIDTemporadas) VALUES ('43', 'W88', '', '', '', '', '', '');

CREATE TABLE `tblplantillas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `FKIDPartidos` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Plantillas_Temporada` (`FKTemporada`),
  KEY `FK_Plantillas_Ligas` (`FKIDLigas`),
  KEY `FK_Plantillas_Clubes` (`FKIDClubes`),
  KEY `FK_Plantillas_Nacionalidades` (`FKIDNacionalidades`),
  KEY `FK_Plantillas_SeleccionNacional` (`FKIDSeleccionNacional`),
  KEY `FK_Plantillas_Patrocinadores` (`FKIDPatrocinadores`),
  KEY `FK_PlantillasPartidos` (`FKIDPartidos`),
  CONSTRAINT `FK_PlantillasPartidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Plantillas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Plantillas_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`),
  CONSTRAINT `FK_Plantillas_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  CONSTRAINT `FK_Plantillas_Partidos` FOREIGN KEY (`FKIDPartidos`) REFERENCES `tblpartidos` (`ID`),
  CONSTRAINT `FK_Plantillas_Patrocinadores` FOREIGN KEY (`FKIDPatrocinadores`) REFERENCES `tblpatrocinadores` (`ID`),
  CONSTRAINT `FK_Plantillas_SeleccionNacional` FOREIGN KEY (`FKIDSeleccionNacional`) REFERENCES `tblseleccionesnacionales` (`ID`),
  CONSTRAINT `FK_Plantillas_Temporada` FOREIGN KEY (`FKTemporada`) REFERENCES `tbltemporadas` (`IdTemporada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tblroles` (
  `IdRol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `FKIDInvitados` int(11) DEFAULT NULL,
  `FKIDUsuarios` int(11) DEFAULT NULL,
  `FKIDTrabajadores` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdRol`),
  KEY `FK_Roles_Invitados` (`FKIDInvitados`),
  KEY `FK_Roles_Usuarios` (`FKIDUsuarios`),
  KEY `FK_Roles_Trabajadores` (`FKIDTrabajadores`),
  CONSTRAINT `FK_Roles_Invitados` FOREIGN KEY (`FKIDInvitados`) REFERENCES `tblinvitados` (`IdInvitado`),
  CONSTRAINT `FK_Roles_Trabajadores` FOREIGN KEY (`FKIDTrabajadores`) REFERENCES `tbltrabajadores` (`IdTrabajador`),
  CONSTRAINT `FK_Roles_Usuarios` FOREIGN KEY (`FKIDUsuarios`) REFERENCES `tblusuarios` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblroles (IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES ('1', 'Invitado', '', '', '');
INSERT INTO tblroles (IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES ('2', 'Básico', '', '', '');
INSERT INTO tblroles (IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES ('3', 'Estrella', '', '', '');
INSERT INTO tblroles (IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES ('4', 'Premium', '', '', '');
INSERT INTO tblroles (IdRol, Nombre, FKIDInvitados, FKIDUsuarios, FKIDTrabajadores) VALUES ('5', 'Administrador', '', '', '');

CREATE TABLE `tblseleccionesnacionales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `AñoFundacion` int(11) DEFAULT NULL,
  `FKIDPlantilla` int(11) DEFAULT NULL,
  `FKIDNacionalidades` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_SeleccionesNacionales_Plantilla` (`FKIDPlantilla`),
  KEY `FK_SeleccionesNacionales_Nacionalidades` (`FKIDNacionalidades`),
  CONSTRAINT `FK_SeleccionesNacionales_Nacionalidades` FOREIGN KEY (`FKIDNacionalidades`) REFERENCES `tblnacionalidades` (`ID`),
  CONSTRAINT `FK_SeleccionesNacionales_Plantilla` FOREIGN KEY (`FKIDPlantilla`) REFERENCES `tblplantillas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('1', '', '', '', '1');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('2', 'selección de fútbol de albania', '1930', '', '2');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('3', 'selección de fútbol de alemania', '1900', '', '3');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('4', 'selección de fútbol de andorra', '1994', '', '4');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('5', 'selección de fútbol de angola', '1976', '', '5');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('6', 'selección de fútbol de arabia saudita', '1956', '', '6');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('7', 'selección de fútbol de argelia', '1962', '', '7');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('8', 'selección de fútbol de argentina', '1893', '', '8');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('9', 'selección de fútbol de armenia', '1992', '', '9');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('10', 'selección de fútbol de australia', '1963', '', '10');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('11', 'selección de fútbol de austria', '1904', '', '11');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('12', 'selección de fútbol de azerbaiyán', '1992', '', '12');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('13', 'selección de fútbol de bahréin', '1957', '', '13');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('14', 'selección de fútbol de bangladés', '1972', '', '');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('15', 'selección de fútbol de barbados', '1925', '', '15');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('16', 'selección de fútbol de bélgica', '1895', '', '16');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('17', 'selección de fútbol de belice', '1980', '', '17');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('18', 'selección de fútbol de benín', '1962', '', '18');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('19', 'selección de fútbol de bielorrusia', '1991', '', '19');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('20', 'selección de fútbol de birmania (myanmar)', '', '', '20');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('21', 'selección de fútbol de bolivia', '1925', '', '21');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('22', 'selección de fútbol de bosnia y herzegovina', '1992', '', '22');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('23', 'selección de fútbol de botsuana', '1968', '', '23');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('24', 'selección de fútbol de brasil', '1914', '', '24');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('25', '', '', '', '25');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('26', 'selección de fútbol de bulgaria', '1924', '', '26');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('27', 'selección de fútbol de burkina faso', '1960', '', '27');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('28', 'selección de fútbol de burundi', '1972', '', '28');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('29', '', '', '', '29');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('30', 'selección de fútbol de cabo verde', '1975', '', '30');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('31', '', '', '', '31');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('32', 'selección de fútbol de camerún', '1959', '', '32');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('33', 'selección de fútbol de canadá', '1912', '', '33');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('34', 'selección de fútbol de catar', '1960', '', '34');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('35', '', '', '', '35');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('36', 'selección de fútbol de chile', '1895', '', '36');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('37', 'selección de fútbol de china', '1924', '', '37');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('38', 'selección de fútbol de chipre', '1934', '', '38');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('39', '', '', '', '39');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('40', 'selección de fútbol de colombia', '1924', '', '40');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('41', '', '', '', '41');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('42', 'selección de fútbol de corea del norte', '1945', '', '42');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('43', 'selección de fútbol de corea del sur', '1945', '', '43');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('44', 'selección de fútbol de costa de marfil', '1960', '', '44');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('45', 'selección de fútbol de costa rica', '1921', '', '45');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('46', 'selección de fútbol de croacia', '1990', '', '46');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('47', 'selección de fútbol de cuba', '1924', '', '47');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('48', 'selección de fútbol de dinamarca', '1889', '', '48');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('49', '', '1970', '', '49');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('50', 'selección de fútbol de ecuador', '1925', '', '50');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('51', 'selección de fútbol de egipto', '1921', '', '51');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('52', 'selección de fútbol de el salvador', '1921', '', '52');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('53', 'selección de fútbol de emiratos árabes unidos', '1971', '', '53');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('54', '', '', '', '54');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('55', 'selección de fútbol de eslovaquia', '1993', '', '55');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('56', 'selección de fútbol de eslovenia', '1991', '', '56');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('57', 'selección de fútbol de españa', '1913', '', '57');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('58', 'selección de fútbol de estados unidos', '1885', '', '58');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('59', 'selección de fútbol de estonia', '1921', '', '59');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('60', '', '', '', '60');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('61', '', '', '', '61');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('62', 'selección de fútbol de finlandia', '1907', '', '62');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('63', '', '', '', '63');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('64', 'selección de fútbol de francia', '1904', '', '64');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('65', 'selección de fútbol de gabón', '1962', '', '65');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('66', 'selección de fútbol de gambia', '1952', '', '66');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('67', 'selección de fútbol de georgia', '1990', '', '67');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('68', 'selección de fútbol de ghana', '1957', '', '68');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('69', '', '', '', '69');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('70', 'selección de fútbol de grecia', '1926', '', '70');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('71', 'selección de fútbol de guatemala', '1919', '', '71');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('72', 'selección de fútbol de guinea', '1962', '', '72');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('73', 'selección de fútbol de guinea ecuatorial', '1960', '', '73');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('74', 'selección de fútbol de guinea bisáu', '1973', '', '');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('75', '', '1902', '', '75');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('76', 'selección de fútbol de haití', '1904', '', '76');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('77', 'selección de fútbol de honduras', '1951', '', '77');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('78', 'selección de fútbol de hungría', '1901', '', '78');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('79', 'selección de fútbol de india', '1937', '', '79');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('80', '', '1930', '', '80');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('81', 'selección de fútbol de irak', '1948', '', '81');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('82', 'selección de fútbol de irán', '1920', '', '82');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('83', 'selección de fútbol de irlanda', '1921', '', '83');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('84', 'selección de fútbol de islandia', '1947', '', '84');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('85', '', '', '', '85');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('86', '', '', '', '86');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('87', '', '1978', '', '87');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('88', 'selección de fútbol de israel', '1928', '', '88');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('89', 'selección de fútbol de italia', '1898', '', '89');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('90', 'selección de fútbol de jamaica', '1910', '', '90');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('91', 'selección de fútbol de japón', '1921', '', '91');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('92', 'selección de fútbol de jordania', '1949', '', '92');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('93', 'selección de fútbol de kazajistán', '1992', '', '93');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('94', 'selección de fútbol de kenia', '1960', '', '94');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('95', 'selección de fútbol de kirguistán', '1992', '', '95');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('96', '', '', '', '96');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('97', 'selección de fútbol de kuwait', '1952', '', '97');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('98', '', '', '', '98');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('99', 'selección de fútbol de lesoto', '1932', '', '99');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('100', 'selección de fútbol de letonia', '1921', '', '100');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('101', 'selección de fútbol de líbano', '1933', '', '101');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('102', 'selección de fútbol de liberia', '1936', '', '102');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('103', 'selección de fútbol de libia', '1962', '', '103');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('104', 'selección de fútbol de liechtenstein', '1934', '', '104');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('105', 'selección de fútbol de lituania', '1922', '', '105');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('106', 'selección de fútbol de luxemburgo', '1908', '', '106');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('107', '', '', '', '107');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('108', 'selección de fútbol de malasia', '1963', '', '108');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('109', 'selección de fútbol de moldavia', '1991', '', '118');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('110', '', '', '', '119');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('111', 'selección de fútbol de mongolia', '1959', '', '120');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('112', 'selección de fútbol de montenegro', '2006', '', '121');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('113', '', '', '', '122');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('114', 'selección de fútbol de namibia', '1990', '', '123');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('115', '', '', '', '124');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('116', '', '', '', '125');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('117', 'selección de fútbol de nicaragua', '1931', '', '126');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('118', 'selección de fútbol de níger', '1960', '', '127');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('119', 'selección de fútbol de nigeria', '1945', '', '128');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('120', 'selección de fútbol de noruega', '1908', '', '129');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('121', 'selección de fútbol de nueva zelanda', '1891', '', '130');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('122', 'selección de fútbol de omán', '1978', '', '131');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('123', 'selección de fútbol de los países bajos', '1904', '', '132');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('124', '', '', '', '133');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('125', '', '', '', '134');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('126', '', '', '', '135');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('127', 'selección de fútbol de panamá', '1937', '', '136');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('128', 'selección de fútbol de perú', '1927', '', '139');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('129', 'selección de fútbol de polonia', '1919', '', '140');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('130', 'selección de fútbol de portugal', '1914', '', '141');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('131', 'selección de fútbol de inglaterra (parte del reino unido)', '1872', '', '142');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('132', 'selección de fútbol de república centroafricana', '1961', '', '143');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('133', 'selección de fútbol de república checa', '1994', '', '144');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('134', 'selección de fútbol de república del congo (congo brazzaville)', '1962', '', '');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('135', 'selección de fútbol de república democrática del congo (congo kinshasa)', '1963', '', '');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('136', 'selección de fútbol de república dominicana', '1953', '', '145');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('137', 'selección de fútbol de ruanda', '1972', '', '146');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('138', 'selección de fútbol de rumania', '1909', '', '147');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('139', 'selección de fútbol de rusia', '1912', '', '148');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('140', '', '', '', '149');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('141', 'selección de fútbol de san cristóbal y nieves', '1932', '', '150');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('142', '', '1931', '', '151');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('143', '', '', '', '152');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('144', 'selección de fútbol de santo tomé y príncipe', '1975', '', '155');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('145', 'selección de fútbol de senegal', '1960', '', '156');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('146', 'selección de fútbol de serbia', '1919', '', '157');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('147', '', '', '', '158');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('148', 'selección de fútbol de sierra leona', '1960', '', '159');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('149', 'selección de fútbol de singapur', '1892', '', '160');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('150', 'selección de fútbol de siria', '1936', '', '161');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('151', '', '1939', '', '163');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('152', 'selección de fútbol de suazilandia', '1968', '', '164');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('153', 'selección de fútbol de sudáfrica', '1992', '', '165');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('154', 'selección de fútbol de sudán', '1936', '', '166');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('155', '', '', '', '167');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('156', 'selección de fútbol de suecia', '1904', '', '168');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('157', 'selección de fútbol de suiza', '1904', '', '169');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('158', 'selección de fútbol de surinam', '1920', '', '170');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('159', 'selección de fútbol de tailandia', '1916', '', '171');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('160', '', '', '', '172');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('161', 'selección de fútbol de tayikistán', '1936', '', '174');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('162', '', '', '', '');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('163', 'selección de fútbol de togo', '1960', '', '176');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('164', '', '', '', '177');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('165', 'selección de fútbol de trinidad y tobago', '1908', '', '178');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('166', 'selección de fútbol de túnez', '1956', '', '179');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('167', '', '', '', '180');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('168', 'selección de fútbol de turquía', '1923', '', '181');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('169', '', '', '', '182');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('170', 'selección de fútbol de ucrania', '1991', '', '183');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('171', 'selección de fútbol de uganda', '1924', '', '184');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('172', 'selección de fútbol de uruguay', '1900', '', '185');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('173', 'selección de fútbol de uzbekistán', '1992', '', '186');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('174', '', '', '', '187');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('175', 'selección de fútbol de venezuela', '1926', '', '188');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('176', 'selección de fútbol de vietnam', '1961', '', '189');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('177', 'selección de fútbol de yemen', '1962', '', '190');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('178', '', '', '', '191');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('179', 'selección de fútbol de zambia', '1929', '', '192');
INSERT INTO tblseleccionesnacionales (ID, Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES ('180', 'selección de fútbol de zimbabue', '1965', '', '193');

CREATE TABLE `tbltemporadas` (
  `IdTemporada` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `FechaInicial` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `FKIDLigas` int(11) DEFAULT NULL,
  `FKIDClubes` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdTemporada`),
  KEY `FK_Temporadas_Ligas` (`FKIDLigas`),
  KEY `FK_Temporadas_Clubes` (`FKIDClubes`),
  CONSTRAINT `FK_Temporadas_Clubes` FOREIGN KEY (`FKIDClubes`) REFERENCES `tblclubes` (`ID`),
  CONSTRAINT `FK_Temporadas_Ligas` FOREIGN KEY (`FKIDLigas`) REFERENCES `tblligas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tbltemporadas (IdTemporada, Nombre, FechaInicial, FechaFinal, FKIDLigas, FKIDClubes) VALUES ('1', 'Premier League', '2023-08-14', '2024-05-22', '1', '');

CREATE TABLE `tbltrabajadores` (
  `IdTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Sueldo` decimal(10,2) DEFAULT NULL,
  `FKIDRoles` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdTrabajador`),
  KEY `FK_Trabajadores_Roles` (`FKIDRoles`),
  CONSTRAINT `FK_Trabajadores_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tbltrabajadores (IdTrabajador, Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles) VALUES ('1', 'Erik Darney', 'Erick.hdz9628@gmail.com', 'Administrador', '2000000.00', '5');
INSERT INTO tbltrabajadores (IdTrabajador, Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles) VALUES ('2', 'Juan Pablo', 'juanpabl1535@gmail.com', 'Administrador', '2000000.00', '5');
INSERT INTO tbltrabajadores (IdTrabajador, Nombre, CorreoElectronico, Area, Sueldo, FKIDRoles) VALUES ('3', 'Gabriel', 'gabrielchaparro@gmail.com', 'Administrador', '2000000.00', '5');

CREATE TABLE `tblusuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
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
  `FechaNacimiento` date DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `FK_Usuarios_Roles` (`FKIDRoles`),
  CONSTRAINT `FK_Usuarios_Roles` FOREIGN KEY (`FKIDRoles`) REFERENCES `tblroles` (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO tblusuarios (IdUsuario, FKIDRoles, Nombre, Apellido, Documento, Correo, Contraseña, Token, TokenRecuperacion, Verificado, MembresiaInicio, MembresiaFin, Teléfono, País, Ciudad, Género, FechaNacimiento) VALUES ('2', '1', 'erik', 'hernandez', '2147483647', 'erick.hdz9628@gmail.com', '123456789', 'f14e9e0e04b016c7', '', '1', '0000-00-00', '0000-00-00', '42334232', 'colombia', 'Bogota', 'Masculino', '1223-02-22');
