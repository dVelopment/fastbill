<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 19:42
 */

use Composer\Autoload\ClassLoader;

$file = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($file)) {
    throw new \RuntimeException('Install dependencies to run test suite. "php composer.phar install --dev"');
}

/** @var ClassLoader $loader */
$loader = require $file;

// register doctrine annotations
\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', __DIR__ . '/../vendor/jms/serializer/src');