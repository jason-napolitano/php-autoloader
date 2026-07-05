# PHP Autoloader
> This is a PSR-4–compliant class loader that automatically discovers and indexes classes within registered
> namespace directories. As namespaces are registered, it recursively scans their directories, builds an optimized class
> map for class resolution, and tracks all discovered PHP files without requiring repeated filesystem lookups during
> autoloading. In addition to loading classes, it provides rich introspection capabilities, including access to registered
> namespaces, discovered classes, available files, loaded files, unloaded files, and namespace hierarchies.

## How-to Guide:

### Building the autoloader

```php
use PHPAutoloader\Autoloader;

$autoloader = new  Autoloader();
```

### Registering the autoloader

```php
$autoloader->register();
```

### Adding to the autoloader

#### Namespaces

```php
$autoloader
    ->addNamespace('AppOne', __DIR__ . '/app-one')
    ->addNamespace('AppTwo', __DIR__ . '/app-two');
```

#### Classes

```php
$autoloader
    ->addClassMap('NewClassOne', __DIR__ . '/new-app-one')
    ->addClassMap('NewClassTwo', __DIR__ . '/new-app-two');
```

### Retrieving from the autoloader

#### Prefix array

```php
$autoloader->prefixes();
```

#### Loaded classes

```php
$autoloader->getCLasses(?subNamespace: '...'); // => array
```

#### Sub-namespaces

```php
$autoloader->getSubNamespaces(namespace: '...'); // => array
```

#### Class count

```php
$autoloader->getClassCount(); // => int
```

#### Class checker

```php
$autoloader->hasClass(class: '...'); // => bool
```

#### Class file

```php
$autoloader->getClassFile(class: '...'); // => string|null
```

# License

MIT License

Copyright (c) 2026 Jason Napolitano

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
