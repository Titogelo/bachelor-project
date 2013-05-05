DELIMITER |
DROP TRIGGER IF EXISTS actualiza_clasificacion |
CREATE TRIGGER actualiza_clasificacion AFTER UPDATE ON Partido
FOR EACH ROW BEGIN
	#call actualiza_clasificacion1(NEW.local,NEW.visitante,NEW.resloc,NEW.resvis,NEW.temporada,NEW.codigo_liga,OLD.partido_actualizado);
	IF OLD.actualizado = 0 THEN
		UPDATE clasificacion SET jugados = jugados + 1 WHERE (equipo = NEW.local or equipo = NEW.visitante) and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		IF NEW.resloc > NEW.resvis THEN
			UPDATE clasificacion SET puntos = puntos + 3, puntoscasa = puntoscasa + 3,   ganados = ganados + 1,      favor = favor + NEW.resloc, 	contra = contra + NEW.resvis  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 0, perdidos = perdidos + 1,       favor = favor + NEW.resvis, contra = contra + NEW.resloc   WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSEIF NEW.resloc < NEW.resvis THEN
			UPDATE clasificacion SET puntos = puntos + 0, perdidos = perdidos + 1,       favor = favor + NEW.resloc, contra = contra + NEW.resvis   WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 3, puntosfuera = puntosfuera + 3, ganados = ganados + 1, 	 favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSE
			UPDATE clasificacion SET puntos = puntos + 1, puntoscasa = puntoscasa + 1,   empatados = empatados + 1,  favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 1, puntosfuera = puntosfuera + 1, empatados = empatados + 1,  favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		END IF;
	ELSE
		IF OLD.resloc > OLD.resvis THEN
			UPDATE clasificacion SET puntos = puntos - 3, puntoscasa = puntoscasa - 3,   ganados = ganados - 1, 	 favor = favor - OLD.resloc, 	contra = contra - OLD.resvis  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos - 0, perdidos = perdidos - 1,       favor = favor - OLD.resvis, contra = contra - OLD.resloc  	WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSEIF OLD.resloc < OLD.resvis THEN
			UPDATE clasificacion SET puntos = puntos - 0, perdidos = perdidos - 1,       favor = favor - OLD.resloc, contra = contra - OLD.resvis 	WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos - 3, puntosfuera = puntosfuera - 3, ganados = ganados - 1, 	 favor = favor - OLD.resvis, 	contra = contra - OLD.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSE
			UPDATE clasificacion SET puntos = puntos - 1, puntoscasa = puntoscasa - 1,   empatados = empatados - 1,  favor = favor - OLD.resvis, 	contra = contra - OLD.resloc  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos - 1, puntosfuera = puntosfuera - 1, empatados = empatados - 1,  favor = favor - OLD.resvis, 	contra = contra - OLD.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		END IF;
		
		IF NEW.resloc > NEW.resvis THEN
			UPDATE clasificacion SET puntos = puntos + 3, puntoscasa = puntoscasa + 3,   ganados = ganados + 1, 	 favor = favor + NEW.resloc, 	contra = contra + NEW.resvis  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 0, perdidos = perdidos + 1,       favor = favor + NEW.resvis, contra = contra + NEW.resloc   WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSEIF NEW.resloc < NEW.resvis THEN
			UPDATE clasificacion SET puntos = puntos + 0, perdidos = perdidos + 1,       favor = favor + NEW.resloc, contra = contra + NEW.resvis  	WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 3, puntosfuera = puntosfuera + 3, ganados = ganados + 1, 	 favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		ELSE
			UPDATE clasificacion SET puntos = puntos + 1, puntoscasa = puntoscasa + 1,   empatados = empatados + 1,  favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.local and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
			UPDATE clasificacion SET puntos = puntos + 1, puntosfuera = puntosfuera + 1, empatados = empatados + 1,  favor = favor + NEW.resvis, 	contra = contra + NEW.resloc  WHERE equipo = NEW.visitante and codigo_liga = NEW.codigo_liga and temporada = NEW.temporada;
		END IF;
	END IF;
END
|
DELIMITER ;


SELECT puntos, favor, contra, posicion FROM `clasificacion` inner join jornada WHERE jornada.idJornada = clasificacion.idJornada and idCategoria = 1 and idEquipo = 1 order by jornada.numJornada desc limit 1