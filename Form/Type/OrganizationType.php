<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Black\Bundle\CommonBundle\Form\Transformer\ValuetoModelsOrNullTransformer;
use Black\Bundle\OrganizationBundle\Form\EventListener\SetOrganizationDataSubscriber;

/**
 * Class OrganizationType
 *
 * @package Black\Bundle\OrganizationBundle\Form\Type
 */
class OrganizationType extends AbstractType
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var
     */
    protected $manager;

    /**
     * @param string $dbDriver
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class        = $class;
    }

    /**
     * @param $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $subscriber = new SetOrganizationDataSubscriber($builder->getFormFactory(), $this->class);
        $builder->addEventSubscriber($subscriber);
        
        $builder
            ->add(
                'name',
                'text',
                array(
                    'label'         => 'organization.admin.organization.name.text'
                )
            )
            ->add(
                'founder',
                'text',
                array(
                    'label'         => 'organization.admin.organization.founder.text'
                )
            )
            ->add(
                'description',
                'textarea',
                array(
                    'label'         => 'organization.admin.organization.description.text',
                    'required'      => false
                )
            )
            ->add(
                'address',
                'collection',
                array(
                    'type'          => 'black_organization_postaladdress',
                    'label'         => 'organization.admin.organization.address.text',
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'required'      => false,
                    'attr'          => array(
                        'class' => 'address-collection',
                        'add'   => 'add-another-address'
                    ),
                )
            )
            ->add(
                'telephone',
                'text',
                array(
                    'label'         => 'organization.admin.organization.telephone.text',
                    'required'      => false,
                )
            )
            ->add(
                'faxNumber',
                'text',
                array(
                    'label'         => 'organization.admin.organization.faxNumber.text',
                    'required'      => false,
                )
            )
            ->add(
                'email',
                'email',
                array(
                    'label'         => 'organization.admin.organization.email.text',
                    'required'      => false,
                )
            )
            ->add(
                'url',
                'url',
                array(
                    'label'         => 'organization.admin.organization.url.text',
                    'required'      => false
                )
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'    => $this->class,
                'intention'     => 'organization_form'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'black_organization_organization';
    }
}
