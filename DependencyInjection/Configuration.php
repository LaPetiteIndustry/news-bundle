<?php

namespace Lpi\NewsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lpi_news');
        $this->addModelSection($rootNode);
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }

    /**
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     */
    private function addModelSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->arrayNode('class')
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('news')->defaultValue('Application\\Lpi\\NewsBundle\\Entity\\News')->end()
                ->scalarNode('zone_has_news')->defaultValue('Application\\Lpi\\NewsBundle\\Entity\\ZoneHasNews')->end()
                ->scalarNode('zone')->defaultValue('Application\\Lpi\\KernelBundle\\Entity\\Zone')->end()
            ->end()
            ->end()
            ->end();
    }
}
