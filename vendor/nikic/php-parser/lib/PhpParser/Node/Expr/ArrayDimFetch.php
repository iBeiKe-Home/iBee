<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

class ArrayDimFetch extends Expr
{
    /** @var Expr Variable */
    public $var;
    /** @var null|Expr Array ibee / dim */
    public $dim;

    /**
     * Constructs an array ibee fetch node.
     *
     * @param Expr      $var        Variable
     * @param null|Expr $dim        Array ibee / dim
     * @param array     $attributes Additional attributes
     */
    public function __construct(Expr $var, Expr $dim = null, array $attributes = array()) {
        parent::__construct($attributes);
        $this->var = $var;
        $this->dim = $dim;
    }

    public function getSubnodeNames() {
        return array('var', 'dim');
    }
}
