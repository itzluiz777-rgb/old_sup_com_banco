use empresa;
select AVG(salario) from EMPREGADO where sexo ="M";
select ndepto,AVG(salario) from empresa group by ndpeto;
select NOMEDEP,AVG(salario) from EMPREGADO,DEPARTAMENTO where  NDEPTO   = NUMDEP group by NOMEDEP ;
select NOMEDEP,AVG(salario) from EMPREGADO,DEPARTAMENTO where  NDEPTO   = NUMDEP group by NOMEDEP having avg(salario) > 650;
select NOMEDEP,AVG(salario),count(salario) from EMPREGADO,DEPARTAMENTO where  NDEPTO   = NUMDEP group by NOMEDEP having count(salario) > 2;
