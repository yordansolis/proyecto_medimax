create database db_users;

drop database db_users; 

use db_login;


insert into user(username, password)values('alexgregory@gmail.com', 'admin');


SELECT `username` FROM `user` WHERE username ="alexgregory" ;

#con variable
SELECT `username`, `password` FROM `user` WHERE username ="alexgregory" and password = 'admin';

use proyecto_final;
drop table codigos;

create table codigos(
id_codigo int,
 fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELIMITER //
CREATE EVENT eliminar_datos
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 MINUTE
DO
BEGIN
    DELETE FROM codigos WHERE fecha_creacion < (NOW() - INTERVAL 30 MINUTE);
END//
DELIMITER ;




insert into  codigos(id_codigo) values(1234);
insert into  codigos(id_codigo) values(4569);

select * from codigos;



SELECT * FROM codigos  WHERE  id_codigo = 4569;


SELECT * FROM `customers` WHERE codpaci = 2;

SELECT * FROM customers;


SELECT * FROM customers WHERE codpaci = 1;
UPDATE customers SET email='' WHERE codpaci = 1;


SELECT * FROM customers WHERE codpaci = 2 AND email != '';

/* add tabla */ 
ALTER TABLE customers ADD email VARCHAR(255);

drop table solicitar_cita;
create	table solicitar_cita(
id_cita int auto_increment primary key,
nombre varchar(50) not null,
cedula varchar(100) not null,
telefono varchar(100) not null,
email varchar(100) not null,
regimen varchar(50) not null,
motivos varchar(200) not null,
estado boolean, 
id_relacionado int,
foreign key (id_relacionado) references customers(codpaci)
);


INSERT INTO solicitar_cita(nombre, cedula, telefono, email, regimen, motivos, estado, id_relacionado)VALUES(
'pedro', '107745886', '311325564', 'yordan@example.com', 'subsidiado', 'lorem iso', false,1);

delete from solicitar_cita where id_cita= 7;
select * from solicitar_cita; 


SELECT * FROM customers;

SELECT solicitar_cita.id_cita, solicitar_cita.nombre, solicitar_cita.cedula, solicitar_cita.telefono, solicitar_cita.email, solicitar_cita.regimen, solicitar_cita.motivos, customers.nombrep,customers.codpaci
FROM solicitar_cita;


INNER JOIN customers ON solicitar_cita.id_relacionado = customers.codpaci;

 
 SELECT COUNT(*) as total_citas FROM solicitar_cita WHERE id_relacionado = 1;

SELECT * FROM solicitar_cita WHERE id_relacionado = 1;



SELECT COUNT(*) as total_citas FROM solicitar_cita;




/**drop table cancelar_cita;*/

create table cancelar_cita(
id_cita int auto_increment primary key,
nombre varchar(50) not null,
cedula varchar(100) not null,
fecha varchar(200) not null,
motivos varchar(200) not null,
atencionmedica  varchar(200) not null,
estado boolean,
id_relacionado int,
foreign key (id_relacionado) references customers(codpaci)
); 



INSERT INTO cancelar_cita(nombre, cedula, fecha, motivos,  atencionmedica, estado, id_relacionado)VALUES(
'jordan', '107745886', '11-12-2023', 'Cuestiones personales',  'Odontologia', true, 1);


select * from cancelar_cita; 

SELECT cancelar_cita.id_cita, cancelar_cita.nombre, cancelar_cita.cedula,   cancelar_cita.fecha, cancelar_cita.motivos, cancelar_cita.atencionmedica,  customers.nombrep, customers.codpaci
FROM cancelar_cita
INNER JOIN customers ON cancelar_cita.id_relacionado = customers.codpaci;
