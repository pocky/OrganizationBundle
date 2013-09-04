<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Entity;

use Black\Bundle\OrganizationBundle\Model\OrganizationRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Class OrganizationRepository
 *
 * @package Black\Bundle\OrganizationBundle\Entity\Organization
 */
class OrganizationRepository extends EntityRepository implements OrganizationRepositoryInterface
{
    /**
     * @param integer $limit
     *
     * @return mixed
     */
    public function getLastOrganizations($limit = 3)
    {
        $qb = $this->getQueryBuilder()
                ->orderBy('o.createdAt', 'DESC')
                ->setMaxResults($limit)
                ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param string $slug
     *
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getOrganizationBySlug($slug)
    {
        $qb = $this->createQueryBuilder()
                ->where('o.slug LIKE :slug')
                ->setParameter('slug', $slug)
                ->getQuery();
        try {
            $organization = $qb->getSingleResult();

        } catch (EntityNotFoundException $e) {
            throw new UsernameNotFoundException(
                sprintf('Unable to find an active organization object identified by "%s".', $slug)
            );
        }

        return $organization;
    }

    /**
     * @param integer $id
     *
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getOrganizationById($id)
    {
        $qb = $this->createQueryBuilder()
                ->where('o.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
        try {
            $organization = $qb->getSingleResult();

        } catch (EntityNotFoundException $e) {
            throw new UsernameNotFoundException(
                sprintf('Unable to find an active organization object identified by "%s".', $id)
            );
        }

        return $organization;
    }

    /**
     * @param array $ids
     *
     * @return mixed
     */
    public function getOrganizationsByIds(array $ids = array())
    {
        $qb = $this->createQueryBuilder()
                ->where($qb->expr()->in('o.id', ':ids'))
                ->setParameter('ids', $ids)
                ->getQuery();

        return $qb->execute();
    }

    /**
     * @param array $ids
     *
     * @return mixed
     */
    public function getOrganizationsByCountries(array $ids = array())
    {
        $qb = $this->createQueryBuilder()
                ->leftJoin('o.address', 'pa')
                ->select('pa.address_country as country, COUNT(pa.address_country) as count')
                ->where(
                    $qb
                        ->expr()
                        ->in('o.id', ':ids')
                )
                ->groupBy('o.id, pa.address_country')
                ->setParameter('ids', $ids)
                ->getQuery();

        return $qb->execute();
    }

    /**
     * @param Organization $organization
     *
     * @return Query
     */
    public function getAllExcept($organization)
    {
        $qb = $this->getQueryBuilder()
                ->where('o.id <> :id')
                ->setParameter('id', $organization);

        return $qb;
    }
    /**
     * @return mixed
     */
    public function getAll()
    {
        $qb = $this
            ->getQueryBuilder()
            ->orderBy('o.name', 'ASC')
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param string $text
     *
     * @return mixed
     */
    public function searchOrganization($text)
    {
        $qb2    = $this->getQueryBuilder('ppa');
        $qb     = $this->getQueryBuilder();
        $qb     = $qb
                ->where(
                    $qb
                        ->expr()
                        ->orX(
                            $qb
                                ->expr()
                                ->orX(
                                    $qb->expr()->like('o.name', ':text'),
                                    $qb->expr()->like('o.email', ':text')
                                ),
                            $qb
                                ->expr()
                                ->in(
                                    'o.id',
                                    $qb2
                                        ->leftJoin('opa.address', 'pa')
                                        ->select('opa.id')
                                        ->where(
                                            $qb2
                                                ->expr()
                                                ->orX(
                                                    $qb2->expr()->like('pa.name', ':text'),
                                                    $qb2->expr()->like('pa.addressCountry', ':text')
                                                )
                                        )
                                        ->setParameter('text', '%'.$text.'%')
                                        ->getDQL()
                                )
                        )
                )
                ->setParameter('text', '%'.$text.'%')
                ->getQuery();

        return $qb->execute();
    }

    /**
     * @param string $alias
     * 
     * @return Query
     */
    protected function getQueryBuilder($alias = 'o')
    {
        return $this->createQueryBuilder($alias);
    }
}
