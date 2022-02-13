# escape-game-backend
He conseguido que no me dé problemas de CORS copiando código de internet sin saber lo que hace, no puedo asegurar que funcione bien. 
Si quieres que el CORS funcione tienes que poner la ruta de tu fronted en backend\app\Http\Middleware\Cors.php línea 10:  
`->header("Access-Control-Allow-Origin", "http:://tufrontend")`

Del frontend, principalmente he modificado el fichero frontend\src\vue\App.js pero he hecho algún pequeño cambio en otros ficheros.

# Petiones al servidor
## Login
- **Tablas implicadas:** users
- **Localizacion backend:** .\app\Http\Controllers\API\AuthController.php - function login()  
- **Petición en el frontend:** frontend\src\vue\App.js - loginPetition()  
- **Ruta API:** /api/login  
- **TODOs:**
  - [ ] Recuperar información de usuario preguntando al backend al recargar página 
  - [ ] Logarte con tu nombre de usuario

## Signup
- **Tablas implicadas:** users
- **Localizacion backend:** .\app\Http\Controllers\API\AuthController.php  - register()
- **Petición en el frontend:** frontend\src\vue\App.js - signupPetition()
- **Ruta API:** /api/register  
- **TODOs:**
  - [ ] Enviar mail de confirmación
  - [ ] Comprobar que el usuario no esté cogido ya
  - [ ] Minimo de caracteres en al contraseña

## Enviar solicitud amistad
- **Tablas implicadas:** users y friend_resquests
- **Funcionamiento:**  
  Cuando un usuario envía una solicitud de amistad a un usuario el backend busca el id del usuario al se quiere enviar la solicitud y si lo encuentra crear una fila friend_resquests donde **requester_id** es quien envía la solicitud y **addressee_id** es a quien va dirigida
- **Localizacion backend:** backend\app\Http\Controllers\API\UserController.php  - sendRequest()
- **Petición en el frontend:** frontend\src\vue\App.js - sendFriendRequest()
- **Ruta API:** /api/user/sendrequest 
- **TODOs:**
  - [ ] Dar feedback al usuario (en el frontedn) cuando el servidor responda a la petición
  - [ ] Escribir bien el nombre de la tabla de la base de datos: friend_resquests -> friend_requests
  - [ ] Comprobar que no se haya enviado ya una solicitud de amistad igual
  - [ ] Comprobar que no sean ya amigos
  - [ ] Comprobar que no se esté enviando solicitu a sí mismo
 
## Obtener lista de peticiones
- **Tablas implicadas:** users y friend_resquests
- **Funcionamiento:**  
  Devuelve los usuarios que hayan enviado una solicitud de amistad al id del usuario que hace la consulta. Mediante window.setInterval se llamada esta función cada X segundos al logarte o al recargar la página si estás logado (App.js - mounted()) para que recibir nuevas peticiones de amistad.
- **Localizacion backend:** backend\app\Http\Controllers\API\UserController.php  - listRequests()
- **Petición en el frontend:** frontend\src\vue\App.js - updateFriendRequest()
- **Ruta API:** /api/user/listrequests 
- **TODOs:**
  - [ ] Comprobar que se actualiza la lista de peticiones cuando tengas abierta la lista de peticiones y no tienes que cerrarla y volverla a abrir para ver los cambios

## Aceptar / Denegar solicitud amistad
- **Tablas implicadas:** users, friend_resquests y friend_lists
- **Funcionamiento:**  
  Si aceptas la solcitud se inserta una fila en friend_lists y se borra la fila en friend_resquests, sino solo se borra la fila en friend_resquests
- **Localizacion backend:** backend\app\Http\Controllers\API\UserController.php  - handleRequest()
- **Petición en el frontend:** frontend\src\vue\App.js - friendRequest()
- **Ruta API:** /api/user/handlerequest/{friend}/{response}
- **TODOs:**
  - [ ] Cambiar el nombre de la función del frontend de friendRequest() a handleRequest() y dejar de enviar el parametro username
  - [ ] Comprobar que el usuario exista
  - [ ] Comprobar que ese usuario haya enviado una solicitud al usuario que acepta / deniega
  - [ ] Devolver información al frontend con $this->handleResponse) y que borre la notificación
  
## Obtener lista de amigos
- **Tablas implicadas:** users
- **Localizacion backend:** backend\app\Http\Controllers\API\UserController.php  - friendList()
- **Petición en el frontend:** frontend\src\vue\App.js - updateFriendList()
- **Ruta API:** /api/friendlist
- **TODOs:**
  - [ ] Cambiar la ruta de api a /api/user/friendlist
  - [ ] Cambiar el nombre de la funcion en el backend de friendList a getFriendList o algo así
  - [ ] Cambiar la peticion de post a get (en api.php)
  
## Actualizar foto de perfil
- **Tablas implicadas:** users
- **Localizacion backend:** backend\app\Http\Controllers\API\UserController.php  - updatePhoto()
- **Petición en el frontend:** frontend\src\vue\App.js - updatePhoto()
- **Ruta API:** /api/user/update/photo
- **TODOs:**
  - [ ] Comprobar se haya enviado una foto de perfil válida (en el backend)
