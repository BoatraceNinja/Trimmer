# Boatrace Ninja Trimmer

[![Latest Stable Version](https://poser.pugx.org/boatrace/trimmer/v/stable)](https://packagist.org/packages/boatrace/trimmer)
[![Latest Unstable Version](https://poser.pugx.org/boatrace/trimmer/v/unstable)](https://packagist.org/packages/boatrace/trimmer)
[![License](https://poser.pugx.org/boatrace/trimmer/license)](https://packagist.org/packages/boatrace/trimmer)

## Installation
```
$ composer require boatrace/trimmer
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Ninja\Trimmer;

var_dump(Trimmer::trim(null)); // NULL
var_dump(Trimmer::trim(' 競艇 ')); // string(6) "競艇"

var_dump(Trimmer::ltrim(null)); // NULL
var_dump(Trimmer::ltrim(' 競艇 ')); // string(7) "競艇 "

var_dump(Trimmer::rtrim(null)); // NULL
var_dump(Trimmer::rtrim(' 競艇 ')); // string(7) " 競艇"
```

## License
The Boatrace Ninja Trimmer is open source software licensed under the [MIT license](LICENSE).
