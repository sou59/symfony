<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/01/19
 * Time: 16:29
 */

namespace UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    /**
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname')
            ->add('lastname');
    }

    /**
     * @return string|null
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}