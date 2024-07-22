Integrantes:
Misael Amarilla<br>
Víctor Cardozo<br>
Matías Orzusa<br>
José Rojas<br>
Sergio Cáceres<br>

El presente proyecto es un CRUD con la funciones de Cargar un nuevo usuario, editarlo y eliminarlo utilizando una base de datos llamada "gestion_personas".<br>
Para realizarlo en tiempo real sin tener que actualizar la pagina, se utiliza ajax en javascript y las respectivas apis para recuperar y modificiar la base de datos.<br>
<br>
En Create.php se obtienen los datos ingresados por el usuario, se conecta con la base de datos, mediante mysqli y si conexión se realiza, se verifican los datos, se insertan en la base de datos y se cierra la conexión a la base de datos.<br>
En Delete.php se conecta con la base de datos, al pulsar el boton de mande el ID de la persona a eliminar y elimina de la base de datos el ID indicado.<br>
En Read.php se conecta a la base de datos, y se consulta todas las filas almacenadas en la base de datos para dibujar la tabla del CRUD.<br>
En Update.php se conecta a la base de datos, recupera los datos y los precarga para editar, una vez guardados los datos editados, lo inserta en la base de datos, con los nuevos datos.<br>
