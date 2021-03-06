<?php

/**
 * MIT License. This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Propel\Common\Config\Loader;

use Symfony\Component\Config\Loader\LoaderResolver as BaseLoaderResolver;

/**
 * Class LoaderResolver
 *
 * @author Cristiano Cinotti
 */
class LoaderResolver extends BaseLoaderResolver
{
    /**
     * @param array<\Symfony\Component\Config\Loader\LoaderInterface>|null $loaders
     */
    public function __construct(?array $loaders = null)
    {
        if ($loaders === null) {
            $loaders = [
                new IniFileLoader(),
                new PhpFileLoader(),
                new XmlFileLoader(),
                new YamlFileLoader(),
                new JsonFileLoader(),
            ];
        }

        parent::__construct($loaders);
    }
}
