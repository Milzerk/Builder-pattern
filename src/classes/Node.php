<?php

namespace App\classes;

use Exception;

class Node
{
    private string $key;
    private array $childrens;
    private bool $leaf;

    public function __construct(string $key)
    {
        $this->key = $key;
        $this->leaf = true;
    }

    public function addChildren(Node $children)
    {
        $this->leaf = false;
        $this->childrens[] = $children;
    }

    public function keyChildrens()
    {

        if ($this->leaf) {
            $ke[$this->key] = [];
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
