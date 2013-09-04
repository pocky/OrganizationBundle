<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Form\EventListener;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

/**
 * Class SetOrganizationDataSubscriber
 *
 * @package Black\Bundle\OrganizationBundle\Form\EventListener
 */
class SetOrganizationDataSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $factory;
    
    /**
     * @var
     */
    private $dbDriver;

    /**
     * @var
     */
    private $class;

    /**
     * @param FormFactoryInterface $factory
     * @param                      $dbDriver
     * @param                      $class
     */
    public function __construct(FormFactoryInterface $factory, $dbDriver, $class)
    {
        $this->factory = $factory;
        $this->dbDriver = $dbDriver;
        $this->class = $class;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array();
    }
}
