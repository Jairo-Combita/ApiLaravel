



## Logica de desarrollo

Teniendo en cuenta que una aplicación puede ser tan robusta como asi lo requerimientos funcionales y no funcionales lo determinen,
es necesario no siempre recargar el navegador debido a la cantidad de recursos que se puedan requerir. Por ende, se decide trabajar en una sola vista.

Inicialmente se crea la interfaz principal y su respectivo controlador. En el controlador utilizamos HTTP Client el cual nos permite el consumo de las diferentes Apis de una forma mas amigable en laravel. En la vista se envian los diferentes parametros de las consultas a requerir mediante ajax, esta la recibe el controlador y mediante los diferentes metodos GET, POST, PUT Y DELETE se consume la Appi expuesta en https://jsonplaceholder.typicode.com/.

Cuando se recibe la respuesta de la petición realizada, se transforma en un arreglo y este es regresado a la vista la cual se encarga de su renderizado.