SELECT value FROM db_fall19_flemingo1.final_hydro
WHERE code = :code
AND year = (SELECT max(year) FROM db_fall19_flemingo1.final_hydro WHERE code = :code);