# escape-game-backend
He conseguido que no me dé problemas de CORS copiando código de internet sin saber lo que hace, no puedo asegurar que funcione bien.  

Al clonar el proyecto corre el fichero run.bat o run.sh para que baje las dependencias. Asegúrate que la URL del frontend esté bien en el fichero .env en:  
`APP_URL=http://localhost`  
`SESSION_DOMAIN=http://localhost`  
`SANCTUM_STATEFUL_DOMAINS=http://localhost`    
# Docker
Se levanta el contendor con `./vendor/bin/sail up` (En Linux), corre la API por el puerto 1111 y phpmyadmin por el puerto 1112.  

Con `./vendor/bin/sail` se puede correr comandas sobre el contenedor levantado, por ejemplo, hacer un migrate al contendor:  
`./vendor/bin/sail artisan migrate`
