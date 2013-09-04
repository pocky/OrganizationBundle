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

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;
use Black\Bundle\OrganizationBundle\Model\AbstractOrganization;
use Gedmo\Mapping\Annotation as Gedmo;
use Black\Bundle\CommonBundle\Traits\ThingDocumentTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Organization Document
 *
 * @ODM\MappedSuperclass()
 */
class Organization extends AbstractOrganization
{
    use ThingDocumentTrait;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $additionalType;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $image;

    /**
     * {@inheritdoc}
     * 
     * @ODM\EmbedMany(targetDocument="PostalAddress")
     */
     protected $address;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $aggregateRating;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $brand;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $contactPoint;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $contactPoints;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $duns;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $email;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $employee;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $employees;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $event;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $events;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $faxNumber;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $founder;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $founders;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $foundingDate;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $globalLocationNumber;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $hasPOS;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $interactionCount;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $isicV4;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $legalName;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $location;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $logo;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $makesOffer;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $member;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $members;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $naics;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $owns;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $review;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Raw
     */
     protected $reviews;

    /**
     * {@inheritdoc}
     * 
     * @ODM\Field
     */
     protected $seeks;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $taxID;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $telephone;

    /**
     * {@inheritdoc}
     * 
     * @ODM\String
     * @Assert\Type(type="string")
     */
     protected $vatID;
}
