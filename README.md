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
- SMTP server for mailing (You can use services like gmail)

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

#### Mail
In order to use some features, like sending invoices by email, or be able to reset your password, you need to configure the SMTP options of the app.
You have to do this as administrator since you need to access the application Settings, Email tab.  
Under “**Email Options**” you can configure Default Subject and Default message of your invoice Email. 
You can always change those by the time you’re generating the invoice email.  
Under “**Smtp Settings**” you have the following fields:
* **Email username:** email address of SMTP sender, like noreply@yourdomain.com , i.e. if you’re using gmail as SMTP, it would be emailaddress@gmail.com .
* **Email password:** SMTP password of the email address you put as Email username.
* **Email host:** your SMTP host, if it uses ssl it must start with ssl://whatever.
* **Email port:** your SMTP port.
* **Email sender:** this is the email address that will appear as sender of the email. Note this is **NOT** the Email username of your SMTP.

**Note:** Don’t forget to enable the php_openssl extension if you’re using a SSL SMTP. 

#### Security (optional)
TimesApp comes with two pairs of keys (salt & seed) for encryption purpose but you can change it to one you feel more comfortable and secure.
To do that edit the next lines located at `app/Config/core.php`.
``` php
/**
 * A random string used in security hashing methods.
 */
    Configure::write('Security.salt', 'fc7f678b23asdf765as76d4f567asd442890df5e9f');

/**
 * A random numeric string (digits only) used to encrypt/decrypt strings.
 */
    Configure::write('Security.cipherSeed', '7682345634563456345981245');
```

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
- [x] Eliminar posibilidad de crear facturas a minion 
- [x] Meter efecto de scroll a la documentación
- [x] Personalizar excepciones (404, 500)
- [x] Advertir cambiar la contraseña al primer uso (Admin)
- [ ] Editar facturas cuando el estado es borrador
- [ ] Cambiar estado a due en facturas cuando ha pasado el tiempo
- [ ] Agregar desplegables con los países


##TODO DOC LIST
- [x] Documentar descargas de la aplicación
- [x] Configuración SMTP + SSL para el envío de emails
- [ ] Expresiones regulares
- [ ] Uso e instalación
- [ ] Cuestiones de seguridad
- [ ] Profundizar en la legislación


