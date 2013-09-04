<?php

/*
 * This file is part of the Blackperson package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * BlackEngine Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('black_organization');

        $supportedDrivers = array('mongodb', 'orm');

        $rootNode
            ->children()

                ->scalarNode('db_driver')
                    ->isRequired()
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The database driver must be either \'mongodb\', \'orm\'.')
                    ->end()
                ->end()

                ->scalarNode('organization_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('postaladdress_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('organization_manager')
                    ->defaultValue('Black\\Bundle\\OrganizationBundle\\Doctrine\\OrganizationManager')
                ->end()

            ->end();

        $this->addOrganizationSection($rootNode);
        $this->addPostalAddressSection($rootNode);

        return $treeBuilder;
    }

    private function addOrganizationSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('organization')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('name')->defaultValue('black_organization_organization_form')->end()
                                ->scalarNode('type')->defaultValue(
                                    'Black\\Bundle\\OrganizationBundle\\Form\\Type\\OrganizationType'
                                )->end()
                                ->scalarNode('handler')->defaultValue(
                                    'Black\\Bundle\\OrganizationBundle\\Form\\Handler\\OrganizationFormHandler'
                                )->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    private function addPostalAddressSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('postaladdress')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue(
                                    'Black\\Bundle\\OrganizationBundle\\Form\\Type\\PostalAddressType'
                                )->end()
                                ->scalarNode('address_list')->defaultValue(
                                    'Black\\Bundle\\CommonBundle\\Form\\ChoiceList\\AddressList'
                                )->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
