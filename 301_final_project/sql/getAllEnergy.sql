SELECT carbon.year AS 'Year', carbon.value AS 'CO2 Emissios (Millions of Tonnes)', hydro.value AS 'Hydroelectric Cosumption (Terrawatt Hours)'
FROM db_fall19_flemingo1.final_carbon as carbon
LEFT JOIN db_fall19_flemingo1.final_hydro as hydro
ON carbon.code = hydro.code AND carbon.year = hydro.year
WHERE carbon.code = :code AND carbon.year BETWEEN :minYear AND :maxYear
