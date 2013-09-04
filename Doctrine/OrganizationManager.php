<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Doctrine;

use Black\Bundle\OrganizationBundle\Model\OrganizationManagerInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class OrganizationManager
 *
 * @package Black\Bundle\OrganizationBundle\Organization
 */
class  OrganizationManager implements OrganizationManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * Constructor
     *
     * @param ObjectManager $dm
     * @param string        $class
     */
    public function __construct(ObjectManager $dm, $class)
    {
        $this->manager     = $dm;
        $this->repository  = $dm->getRepository($class);

        $metadata          = $dm->getClassMetadata($class);
        $this->class       = $metadata->name;
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param object $model
     *
     * @throws \InvalidArgumentException
     */
    public function persist($model)
    {
        if (!$model instanceof $this->class) {
            throw new \InvalidArgumentException(gettype($model));
        }

        $this->getManager()->persist($model);
    }

    /**
     * Flush
     */
    public function flush()
    {
        $this->getManager()->flush();
    }

    /**
     * Remove the model
     * 
     * @param object $model
     *
     * @throws \InvalidArgumentException
     */
    public function remove($model)
    {
        if (!$model instanceof $this->class) {
            throw new \InvalidArgumentException(gettype($model));
        }
        $this->getManager()->remove($model);
    }

    /**
     * Save and Flush a new model
     *
     * @param mixed $model
     */
    public function persistAndFlush($model)
    {
        $this->persist($model);
        $this->flush();
    }

    /**
     * Remove and flush
     * 
     * @param mixed $model
     */
    public function removeAndFlush($model)
    {
        $this->getManager()->remove($model);
        $this->getManager()->flush();
    }

    /**
     * Create a new model
     *
     * @return $config object
     */
    public function createInstance()
    {
        $class  = $this->getClass();
        $model = new $class;

        return $model;
    }

    /**
     * @return string
     */
    protected function getClass()
    {
        return $this->class;
    }

    /**
     * @return array
     */
    public function findOrganizations()
    {
        return $this->getRepository()->getAll();
    }

    /**
     * @param string $slug
     * 
     * @return Object
     */
    public function findOrganizationBySlug($slug)
    {
        return $this->getRepository()->getOrganizationBySlug($slug);
    }

    /**
     * @param integer $id
     * 
     * @return Object
     */
    public function findOrganizationById($id)
    {
        return $this->getRepository()->getOrganizationById($id);
    }

    /**
     * @param array $ids
     * 
     * @return Object
     */
    public function findOrganizationsByIds(array $ids = array())
    {
        return $this->getRepository()->getOrganizationsByIds($ids);
    }

    /**
     * @return Object
     */
    public function getLastOrganizations()
    {
        return $this->getRepository()->getLastOrganizations();
    }

    /**
     * @param array $ids
     * 
     * @return Object
     */
    public function findOrganizationsByCountries(array $ids = array())
    {
        $result = array();
        foreach ($this->getRepository()->getOrganizationsByCountries($ids) as $i => $country) {
            $result[$i] = array();
            $result[$i] = array_merge($result[$i], $country['_id']);
            $result[$i] = array_merge($result[$i], $country['value']);
        }

        return $result;
    }

    /**
     * @param string $text
     * 
     * @return Object
     */
    public function searchOrganization($text)
    {
        return $this->getRepository()->searchOrganization($text);
    }

    /**
     * @return integer
     */
    public function countAll()
    {
        return count($this->getRepository()->getAll());
    }
}
