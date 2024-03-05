# Laravel Scout

Filtrador de Búsqueda en laravel

<a name="top"></a>

## Indice de Contenidos.

-   [Instalación de scout](#item1)

**`NOTA::` Una vez instalado el nuevo proyecto y antes de empezar a instalar scout, le he dado un poco de aspecto al proyecto, he instalado y configurado jquery, scss y bootstrap, ademas de crear un layout de plantilla con algo de css para estructurar las vistas y unos componentes como el header, footer y un buscador ademas un alert y también para poder hacer pruebas en este proyecto he creado un modelo con su controlador, seeder, factory y la migración correspondiente.**

<a name="item1"></a>

## Instalación de scout.

> Typee: en la Consola:

```console

composer require laravel/scout

```

> Typee: en la Consola:

```console

php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"

```

### Añadir Searchable al modelo.

> Abrimos nuestro modelo yo lo he llamado `post` y le añadimos el trait `Searchable`:

```php

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;
}

```

[Subir](#top)

> Pues eso es todo espero que sirva. 👍

[Subir](#top)
