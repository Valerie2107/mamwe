# mamwe

## Structure du projet

### Models et autoload

Lorsque la DB sera faite, et qu'on souhaitera créer des mappings des tables en objets, il faudra que ces classes soient des extends de la classe abstraite `model/abstractClass/MappingAbstract.php`.

Son nom, composé de son `namespace` est `model\abstractClass\MappingAbstract`. 

L'`autoload` ajouté dans `index.php` (pas celui qui serait géré par composer, qui est configuré dans le fichier `composer.json` à la racine du projet) permettra le chargement de nos classes en fonction de leur namespace.

```PHP
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require_once '../' .$class . '.php';
});
```

! Il a besoin du PATH_ROOT, qui est défini dans `config.php` et `config.php.bak`.

Exemple de classe qui étend `MappingAbstract` :

#### model/model.php

```PHP
<?php
namespace model;

use model\abstractClass\MappingAbstract;

class model extends MappingAbstract
{
    public function __toString(): string
    {
        return "class model.php enfants de MappingAbstract.php";
    }
}
```

