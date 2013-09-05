<?php

/**
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Model;

/**
 * Class AbstractOrganization
 *
 * @package Black\Bundle\OrganizationBundle\Model
 */
abstract class AbstractOrganization implements OrganizationInterface
{
    /**
     * Id of the model
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var integer|long
     */
    protected $id;

    /**
     * Physical address of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $address;

    /**
     * The overall rating, based on a collection of reviews or ratings, of
     * the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $aggregateRating;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $brand;

    /**
     * A contact point for a person or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $contactPoint;

    /**
     * A contact point for a person or organization (legacy spelling; see
     * singular form, contactPoint).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $contactPoints;

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $duns;

    /**
     * Email address.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $email;

    /**
     * Someone working for this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $employee;

    /**
     * People working for this organization. (legacy spelling; see singular
     * form, employee)
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $employees;

    /**
     * Upcoming or past event associated with this place or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $event;

    /**
     * Upcoming or past events associated with this place or organization
     * (legacy spelling; see singular form, event).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $events;

    /**
     * The fax number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $faxNumber;

    /**
     * A person who founded this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $founder;

    /**
     * A person who founded this organization (legacy spelling; see singular
     * form, founder).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $founders;

    /**
     * The date that this organization was founded.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $foundingDate;

    /**
     * The Global Location Number (GLN, sometimes also referred to as
     * International Location Number or ILN) of the respective organization,
     * person, or place. The GLN is a 13-digit number used to identify
     * parties and physical locations.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $globalLocationNumber;

    /**
     * Points-of-Sales operated by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $hasPOS;

    /**
     * A count of a specific user interactions with this item—for example,
     * 20 UserLikes, 5 UserComments, or 300 UserDownloads. The user
     * interaction type should be one of the sub types of UserInteraction.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $interactionCount;

    /**
     * The International Standard of Industrial Classification of All
     * Economic Activities (ISIC), Revision 4 code for a particular
     * organization, business person, or place.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $isicV4;

    /**
     * The official name of the organization, e.g. the registered company
     * name.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $legalName;

    /**
     * The location of the event, organization or action.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $location;

    /**
     * URL of an image for the logo of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $logo;

    /**
     * A pointer to products or services offered by the organization or
     * person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $makesOffer;

    /**
     * A member of this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $member;

    /**
     * A member of this organization (legacy spelling; see singular form,
     * member).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $members;

    /**
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $naics;

    /**
     * Products owned by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $owns;

    /**
     * A review of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $review;

    /**
     * Review of the item (legacy spelling; see singular form, review).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var array
     */
    protected $reviews;

    /**
     * A pointer to products or services sought by the organization or person
     * (demand).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var mixed
     */
    protected $seeks;

    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the
     * US or the CIF/NIF in Spain.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $taxID;

    /**
     * The telephone number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $telephone;

    /**
     * The Value-added Tax ID of the organisation or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access protected
     * @var string
     */
    protected $vatID;

    /**
     * Getter of Id
     * 
     * Id of the model
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return integer|long
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter of Id
     * 
     * Id of the model
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param integer|long $value Value of id
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * Getter of Address
     * 
     * Physical address of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Setter of Address
     * 
     * Physical address of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of address
     */
    public function setAddress($value)
    {
        $this->address = $value;
    }

    /**
     * Getter of Aggregate Rating
     * 
     * The overall rating, based on a collection of reviews or ratings, of
     * the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getAggregateRating()
    {
        return $this->aggregateRating;
    }

    /**
     * Setter of Aggregate Rating
     * 
     * The overall rating, based on a collection of reviews or ratings, of
     * the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of aggregateRating
     */
    public function setAggregateRating($value)
    {
        $this->aggregateRating = $value;
    }

    /**
     * Getter of Brand
     * 
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Setter of Brand
     * 
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of brand
     */
    public function setBrand($value)
    {
        $this->brand = $value;
    }

