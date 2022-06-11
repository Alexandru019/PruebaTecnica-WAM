# PruebaTecnica-WAM
<h3>Descripcíon</h3><br>
Desarrolla una aplicación que obtenga de un servidor externo un listado de reservas realizadas en
formato CSV. La aplicación tiene que mostrar el listado de las reservas y permitir buscar por un texto libre que
pueda aparecer en los campos del listado.
Por último, tiene que poderse descargar el listado en formato json.<br><br>

<b>URL</b> http://tech-test.wamdev.net/<br>
<b>CAMPOS</b> Localizador;Huésped;Fecha de entrada;Fecha de salida;Hotel;Precio;Posibles Acciones

<h3>Soluciones</h3>

<ul>
  <li><b>CODEIGNITER</b></li>  
  <p>He escogido Codeigniter en la versión 3.1.13 ya que es un framework bastante ligero que casi no requiere de configuración</p>
  <h4>Explicación</h4>
  <p>Se carga el controlador <b>Home</b>, en la función index se hace uso del <i>helper Curl</i>, el cual simplifica la llamada a la página donde se encuentra alojada la información y devuelve el contenido de esta.</p>
  <p>Con la información cargada, separamos la información en filas y tratamos las filas para añadirlas a un array asociativo con el nombre de los campos</p>
  <p>Se envía a la vista <b>Home</b> un array con los nombres de los campos a mostrar y el array con los datos tratados</p>
  <p>En la vista se hace uso de la librería <b>DataTables</b> para mostrar los datos</p>
  <p>Para descargar las reservas, se han creado 2 botones. El primero descargar todas las reservas, el segundo solo descarga las filas filtradas</p>
</ul>
