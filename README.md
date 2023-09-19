Una vez que hayas clonado el repositorio, asegúrate de cumplir con los siguientes requisitos:

Crea un archivo .env y configura las siguientes variables de entorno:

MYSQL_DATABASE=MyDb
MYSQL_USER=
MYSQL_PASSWORD=Root123
MYSQL_ROOT_PASSWORD=Root123
PHP_PORT=8080
PHPMYADMIN_PORT=8010
PHP_VOLUMES=./src/:/var/www/html
TZ=America/Argentina/Buenos_Aires
SQL_DATABASE=Game
MYSQL_SERVER=db

Nota: Deja el campo MYSQL_USER vacío por ahora.

Abre la terminal y verifica que no haya ningún contenedor en ejecución utilizando el siguiente comando:

sudo docker ps

Si encuentras algún contenedor en ejecución, detenlo utilizando:
sudo docker-compose down

Luego, inicia los contenedores con:
sudo docker-compose up
No uses la bandera -d para que se ejecuten en primer plano. Una vez que estén en funcionamiento, presiona Ctrl + C para detener el proceso.

Ahora, ve al archivo .env y agrega la siguiente línea en la variable MYSQL_USER:
MYSQL_USER=root
Esto evitará conflictos al levantar usuarios más adelante.

Dirígete a http://localhost:8010 en tu navegador. Inicia sesión con las siguientes credenciales:
Usuario: root
Contraseña: Root123
Una vez dentro de phpMyAdmin, crea una nueva base de datos llamada "Game" con la codificación "utf8_general_ci".

Importa el archivo "Game.sql" que recibiste por correo electrónico. Puede que aparezca un mensaje de error, pero no te preocupes, esto es normal.

Ahora puedes acceder al juego en http://localhost:8080. Se te pedirá ingresar un nombre. Si ingreses "Franco", verás que ya tienes una puntuación máxima. Si juegas y superas esta puntuación, al perder y hacer clic en el botón "Restart", tu nuevo récord se guardará.

Si inicias sesión con un nuevo usuario, se creará un perfil con una puntuación inicial de 0.

¡Ahora puedes disfrutar del juego!