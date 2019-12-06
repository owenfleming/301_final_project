SELECT year AS 'Year', value AS 'CO2 Emissions (Millions of Tonnes)' FROM db_fall19_flemingo1.final_carbon
where code = :code AND Year BETWEEN :minYear and :maxYear
ORDER BY Year