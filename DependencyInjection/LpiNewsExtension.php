<?php

namespace Lpi\NewsBundle\DependencyInjection;

use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LpiNewsExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('admin.xml');

        $container->setParameter('lpi.news.admin.zone_has_news.entity', $config['class']['zone_has_news']);
        $container->setParameter('lpi.news.admin.news.entity', $config['class']['news']);
        $this->registerDoctrineMapping($config);
    }
    /**
     * @param array $config
     *
     * @return void
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['news'], 'mapOneToMany', array(
            'fieldName'     => 'zoneHasNews',
            'targetEntity'  => $config['class']['zone_has_news'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'news',
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['zone_has_news'], 'mapManyToOne', array(
            'fieldName'     => 'zone',
            'targetEntity'  => $config['class']['zone'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => NULL,
            'inversedBy'    => 'zoneHasNews',
            'joinColumns'   =>  array(
                array(
                    'name'  => 'zone_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['zone_has_news'], 'mapManyToOne', array(
            'fieldName'     => 'news',
            'targetEntity'  => $config['class']['news'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => NULL,
            'inversedBy'    => 'zoneHasNews',
            'joinColumns'   => array(
                array(
                    'name'  => 'news_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['zone'], 'mapOneToMany', array(
            'fieldName'     => 'zoneHasNews',
            'targetEntity'  => $config['class']['zone_has_news'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'zone',
            'orphanRemoval' => true,
            'orderBy'       => array(
                'position'  => 'ASC',
            ),
        ));
    }
}
