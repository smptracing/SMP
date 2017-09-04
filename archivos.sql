USE [DBSMP]
GO
/****** Object:  StoredProcedure [dbo].[sp_ListarEstudioFormulacion]    Script Date: 04/09/2017 07:52:32 a.m. ******/
SET ANSI_NUapa VARCHAR(100);
         SET @desc_etapa = 'Formulación';
         SELECT pip.id_pi,
                EI.id_est_inv,
                EI.codigo_unico_est_inv,
                EI.nombre_est_inv,
                STUFF(
                     (
                         SELECT ','+provincia AS [text()]
                         FROM UBIGEO_PI ubp
                              INNER JOIN UBIGEO ub ON ubp.id_ubigeo = ub.id_ubigeo
                         WHERE ubp.id_pi = PIP.id_pi
                         ORDER BY ub.id_ubigeo FOR XML PATH('')
                     ), 1, 1, '') AS provincia,
                STUFF(
                     (
                         SELECT ','+distrito AS [text()]
                         FROM UBIGEO_PI ubp1
                              INNER JOIN UBIGEO ub1 ON ubp1.id_ubigeo = ub1.id_ubigeo
                              INNER JOIN PROYECTO_INVERSION py ON py.id_pi = ubp1.id_pi
                         WHERE ubp1.id_pi = PIP.id_pi
                         ORDER BY ub1.id_ubigeo FOR XML PATH('')
                     ), 1, 1, '') AS distrito,
                NE.denom_nivel_estudio,
                --STUFF(
                --     (
                --         SELECT ','+nombres AS [text()]
                --         FROM ETAPA_ESTUDIO etae
                --              INNER JOIN ASIGNACION_PERSONA aspe ON etae.id_etapa_estudio = aspe.id_etapa_estudio
                --              INNER JOIN PERSONA pers ON pers.id_persona = aspe.id_persona
                --         WHERE aspe.id_etapa_estudio = AP.id_etapa_estudio
                --         ORDER BY pers.id_persona FOR XML PATH('')
                --     ), 1, 1, '') AS nombres,
			 p.nombres,
                EI.costo_estudio,
                --STUFF(
                --     (
                --         SELECT ','+denom_situacion_fe AS [text()]
                --         FROM ETAPA_ESTUDIO etae
                --              INNER JOIN SITUACION_ACTUAL siac ON siac.id_etapa_estudio = etae.id_etapa_estudio
                --              INNER JOIN SITUACION_FE sife ON sife.id_situacion_fe = siac.id_situacion_fe
                --         WHERE siac.id_etapa_estudio = AP.id_etapa_estudio
                --         ORDER BY sife.id_situacion_fe FOR XML PATH('')
                --     ), 1, 1, '') AS denom_situacion_fe,
			 s.denom_situacion_fe,
                EE.avance_fisico,
                ee.id_etapa_estudio

FROM            dbo.PERSONA AS P INNER JOIN
                         dbo.CARGO AS C INNER JOIN
                         dbo.ASIGNACION_PERSONA AS AP ON C.id_cargo = AP.id_cargo ON P.id_persona = AP.id_persona RIGHT OUTER JOIN
                         dbo.RESPONSABLE_ESTUDIO RIGHT OUTER JOIN
                         dbo.NIVEL_ESTUDIO AS NE INNER JOIN
                         dbo.PROYECTO_INVERSION AS PIP INNER JOIN
                         dbo.ESTUDIO_INVERSION AS EI ON PIP.id_pi = EI.id_pi ON NE.id_nivel_estudio = EI.id_nivel_estudio LEFT OUTER JOIN
                         dbo.UBIGEO AS U INNER JOIN
                         dbo.UBIGEO_PI AS UP ON U.id_ubigeo = UP.id_ubigeo ON UP.id_pi = PIP.id_pi ON dbo.RESPONSABLE_ESTUDIO.id_est_inv = EI.id_est_inv LEFT OUTER JOIN
                         dbo.ETAPAS_FE AS E INNER JOIN
                         dbo.ETAPA_ESTUDIO AS EE ON E.id_etapa_fe = EE.id_etapa_fe LEFT OUTER JOIN
                         dbo.SITUACION_FE AS S INNER JOIN
                         dbo.SITUACION_ACTUAL AS SA ON S.id_situacion_fe = SA.id_situacion_fe INNER JOIN
                             (SELECT        id_etapa_estudio, MAX(fecha) AS fecha_max
                               FROM            dbo.SITUACION_ACTUAL
                               GROUP BY id_etapa_estudio) AS SA_u ON SA_u.id_etapa_estudio = SA.id_etapa_estudio AND SA_u.fecha_max = SA.fecha ON 
                         EE.id_etapa_estudio = SA.id_etapa_estudio ON EI.id_est_inv = EE.id_est_inv ON AP.id_etapa_estudio = EE.id_etapa_estudio

	    --estudio inv cero, filtra todo
	    WHERE RESPONSABLE_ESTUDIO.id_persona = @id_persona AND 
			 en_seguimiento = 1 AND 
			 E.denom_etapas_fe = @desc_etapa AND 
			 ( EI.id_est_inv = @id_estudio_inv OR @id_estudio_inv = 0 )
			
         GROUP BY pip.id_pi,
                  EI.id_est_inv,
                  EI.codigo_unico_est_inv,
                  EI.nombre_est_inv,
                  NE.denom_nivel_estudio,
			   p.nombres,
                  EI.costo_estudio,
			   s.denom_situacion_fe,
                  EE.avance_fisico,
                  ee.id_etapa_estudio,
                  AP.id_etapa_estudio
         ORDER BY ee.id_etapa_estudio DESC;
     END;