    /**
     * Getter of Contact Point
     * 
     * A contact point for a person or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getContactPoint()
    {
        return $this->contactPoint;
    }

    /**
     * Setter of Contact Point
     * 
     * A contact point for a person or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of contactPoint
     */
    public function setContactPoint($value)
    {
        $this->contactPoint = $value;
    }

    /**
     * Getter of Contact Points
     * 
     * A contact point for a person or organization (legacy spelling; see
     * singular form, contactPoint).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getContactPoints()
    {
        return $this->contactPoints;
    }

    /**
     * Setter of Contact Points
     * 
     * A contact point for a person or organization (legacy spelling; see
     * singular form, contactPoint).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of contactPoints
     */
    public function setContactPoints($value)
    {
        $this->contactPoints = $value;
    }

    /**
     * Add contactPoint to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of contactPoint
     */
    public function addContactPoint($value)
    {
        $this->contactPoints[] = $value;
    }

    /**
     * Remove contactPoint to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of contactPoint
     */
    public function removeContactPoint($value)
    {
        $key = array_search($value, $this->contactPoints);
        if($key !== false) {
           unset($this->contactPoints[$key]);
        }
    }

    /**
     * Getter of Duns
     * 
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getDuns()
    {
        return $this->duns;
    }

    /**
     * Setter of Duns
     * 
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of duns
     */
    public function setDuns($value)
    {
        $this->duns = $value;
    }

    /**
     * Getter of Email
     * 
     * Email address.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Setter of Email
     * 
     * Email address.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of email
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * Getter of Employee
     * 
     * Someone working for this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Setter of Employee
     * 
     * Someone working for this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of employee
     */
    public function setEmployee($value)
    {
        $this->employee = $value;
    }

    /**
     * Getter of Employees
     * 
     * People working for this organization. (legacy spelling; see singular
     * form, employee)
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Setter of Employees
     * 
     * People working for this organization. (legacy spelling; see singular
     * form, employee)
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of employees
     */
    public function setEmployees($value)
    {
        $this->employees = $value;
    }

    /**
     * Add employee to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of employee
     */
    public function addEmployee($value)
    {
        $this->employees[] = $value;
    }

    /**
     * Remove employee to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of employee
     */
    public function removeEmployee($value)
    {
        $key = array_search($value, $this->employees);
        if($key !== false) {
           unset($this->employees[$key]);
        }
    }

    /**
     * Getter of Event
     * 
     * Upcoming or past event associated with this place or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Setter of Event
     * 
     * Upcoming or past event associated with this place or organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of event
     */
    public function setEvent($value)
    {
        $this->event = $value;
    }

    /**
     * Getter of Events
     * 
     * Upcoming or past events associated with this place or organization
     * (legacy spelling; see singular form, event).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Setter of Events
     * 
     * Upcoming or past events associated with this place or organization
     * (legacy spelling; see singular form, event).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of events
     */
    public function setEvents($value)
    {
        $this->events = $value;
    }

    /**
     * Add event to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of event
     */
    public function addEvent($value)
    {
        $this->events[] = $value;
    }

    /**
     * Remove event to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of event
     */
    public function removeEvent($value)
    {
        $key = array_search($value, $this->events);
        if($key !== false) {
           unset($this->events[$key]);
        }
    }

    /**
     * Getter of Fax Number
     * 
     * The fax number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Setter of Fax Number
     * 
     * The fax number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of faxNumber
     */
    public function setFaxNumber($value)
    {
        $this->faxNumber = $value;
    }

    /**
     * Getter of Founder
     * 
     * A person who founded this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getFounder()
    {
        return $this->founder;
    }

    /**
     * Setter of Founder
     * 
     * A person who founded this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of founder
     */
    public function setFounder($value)
    {
        $this->founder = $value;
    }

    /**
     * Getter of Founders
     * 
     * A person who founded this organization (legacy spelling; see singular
     * form, founder).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getFounders()
    {
        return $this->founders;
    }

    /**
     * Setter of Founders
     * 
     * A person who founded this organization (legacy spelling; see singular
     * form, founder).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of founders
     */
    public function setFounders($value)
    {
        $this->founders = $value;
    }

