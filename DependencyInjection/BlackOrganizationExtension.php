<?php

namespace Black\Bundle\OrganizationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * BlackEngineExtension
 */
class BlackOrganizationExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor      = new Processor();
        $configuration  = new Configuration();
        $config         = $processor->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (!isset($config['db_driver'])) {
            throw new \InvalidArgumentException('You must provide the black_organization.db_driver configuration');
        }

        try {
            $loader->load(sprintf('%s.xml', $config['db_driver']));
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException(
                sprintf('The db_driver "%s" is not supported by organization', $config['db_driver'])
            );
        }

        $this->remapParametersNamespaces(
            $config,
            $container,
            array(
                '' => array(
                    'db_driver'             => 'black_organization.db_driver',
                    'organization_class'    => 'black_organization.organization.model.class',
                    'organization_manager'  => 'black_organization.organization.manager',
                    'postaladdress_class'   => 'black_organization.postaladdress.model.class'
                )
            )
        );

        if (!empty($config['organization'])) {
            $this->loadOrganization($config['organization'], $container, $loader);
        }

        if (!empty($config['postaladdress'])) {
            $this->loadPostalAddress($config['postaladdress'], $container, $loader);
        }
    }

    private function loadOrganization(array $config, ContainerBuilder $container, XmlFileLoader $loader)
    {
        foreach (array('organization') as $basename) {
            $loader->load(sprintf('%s.xml', $basename));
        }

        $this->remapParametersNamespaces(
            $config,
            $container,
            array(
                'form' => 'black_organization.organization.form.%s',
            )
        );
    }

    private function loadPostalAddress(array $config, ContainerBuilder $container, XmlFileLoader $loader)
    {
        $loader->load('postalAddress.xml');

        $this->remapParametersNamespaces(
            $config,
            $container,
            array(
                'form' => 'black_organization.postaladdress.form.%s',
            )
        );
    }

    protected function remapParameters(array $config, ContainerBuilder $container, array $map)
    {
        foreach ($map as $name => $paramName) {
            if (array_key_exists($name, $config)) {
                $container->setParameter($paramName, $config[$name]);
            }
        }
    }

    protected function remapParametersNamespaces(array $config, ContainerBuilder $container, array $namespaces)
    {
        foreach ($namespaces as $ns => $map) {

            if ($ns) {
                if (!array_key_exists($ns, $config)) {
                    continue;
                }
                $namespaceConfig = $config[$ns];
            } else {
                $namespaceConfig = $config;
            }
            if (is_array($map)) {
                $this->remapParameters($namespaceConfig, $container, $map);
            } else {
                foreach ($namespaceConfig as $name => $value) {
                    $container->setParameter(sprintf($map, $name), $value);
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'black_organization';
    }
}
