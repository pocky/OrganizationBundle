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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

use Black\Bundle\OrganizationBundle\Model\AbstractOrganization;
use Black\Bundle\CommonBundle\Traits\ThingEntityTrait;

/**
 * Organization Entity
 */
abstract class Organization extends AbstractOrganization
{
    use ThingEntityTrait;

    /**
     * {@inheritdoc}
     * 
     * @ORM\ManyToMany(targetEntity="PostalAddress", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="organization_postal_address",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="postal_address_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
     protected $address;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="aggregate_rating", type="string", nullable=true)
     */
     protected $aggregateRating;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="brand", type="string", nullable=true)
     */
     protected $brand;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="contact_point", type="string", nullable=true)
     */
     protected $contactPoint;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="contact_points", type="array", nullable=true)
     */
     protected $contactPoints;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="duns", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $duns;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="email", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $email;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="employee", type="string", nullable=true)
     */
     protected $employee;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="employees", type="array", nullable=true)
     */
     protected $employees;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="event", type="string", nullable=true)
     */
     protected $event;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="events", type="array", nullable=true)
     */
     protected $events;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="fax_number", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $faxNumber;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="founder", type="string", nullable=true)
     */
     protected $founder;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="founders", type="array", nullable=true)
     */
     protected $founders;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="founding_date", type="string", nullable=true)
     */
     protected $foundingDate;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="global_location_number", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $globalLocationNumber;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="has_pos", type="string", nullable=true)
     */
     protected $hasPOS;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="interaction_count", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $interactionCount;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="isic_v4", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $isicV4;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="legal_name", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $legalName;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="location", type="string", nullable=true)
     */
     protected $location;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="logo", type="string", nullable=true)
     */
     protected $logo;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="makes_offer", type="string", nullable=true)
     */
     protected $makesOffer;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="member", type="string", nullable=true)
     */
     protected $member;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="members", type="array", nullable=true)
     */
     protected $members;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="naics", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $naics;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="owns", type="string", nullable=true)
     */
     protected $owns;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="review", type="string", nullable=true)
     */
     protected $review;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="reviews", type="array", nullable=true)
     */
     protected $reviews;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="seeks", type="string", nullable=true)
     */
     protected $seeks;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="tax_id", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $taxID;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="telephone", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $telephone;

    /**
     * {@inheritdoc}
     * 
     * @ORM\Column(name="vat_id", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
     protected $vatID;
}
