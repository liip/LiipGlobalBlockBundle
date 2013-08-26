<?php

namespace Liip\GlobalBlockBundle\Twig;

/**
 * @author Gilles Meier <gilles.meier@liip.ch>
 */
class GlobalBlockExtension extends \Twig_Extension
{
    public function getTokenParsers()
    {
        return array(new GlobalBlockTokenParser());
    }

    public function getName()
    {
        return 'block_bundle';
    }
}
