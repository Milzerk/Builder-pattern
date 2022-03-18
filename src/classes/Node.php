<?php

namespace App\classes;

use Exception;

class Node
{
    private string $key;
    private array $childrens;
    private ?Node $parent;
    private bool $leaf;
    private mixed $value;

    public function __construct(string $key, mixed $value = null)
    {
        $this->key = $key;
        $this->leaf = true;
        $this->value = $value;
    }

    public function setParent(Node $node)
    {
        $this->parent = $node;
    }

    public function getParent()
    {
        return $this->parent;
    }
    
    public function addChildren(Node $children)
    {
        $this->leaf = false;
        $children->setParent($this);
        $this->childrens[] = $children;
    }

    public function keyChildrens()
    {

        if ($this->leaf) {
            $ke[$this->key] = $this->value;
            return $ke;
        }

        $keys = [];
        foreach ($this->childrens as $children) {
            $keys[] = $children->keyChildrens();
        }

        $retorno[$this->key] = $keys;
        return $retorno;
    }

    public function getKey()
    {
        return $this->key;
    }
}
