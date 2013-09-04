<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Document;

use Black\Bundle\OrganizationBundle\Model\OrganizationRepositoryInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;

/**
 * Class OrganizationRepository
 *
 * @package Black\Bundle\OrganizationBundle\Document\Organization
 */
class OrganizationRepository extends DocumentRepository implements OrganizationRepositoryInterface
{
    /**
     * @param int $limit
     *
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function getLastOrganizations($limit = 3)
    {
        $qb = $this->getQueryBuilder()
                ->sort('createdAt', 'desc')
                ->limit($limit)
                ->getQuery();

        return $qb->execute();
    }

    /**
     * @param $slug
     *
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getOrganizationBySlug($slug)
    {
        $qb = $this->createQueryBuilder()
                ->field('slug')->equals($slug)
                ->getQuery();
        try {
            $organization = $qb->getSingleResult();

        } catch (DocumentNotFoundException $e) {
            throw new UsernameNotFoundException(
                sprintf('Unable to find an active organization object identified by "%s".', $slug)
            );
        }

        return $organization;
    }

    /**
     * @param $id
     *
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getOrganizationById($id)
    {
        $qb = $this->createQueryBuilder()
            ->field('id')->equals($id)
            ->getQuery();
        try {
            $organization = $qb->getSingleResult();

        } catch (DocumentNotFoundException $e) {
            throw new UsernameNotFoundException(
                sprintf('Unable to find an active organization object identified by "%s".', $id)
            );
        }

        return $organization;
    }

    /**
     * @param array $ids
     *
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function getOrganizationsByIds(array $ids = array())
    {
        $qb = $this
            ->createQueryBuilder()
            ->field('id')->in($ids)
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @param array $ids
     *
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|\MongoCursor|mixed
     */
    public function getOrganizationsByCountries(array $ids = array())
    {
        $qb = $this
            ->createQueryBuilder()
            ->field('id')->in($ids)
            ->map(
                'function() {
                    if(this.address) {
                        key = { country: this.address[0].addressCountry };
                        value = { count: 1 };
                        emit(key, value);
                    }
                }'
            )
            ->reduce(
                'function(key, values) {
                    var count = 0;

                    values.forEach(function(v) {
                      count += v.count;
                    });

                    return {count: count, country: key.country};
                }'
            )
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @param $organization
     *
     * @return \Doctrine\MongoDB\Query\Builder
     */
    public function getAllExcept($organization)
    {
        $qb = $this
            ->createQueryBuilder()
            ->field('id')->notIn($organization);

        return $qb;
    }

    /**
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function getAll()
    {
        $qb = $this
            ->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @param $text
     *
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function searchOrganization($text)
    {
        $text = new \MongoRegex('/' . $text . '/\i');

        $qb = $this->getQueryBuilder();
        $qb = $qb
                ->addOr($qb->expr()->field('name')->equals($text))
                ->addOr($qb->expr()->field('email')->equals($text))
                ->addOr($qb->expr()->field('address.addressCountry')->equals($text))
                ->getQuery();

        return $qb->execute();
    }

    /**
     * @return \Doctrine\ODM\MongoDB\Query\Builder
     */
    protected function getQueryBuilder()
    {
        return $this->createQueryBuilder();
    }
}
