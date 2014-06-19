 TimesApp
==========

A free and open source web application for tracking your time while working.

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
**Be sure** you have activated *Event scheduler status* to **ON** (root permissions to perform this action).


And that's all, you'll be able to access from http://[hostname]:[port]/TimesApp/ or your custom domain using your web browser.

## Configuration
The default administrator account is **admin@timesapp.com** and password is **Admin1234**. 

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