    /**
     * Add founder to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of founder
     */
    public function addFounder($value)
    {
        $this->founders[] = $value;
    }

    /**
     * Remove founder to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of founder
     */
    public function removeFounder($value)
    {
        $key = array_search($value, $this->founders);
        if($key !== false) {
           unset($this->founders[$key]);
        }
    }

    /**
     * Getter of Founding Date
     * 
     * The date that this organization was founded.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getFoundingDate()
    {
        return $this->foundingDate;
    }

    /**
     * Setter of Founding Date
     * 
     * The date that this organization was founded.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of foundingDate
     */
    public function setFoundingDate($value)
    {
        $this->foundingDate = $value;
    }

    /**
     * Getter of Global Location Number
     * 
     * The Global Location Number (GLN, sometimes also referred to as
     * International Location Number or ILN) of the respective organization,
     * person, or place. The GLN is a 13-digit number used to identify
     * parties and physical locations.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getGlobalLocationNumber()
    {
        return $this->globalLocationNumber;
    }

    /**
     * Setter of Global Location Number
     * 
     * The Global Location Number (GLN, sometimes also referred to as
     * International Location Number or ILN) of the respective organization,
     * person, or place. The GLN is a 13-digit number used to identify
     * parties and physical locations.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of globalLocationNumber
     */
    public function setGlobalLocationNumber($value)
    {
        $this->globalLocationNumber = $value;
    }

    /**
     * Getter of Has POS
     * 
     * Points-of-Sales operated by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getHasPOS()
    {
        return $this->hasPOS;
    }

    /**
     * Setter of Has POS
     * 
     * Points-of-Sales operated by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of hasPOS
     */
    public function setHasPOS($value)
    {
        $this->hasPOS = $value;
    }

    /**
     * Getter of Interaction Count
     * 
     * A count of a specific user interactions with this item—for example,
     * 20 UserLikes, 5 UserComments, or 300 UserDownloads. The user
     * interaction type should be one of the sub types of UserInteraction.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getInteractionCount()
    {
        return $this->interactionCount;
    }

    /**
     * Setter of Interaction Count
     * 
     * A count of a specific user interactions with this item—for example,
     * 20 UserLikes, 5 UserComments, or 300 UserDownloads. The user
     * interaction type should be one of the sub types of UserInteraction.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of interactionCount
     */
    public function setInteractionCount($value)
    {
        $this->interactionCount = $value;
    }

    /**
     * Getter of Isic V4
     * 
     * The International Standard of Industrial Classification of All
     * Economic Activities (ISIC), Revision 4 code for a particular
     * organization, business person, or place.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getIsicV4()
    {
        return $this->isicV4;
    }

    /**
     * Setter of Isic V4
     * 
     * The International Standard of Industrial Classification of All
     * Economic Activities (ISIC), Revision 4 code for a particular
     * organization, business person, or place.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of isicV4
     */
    public function setIsicV4($value)
    {
        $this->isicV4 = $value;
    }

    /**
     * Getter of Legal Name
     * 
     * The official name of the organization, e.g. the registered company
     * name.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Setter of Legal Name
     * 
     * The official name of the organization, e.g. the registered company
     * name.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of legalName
     */
    public function setLegalName($value)
    {
        $this->legalName = $value;
    }

    /**
     * Getter of Location
     * 
     * The location of the event, organization or action.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Setter of Location
     * 
     * The location of the event, organization or action.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of location
     */
    public function setLocation($value)
    {
        $this->location = $value;
    }

    /**
     * Getter of Logo
     * 
     * URL of an image for the logo of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Setter of Logo
     * 
     * URL of an image for the logo of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of logo
     */
    public function setLogo($value)
    {
        $this->logo = $value;
    }

