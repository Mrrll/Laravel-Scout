# Laravel Scout

Filtrador de Búsqueda en laravel

<a name="top"></a>

## Indice de Contenidos.

-   [Instalación de Scout](#item1)
-   [Configuración de Queues](#item2)
-   [Configuración de índices de modelos](#item3)

**`NOTA::` Una vez instalado el nuevo proyecto y antes de empezar a instalar scout, le he dado un poco de aspecto al proyecto, he instalado y configurado jquery, scss y bootstrap, ademas de crear un layout de plantilla con algo de css para estructurar las vistas y unos componentes como el header, footer y un buscador ademas un alert y también para poder hacer pruebas en este proyecto he creado un modelo con su controlador, seeder, factory y la migración correspondiente.**

<a name="item1"></a>

## Instalación de Scout.

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

<a name="item2"></a>

## Configuración de Queues.

> Abrimos el archivo `config/queue.php` y cambiamos `sync` por `database`:

```php

'default' => env('QUEUE_CONNECTION', 'database'),

```

**`NOTA::` Podemos cambiarlo en el `.env`.**

> Typee: en la Consola:

```console

php artisan queue:work

```

**`NOTA::` Este comando ejecuta un proceso en segundo plano que procesa los trabajos en la cola.**

> Typee: en la Consola:

```console

php artisan queue:table

```

> Typee: en la Consola:

```console

php artisan migrate:fresh --seed

```

> Abrimos el archivo `config/scout.php` y cambiamos driver => `algolia` por `database` y queue => `true`:

```php

'driver' => env('SCOUT_DRIVER', 'database'),
'queue' => env('SCOUT_QUEUE', true),

```

**`NOTA::` Podemos cambiarlo en el `.env`.**

[Subir](#top)

## Configuración de índices de modelos

> Abrimos el modelo `post.php`

```php

/**
 * Get the name of the index associated with the model.
 */
public function searchableAs(): string
{
    return 'posts_index';
}

/**
 * Get the indexable data array for the model.
 *
 * @return array<string, mixed>
 */
public function toSearchableArray()
{
    return [
        'id' => (int) $this->id,
        'title' => $this->title,
        'description' => (float) $this->description,
    ];
}
/**
 * Get the value used to index the model.
 */
public function getScoutKey(): mixed
{
    return $this->slug;
}

/**
 * Get the key name used to index the model.
 */
public function getScoutKeyName(): mixed
{
    return 'slug';
}

```

[Subir](#top)


> Pues eso es todo espero que sirva. 👍

[Subir](#top)
