<?php


namespace App\Form;


use App\Dto\CategoryFilterDto;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryFilterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, array(
                'class' => Category::class,
                'by_reference' => true,
                'multiple' => false,
                'expanded' => false,
                'label' => false,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults(array(
            'data_class' => CategoryFilterDto::class,
            'method' => 'GET',
            'csrf_protection' => 'false'
       ));
    }
}