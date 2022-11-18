<?php

namespace App\Form;

use App\Entity\Calendar;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\{AbstractType,
    ChoiceList\ChoiceList,
    Extension\Core\Type\ChoiceType,
    Extension\Core\Type\TextType,
    FormBuilderInterface};
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\HiddenDateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class Calendar1Type extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('title',HiddenType::class)
            ->add('start', DateTimeType::class, array(
                'required' => true,
                'data' => new \DateTime('now +2 hours'),
                'model_timezone' => 'Europe/Paris',
                'view_timezone' => 'Europe/Paris',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datetimepicker',
                    'html5' => false,
                ]
            ))
            ->add('end', DateTimeType::class, array(
                'required' => true,
                'data' => new \DateTime('now +2 hours + 30 minutes'),
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datetimepicker',
                    'html5' => false,

                ]
            ))
            ->add('description',HiddenType::class)
            ->add('all_day')
            ->add('background_color', HiddenType::class)
            ->add('border_color', HiddenType::class)
            ->add('text_color', HiddenType::class, array(
                'required' => true,
            ))
            ->add('calendar_user', EntityType::class,[
            'class' => User::class,
            'choices' => [$this->security->getUser()]
            ])


            ->add('state')
            ->add('user_patient')
        ->add('creatAt', DateTimeType::class, array(
        'required' => true,
            'data' => new \DateTime('now +2 hours'),
        'widget' => 'single_text',
        'attr' => [
            'class' => 'form-control input-inline datetimepicker',
            'data-provide' => 'datetimepicker',
            'html5' => false,
        ]
    ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}
