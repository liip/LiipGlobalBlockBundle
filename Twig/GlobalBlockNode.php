<?php

namespace Liip\GlobalBlockBundle\Twig;

/**
 * @author Gilles Meier <gilles.meier@liip.ch>
 */
class GlobalBlockNode extends \Twig_Node
{
    public function __construct($name, $value, $lineno, $tag = null)
    {
        parent::__construct(array('value' => $value), array('name' => $name), $lineno, $tag);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$context[\'' . $this->getAttribute('name') . '\'] = ')
            ->write($this->getNode('value')->getAttribute('data'))
            ->raw(";\n");
    }}
