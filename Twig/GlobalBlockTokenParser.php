<?php

namespace Liip\GlobalBlockBundle\Twig;

/**
 * @author Gilles Meier <gilles.meier@liip.ch>
 */
class GlobalBlockTokenParser extends \Twig_TokenParser
{
    public function parse(\Twig_Token $token)
    {
        $name = $this->parser->getStream()->expect(\Twig_Token::NAME_TYPE)->getValue();
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        $end = 'end' . $this->getTag();
        $test = function (\Twig_Token $token) use ($end) {
            return $token->test($end);
        };

        $nodes = $this->parser->subparse($test, true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new GlobalBlockNode($name, $nodes, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'global_block';
    }
}
