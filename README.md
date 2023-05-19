<p align="center"><a href="https://github.com/adronmarsh/Astronic" target="_blank"><img src="https://astronicservice.s3.eu-west-3.amazonaws.com/logotipo.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEFAaCWV1LXdlc3QtMyJGMEQCIHHepDgIIww7iqRNyuFoYMcL%2BnmmbzrpEJem7jEMwJi0AiBKQYCWZsbUZMBAyfqSL%2F%2BSQl5BZtpyS4JAIssOMR3D9yrkAgh5EAIaDDQ3NjM1MTkwNTQ2MyIMq62eFTpmYfPUQOMHKsEChV1H31In6uIdg7mniT%2BOoYJF6qy4ap%2FNTtxyJaxaIEAgpSvy18411%2BV2sAeFnGJiYb4N7AjIl3k03BO6sDfCwzotuMpCRyA%2B4uH6Jyyvh94xkEvIQbqaU1RsOHjb0DXj0LoSGiC%2BXmI88KWyFUZbjhjhoYZt%2FhDha9pQWYlwapPtDeEKCZaQedoXQYH4gm4RYsytYpa3PxVwOeBhdJ0AJ0oh3cinjehnko3roVpKjh0%2F5472SAQXBsbyDT30lNwFH1Z9FYr8fujcv3V4pgd%2FMGFnSYJyfIXp40UWEtPyxQtiJ%2BdDyvwbwk39ZgOWdO7W4zgwczj74jw0HTUmC%2FkDRBThcfSSZJhbbh1379ftksShpPPCzER8zP5wTOFI1r5oqvjRzckA46Qnj3XfOhS9z%2BifJIs%2BmB4dL5zuU9zF6px9MPC2nqMGOrQCGKNarv%2B4BEeaxGYGjPbKSO7ordZ9KY186uqGkbZ9%2BoE0Q%2F1RvZaL6%2F3Hf7YfgqwSPPaLuyypifRZCnJXNTocjyPzQM7u2WN2sEX8%2FUsDCigtEGzTmmYciDjb9F13rTZB57gDB5%2FEt2Kcvw0RDS3oDTvE23L0%2Fmw%2FFKkUYtlW7Ko0IsfDRHtxwArkGGbmvJE3jNbmFsD5XjcvpvBcaLoGYb%2FlhVFGLYi2hYVhgGvoB%2BZRThu0Wxq8Nk4s6lDK1H6dj2nUjYqfV6TQwNVLlwoqgl5B7q2meq4%2FEW5%2F6awOxzVjiPmQN5DHKQ5aZ4t9k62ErpMaEgPj%2FjbsMWPb9RB0H7THkFYcrMREMLZhfzP9laQPVunBFSYDdlrtxHBaAev9WdWSyoAryXfzbPvf%2BeeujFUUqGw%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230519T172620Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAW52GJH23UUBBJTFX%2F20230519%2Feu-west-3%2Fs3%2Faws4_request&X-Amz-Signature=afe08fea4d8533cf27028332b5abac7dbde37c461624d18971df3696d676928d" width="400" alt="Astronic Logo"></a></p>

# Astronic
## ¿Qué es Astronic?

Astronic es una red social creada para la promoción e información de empresas. Este proyecto tiene como objetivo proporcionar una plataforma intuitiva y eficiente que permita a las empresas alcanzar a su audiencia de manera directa y efectiva.  

Ventajas para las empresas:

- Promociona tus productos.
- Atrae nuevos clientes.
- Contacta de forma directa con tus clientes.
- Aumenta tu networking.
- Vende tus productos de forma rápida y segura (futuro).
- Análisis de datos personalizado (futuro).

Ventajas para las personas:

- Descubre productos y servicios.
- Accede a ofertas y promociones exclusivas.
- Contacta de forma directa con las empresas.
- Encuentra los mejores negocios a tu alrededor.
- Lee opiniones sobre los productos.
- Compra en línea de forma segura (futuro).

## Más cosas sobre Astronic

Astronic utiliza un servidor público S3 de Amazon para subir sus publicaciones por lo que cualquier contenido subido a la plataforma quedará expuesto de forma pública.

## Instalación y configuración

1. Clona el repositorio de Astronic en tu máquina local.
```copyable
git clone https://github.com/adronmarsh/Astronic.git
```

2. Descarga e instala [composer](https://getcomposer.org/) en el directorio del proyecto.
```copyable
composer install
``` 
3. Descarga [XAMPP](https://www.apachefriends.org/es/download.html) e incia Apache y MySQL.
4. Configura el archivo de entorno .env. Puedes copiar el archivo de ejemplo .env.example y renombrarlo a .env. Será neceario configuar el acceso a la base de datos y crear una clave para subir imágenes al servidor.
5. Ejecuta las migraciones.
```copyyable
php artisan migrate
```
6. Inicia el servidor de Laravel.
```copyable
php artisan serve
```
7. Accede a la URL en tu navegador.
```copyable
http://127.0.0.1:8000/
```
8. ¡Listo! Si tienes cualquier duda sobre la instalación escribe un correo a adron.marsh@gmail.com
