<p align="center"><a href="https://github.com/adronmarsh/Astronic" target="_blank"><img src="https://astronicservice.s3.eu-west-3.amazonaws.com/logotipo.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEEsaCWV1LXdlc3QtMyJIMEYCIQDg2HCXeRV9MKOlzRH3tSBIazdkaU51k2C%2BIu3Wtjk0aAIhAIcHYLRKMAixPjMfSBYLo0BbWockF4S3SCHgxM5pkcR2Ku0CCJT%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEQAhoMNDc2MzUxOTA1NDYzIgweLf7be0aS3Wdp4TwqwQJeCguHE%2B6Klc7nJisPQRxwqqnHJwnS5rDSuTJYofSvuTPZ2m6AHkaXcbcBEh%2Bt9Z6jAOUCy%2FT1r2MIPPzoMca0vkCL6IsCSw84vaCfJK200wMpo2VzqEGrZvkwWOEos52iaqyZ5h13mez0qEHLOt5UxxgSXv%2B95bI%2FUJk3KF9NK2enfg1gXp3COEnV7QEEJJzeACPQepsr2chrz652d5zlsQmXoR18abTa2IWwN66uxKWcx5VbEL9IOnxo0nXy5c3L0nk6ny%2B8VyIV8YLwK3Re6RD34xaGvJsdDbdphdy7qQARFZm6Mjj1uCjyPvthTLPTXGqNF0xQybogxnf42bA%2FHSGv35fviq5t%2F40OpgxTQMmhm0F%2FXLh0U493WqEuFW3PN8jhUSydRPDryG2Nf3F%2FS%2FIo1HNdFZLtx01YKSlenkUw%2FOGNpAY6sgJF1be5vQPcexRvIhabs8fPPTRColL1xgh3nXiA7ueqHl%2BFLt43F8xcxaO58DkR1rq6O8wTFpKOX21bhg6IEvnhAN3dxwOwJDlEa6HtN7L8hhMxskdD%2FljuoBKVVFvMRHTwTDpI2F3kbpNydnxQkeiCZXp%2F%2Fk3y9rCbz%2BUuQ%2FoW4zHMpAnFunkDze9HlzQMBqKF1AzizFy%2BhdJoUG983XiAgFv7U0xjrXAFadEIlGVOYcJArIwOOq%2BaqlrAwLjgzByCfINeIiDOcSS2O6RHUhmlTf0RL%2FYgP%2BKnrzK7PuSQbddJWonV%2FqdiC7OPqhsPFsNpgMb3pF30bG%2F5PUbjCNEwreGC3MG%2BuyrKbGflw0z2hOympCAXVG7NMPR15wHlG7woJB35rTi17%2BT%2F19tFfMPbGYE%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230609T183834Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAW52GJH233ODVTF64%2F20230609%2Feu-west-3%2Fs3%2Faws4_request&X-Amz-Signature=a519edbc836c71aa09e7f3700306c433797fc7382f4a8017a348f17fcaba196f" width="400" alt="Astronic Logo"></a></p>

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
