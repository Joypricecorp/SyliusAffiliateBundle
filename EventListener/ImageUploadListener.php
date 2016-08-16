<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pentarim\SyliusAffiliateBundle\EventListener;

use Pentarim\SyliusAffiliateBundle\Model\BannerInterface;
use Sylius\Component\Resource\Exception\UnexpectedTypeException;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class ImageUploadListener
{
    protected $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function uploadBannerImage(GenericEvent $event)
    {
        $subject = $event->getSubject();
        if (!$subject instanceof BannerInterface) {
            throw new UnexpectedTypeException(
                $subject,
                'Pentarim\SyliusAffiliateBundle\Model\BannerInterface'
            );
        }

        if ($subject->hasFile()) {
            $this->uploader->upload($subject);
        }
    }
}
