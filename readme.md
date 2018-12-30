# Twig Widont filter

Provides a `widont` filter for Twig.

## Installation

When instantiating your Twig instance, add the WidontTwigExtension to Twig via the `addExtension()` method. Like so:

```php
<?php
declare(strict_types=1);

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use buzzingpixel\twigwidont\WidontTwigExtension;

$twig = new Environment(new FilesystemLoader('/path/to/templates'), [
    'debug' => true,
    'cache' => '/path/to/cache',
    'strict_variables' => true,
]);

$twig->addExtension(new WidontTwigExtension());
```

## Usage

```twig
{{ myVar|widont }}

{% filter widont %}
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cumque dolorem enim error facere fuga hic magni nulla quaerat, quas, quidem ratione repellat voluptatem. Alias aperiam beatae consectetur qui sequi!
{% endfilter %}
```

## License

Copyright 2018 BuzzingPixel, LLC

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0).

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
