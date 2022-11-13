Just for fun. Not for production!
-------

# HTML parser.

Install
-------

```bash
$ composer require shusharin/simple-html-parser:dev-main
```

Basic Usage
-----

```php
require "vendor/autoload.php";

use SimpleHtmlParser\Parser;
$result = Parser::make()->parseFromUrl('https://www.google.com/');
echo 'Total tags: ' . $res->count() . '.';
echo PHP_EOL; // '<br>'
$uniqTags = array_unique($res->map(fn(HtmlNode $node) => $node->tag()->name())->toArray());
echo 'Tags list: ' . implode(', ', $uniqTags) . '.'
```

Test example
-----

```php
require "vendor/autoload.php";

use SimpleHtmlParser\Main;
echo Main::make()->handle('https://www.google.com/');
```