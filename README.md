# Doctrine Collection Extractor

## Installing

Via Composer

```
composer require vaneves/collection-extractor
```

## Usage

``` php

use Silex\Application;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Vaneves\Doctrine\CollectionExtractor;

$app = new Application();
$app['debug'] = true;

$app->get('/blog/posts', function () use ($app) {

	$em = $app['orm.em'];
	
	$results = $em->getRepository('App\Entities\Post')->findAll();

	$hydrator = new CollectionExtractor(new DoctrineHydrator($em));

	return $app->json($hydrator->extract($results));
});

$app->run();

```