 TimesApp
==========

A free and open source web application for tracking your time while working.

Project status: **In progress**

Project website: [http://darkbox.github.io/TimesApp/](http://darkbox.github.io/TimesApp/)


## Requirements

In order to install TimesApp you'll need to accomplish some requirements:

- Web server (Apache 2 recomended)
	- mod_rewrite active
	- open SSL
- Mysql database server
- SMTP server for mailing

## Installation

1. Download latest TimesApp from the [release page](http://darkbox.github.io/TimesApp/ "download").

2. Deploy it on a web server such as Apache 2.

3. Permissions (If you are a windows user skip this step): 
TODO

4. Create database and configure their params in `app/Config/database.php`.
``` php
public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'timesapp',
		'password' => 'timesapp',
		'database' => 'timesapp',
		'prefix' => '',
		'encoding' => 'utf8',
	);
```


And that's all, you'll be able to access from http://[hostname]:[port]/TimesApp/ or your custom domain using your web browser.

## Configuration
The default administrator account is **admin** and password is **admin**. 

**Note:** It's highly recommended to change it at first login for security reasons. Otherwise the minions may take control of the application! You don't want that to happen do you? ;) 

### Settings
TODO

#### Mail
TODO

#### Security
TODO

## Help
If you have trouble setting up or using this app, please [contact us](http://example.com "contact").


##TODO LIST
- [x] Enumeración de las facturas
- [x] Cambiar orden de columnas en Invoices y agregar links
- [x] Corregir color de fondo en los permalinks 
- [x] Mostrar estado de la factura en el permalink
- [x] No borrar facturas ya enviadas
- [x] Aviso de cierre en el temporizador de horas
- [x] Paginación de horas en Project view
- [x] Conversor/Asistente de H:M:S a horas en formato decimal
- [x] Terminar formulario user/add
- [x] Dar formato al formulario clients/edit
- [x] Tile de payments
- [x] Mostrar más información el la vista de proyectos
- [x] Restringir permisos a los usuarios con role 'minion'
- [x] Mejorar formato PDF al cambiar de página
- [x] Corregir input Tax de Client/add
- [x] Corregir validación abide de emails
- [x] Permitir editar su propio perfil de usuario
- [x] Recuperar contraseñas
- [x] Cambiar tooltip de billed a billed en vez de active
- [x] Revisar diversos mensajes
- [x] Mejorar formato de emails
- [x] Coger moneda de settings para mostrar en presets
- [x] Select de currency_code y currency_symbol en settings e invoices
- [x] Repetir contraseña en perfil
- [x] Añadir validación a añadir horas para que sea un número obligatoriamente
- [x] Añadir longitud mínima a note de añadir horas
- [ ] Obligar a cambiar la contraseña al primer uso (Admin)
- [ ] Editar facturas cuando el estado es borrador
- [ ] Cambiar estado a due en facturas cuando ha pasado el tiempo
- [ ] Agregar desplegables con los países
- [ ] Personalizar excepciones (404, 502, etc)
- [ ] Eliminar posibilidad de crear facturas a minion 

##TODO DOC LIST
- [ ] Documentar descargas de la aplicación
- [ ] Configuración SMTP + SSL para el envío de emails
- [ ] Expresiones regulares
- [ ] Uso e instalación
- [ ] Cuestiones de seguridad
- [ ] Profundizar en la legislación
