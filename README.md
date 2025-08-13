# Boatrace Ninja Trimmer

[![tests](https://github.com/BoatraceNinja/Trimmer/actions/workflows/tests.yml/badge.svg)](https://github.com/BoatraceNinja/Trimmer/actions/workflows/tests.yml)
[![php](https://poser.pugx.org/boatrace/trimmer/require/php)](https://packagist.org/packages/boatrace/trimmer)
[![stable](https://poser.pugx.org/boatrace/trimmer/v/stable)](https://packagist.org/packages/boatrace/trimmer)
[![unstable](https://poser.pugx.org/boatrace/trimmer/v/unstable)](https://packagist.org/packages/boatrace/trimmer)
[![license](https://poser.pugx.org/boatrace/trimmer/license)](https://packagist.org/packages/boatrace/trimmer)

## Installation
```
composer require boatrace/trimmer
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Ninja\Trimmer\Trimmer;

var_dump(Trimmer::trim(' 競艇 ')->getValue()); // string(6) "競艇"
var_dump(Trimmer::trim(' 競艇 ', '競')->getValue()); // string(3) "艇"
var_dump(Trimmer::trim(' 競艇 ', '艇')->getValue()); // string(3) "競"
var_dump(Trimmer::trim(' 競艇 ', '競艇')->getValue()); // string(0) ""
var_dump(Trimmer::trim(' @競艇@ ', "\x40")->getValue()); // string(6) "競艇"
var_dump(Trimmer::trim(' ＠競艇＠ ', "\x40")->getValue()); // string(12) "＠競艇＠"
var_dump(Trimmer::trim(' @競艇 ', "\x40")->getValue()); // string(6) "競艇"
var_dump(Trimmer::trim(' ＠競艇 ', "\x40")->getValue()); // string(9) "＠競艇"
var_dump(Trimmer::trim(' 競艇@ ', "\x40")->getValue()); // string(6) "競艇"
var_dump(Trimmer::trim(' 競艇＠ ', "\x40")->getValue()); // string(9) "競艇＠"
var_dump(Trimmer::trim(null)->getValue()); // NULL

var_dump(Trimmer::ltrim(' 競艇 ')->getValue()); // string(7) "競艇 "
var_dump(Trimmer::ltrim(' 競艇 ', '競')->getValue()); // string(4) "艇 "
var_dump(Trimmer::ltrim(' 競艇 ', '艇')->getValue()); // string(7) "競艇 "
var_dump(Trimmer::ltrim(' 競艇 ', '競艇')->getValue()); // string(0) ""
var_dump(Trimmer::ltrim(' @競艇@ ', "\x40")->getValue()); // string(8) "競艇@ "
var_dump(Trimmer::ltrim(' ＠競艇＠ ', "\x40")->getValue()); // string(13) "＠競艇＠ "
var_dump(Trimmer::ltrim(' @競艇 ', "\x40")->getValue()); // string(7) "競艇 "
var_dump(Trimmer::ltrim(' ＠競艇 ', "\x40")->getValue()); // string(10) "＠競艇 "
var_dump(Trimmer::ltrim(' 競艇@ ', "\x40")->getValue()); // string(8) "競艇@ "
var_dump(Trimmer::ltrim(' 競艇＠ ', "\x40")->getValue()); // string(10) "競艇＠ "
var_dump(Trimmer::ltrim(null)->getValue()); // NULL

var_dump(Trimmer::rtrim(' 競艇 ')->getValue()); // string(7) " 競艇"
var_dump(Trimmer::rtrim(' 競艇 ', '競')->getValue()); // string(7) " 競艇"
var_dump(Trimmer::rtrim(' 競艇 ', '艇')->getValue()); // string(4) " 競"
var_dump(Trimmer::rtrim(' 競艇 ', '競艇')->getValue()); // string(0) ""
var_dump(Trimmer::rtrim(' @競艇@ ', "\x40")->getValue()); // string(8) " @競艇"
var_dump(Trimmer::rtrim(' ＠競艇＠ ', "\x40")->getValue()); // string(13) " ＠競艇＠"
var_dump(Trimmer::rtrim(' @競艇 ', "\x40")->getValue()); // string(8) " @競艇"
var_dump(Trimmer::rtrim(' ＠競艇 ', "\x40")->getValue()); // string(10) " ＠競艇"
var_dump(Trimmer::rtrim(' 競艇@ ', "\x40")->getValue()); // string(7) " 競艇"
var_dump(Trimmer::rtrim(' 競艇＠ ', "\x40")->getValue()); // string(10) " 競艇＠"
var_dump(Trimmer::rtrim(null)->getValue()); // NULL
```

## License
The Boatrace Ninja Trimmer is open source software licensed under the [MIT license](LICENSE).
