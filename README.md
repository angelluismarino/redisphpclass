[TOC]
#### Simple clase php para gestionar redis

Funciones

[Iniciamos la conexión estableciendo el puerto por defecto]
- conecta();

[Enviamos datos asignandole un key y su valor]
- put();

[Obtenemos datos mediante el key indicado]
- getkey();

#### Ejemplos de uso


```php
<?php
# iniciamos la clase
$redi = new RedDis();
# Nos conectamos al servidor redis, el puerto 6379 ya está establecido por defecto.
$redi->conecta('127.0.0.1');
# Publicar contenido en redis
$redi->put('clave','tiempo en segundos','valor a recuperar');
?>
```
