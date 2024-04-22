
## Proyecto Test Laravel

Proyecto simple con integración de Autenticación (Login - Register),  CRUD de Empresas y Empleados.   

## Base de Datos
> [!IMPORTANT]
> El proyecto se encuentra integrado con una base de datos MariaDB montada en un servidor de AWS - Amazon Relational Database Service (Amazon RDS)

## Servidor
> [!IMPORTANT]
Servidor virtual  Amazon EC2 - Amazon Elastic Compute Cloud (Amazon EC2) 
El servidor se encuentra expuesto bajo la Dirección IPv4 pública: 
http://3.144.152.19/ 


> [!WARNING]
> ## Documentación
>La documentación de la Api está en la ruta : http://3.144.152.19/api/documentation
>se encuentra incompleta.

> [!TIP]
Tiene configurado un semilla para la insercción del un usuario de tipo ADMIN se ejecuta con ` php artisan db:seed`, adempas tiene una capa de validación cuando
no se encuentra ningun usuario registrado el sistema se encarga de asignarle el rol de ADMIN por defecto.



