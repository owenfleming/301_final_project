SELECT year AS 'Year', value AS 'Hydroelectric Cosumption (Terrawatt Hours)' 
FROM db_fall19_flemingo1.final_hydro
where code = :code AND Year BETWEEN :minYear and :maxYear
ORDER BY Year