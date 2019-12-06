SELECT value FROM db_fall19_flemingo1.final_carbon
WHERE code = :code
AND year = (SELECT max(year) FROM db_fall19_flemingo1.final_carbon WHERE code = :code);