<?php

namespace MolliePrefix\PhpParser\Builder;

use MolliePrefix\PhpParser;
use MolliePrefix\PhpParser\Node\Stmt;
class Trait_ extends \MolliePrefix\PhpParser\Builder\Declaration
{
    protected $name;
    protected $uses = array();
    protected $properties = array();
    protected $methods = array();
    /**
     * Creates an interface builder.
     *
     * @param string $name Name of the interface
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     * Adds a statement.
     *
     * @param Stmt|PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmt($stmt)
    {
        $stmt = $this->normalizeNode($stmt);
        if ($stmt instanceof \MolliePrefix\PhpParser\Node\Stmt\Property) {
            $this->properties[] = $stmt;
        } else {
            if ($stmt instanceof \MolliePrefix\PhpParser\Node\Stmt\ClassMethod) {
                $this->methods[] = $stmt;
            } else {
                if ($stmt instanceof \MolliePrefix\PhpParser\Node\Stmt\TraitUse) {
                    $this->uses[] = $stmt;
                } else {
                    throw new \LogicException(\sprintf('Unexpected node of type "%s"', $stmt->getType()));
                }
            }
        }
        return $this;
    }
    /**
     * Returns the built trait node.
     *
     * @return Stmt\Trait_ The built interface node
     */
    public function getNode()
    {
        return new \MolliePrefix\PhpParser\Node\Stmt\Trait_($this->name, array('stmts' => \array_merge($this->uses, $this->properties, $this->methods)), $this->attributes);
    }
}