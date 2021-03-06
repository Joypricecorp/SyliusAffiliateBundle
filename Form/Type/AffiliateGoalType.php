<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pentarim\SyliusAffiliateBundle\Form\Type;

use JMS\TranslationBundle\Annotation\Ignore;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class AffiliateGoalType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'sylius.form.affiliate_goal.name',
            ))
            ->add('description', 'text', array(
                'label' => 'sylius.form.affiliate_goal.description',
            ))
            ->add('startsAt', 'datetime', array(
                'label' => 'sylius.form.affiliate_goal.starts_at',
                'empty_value' =>/** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'time_widget' => 'text',
            ))
            ->add('endsAt', 'datetime', array(
                'label' => 'sylius.form.affiliate_goal.ends_at',
                'empty_value' =>/** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'time_widget' => 'text',
            ))
            ->add('usageLimit', 'number', array(
                'label' => 'sylius.form.affiliate_goal.usage_limit',
            ))
            ->add('rules', 'sylius_affiliate_goal_rule_collection', array(
                'label' => 'sylius.form.affiliate_goal.rules',
                'button_add_label' => 'sylius.affiliate.goal.add_rule',
            ))
            ->add('provisions', 'sylius_affiliate_goal_provision_collection', array(
                'label' => 'sylius.form.affiliate_goal.provisions',
                'button_add_label' => 'sylius.affiliate.goal.add_provision',
            ))
            ->add('channels', 'sylius_channel_choice', [
                'multiple' => true,
                'expanded' => true,
                'label' => 'sylius.form.affiliate.channels',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_affiliate_goal';
    }
}