    /**
     * Getter of Makes Offer
     * 
     * A pointer to products or services offered by the organization or
     * person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getMakesOffer()
    {
        return $this->makesOffer;
    }

    /**
     * Setter of Makes Offer
     * 
     * A pointer to products or services offered by the organization or
     * person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of makesOffer
     */
    public function setMakesOffer($value)
    {
        $this->makesOffer = $value;
    }

    /**
     * Getter of Member
     * 
     * A member of this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Setter of Member
     * 
     * A member of this organization.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of member
     */
    public function setMember($value)
    {
        $this->member = $value;
    }

    /**
     * Getter of Members
     * 
     * A member of this organization (legacy spelling; see singular form,
     * member).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Setter of Members
     * 
     * A member of this organization (legacy spelling; see singular form,
     * member).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of members
     */
    public function setMembers($value)
    {
        $this->members = $value;
    }

    /**
     * Add member to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of member
     */
    public function addMember($value)
    {
        $this->members[] = $value;
    }

    /**
     * Remove member to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of member
     */
    public function removeMember($value)
    {
        $key = array_search($value, $this->members);
        if($key !== false) {
           unset($this->members[$key]);
        }
    }

    /**
     * Getter of Naics
     * 
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getNaics()
    {
        return $this->naics;
    }

    /**
     * Setter of Naics
     * 
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of naics
     */
    public function setNaics($value)
    {
        $this->naics = $value;
    }

    /**
     * Getter of Owns
     * 
     * Products owned by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getOwns()
    {
        return $this->owns;
    }

    /**
     * Setter of Owns
     * 
     * Products owned by the organization or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of owns
     */
    public function setOwns($value)
    {
        $this->owns = $value;
    }

    /**
     * Getter of Review
     * 
     * A review of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Setter of Review
     * 
     * A review of the item.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of review
     */
    public function setReview($value)
    {
        $this->review = $value;
    }

    /**
     * Getter of Reviews
     * 
     * Review of the item (legacy spelling; see singular form, review).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return array
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Setter of Reviews
     * 
     * Review of the item (legacy spelling; see singular form, review).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param array $value Value of reviews
     */
    public function setReviews($value)
    {
        $this->reviews = $value;
    }

    /**
     * Add review to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of review
     */
    public function addReview($value)
    {
        $this->reviews[] = $value;
    }

    /**
     * Remove review to Array
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of review
     */
    public function removeReview($value)
    {
        $key = array_search($value, $this->reviews);
        if($key !== false) {
           unset($this->reviews[$key]);
        }
    }

    /**
     * Getter of Seeks
     * 
     * A pointer to products or services sought by the organization or person
     * (demand).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getSeeks()
    {
        return $this->seeks;
    }

    /**
     * Setter of Seeks
     * 
     * A pointer to products or services sought by the organization or person
     * (demand).
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param mixed $value Value of seeks
     */
    public function setSeeks($value)
    {
        $this->seeks = $value;
    }

    /**
     * Getter of Tax ID
     * 
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the
     * US or the CIF/NIF in Spain.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getTaxID()
    {
        return $this->taxID;
    }

    /**
     * Setter of Tax ID
     * 
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the
     * US or the CIF/NIF in Spain.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of taxID
     */
    public function setTaxID($value)
    {
        $this->taxID = $value;
    }

    /**
     * Getter of Telephone
     * 
     * The telephone number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Setter of Telephone
     * 
     * The telephone number.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of telephone
     */
    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    /**
     * Getter of Vat ID
     * 
     * The Value-added Tax ID of the organisation or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @return string
     */
    public function getVatID()
    {
        return $this->vatID;
    }

    /**
     * Setter of Vat ID
     * 
     * The Value-added Tax ID of the organisation or person.
     * 
     * @author SchemaGenerator <dallas62@free.fr>
     * 
     * @access public
     * 
     * @param string $value Value of vatID
     */
    public function setVatID($value)
    {
        $this->vatID = $value;
    }
}
