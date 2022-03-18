<?php

namespace App\builders;

use App\classes\Node;

abstract class BuilderArray
{
    private Node $lastNode;
    private Node $root;

    public function __construct($keyRoot = 'root')
    {
        $this->root = new Node($keyRoot);
        $this->lastNode = $this->root;
    }

    protected function addNode(string $key)
    {
        $node = new Node($key);
        $this->lastNode->addChildren($node);
        $this->lastNode = $node;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function buildArray()
    {
        return $this->root->keyChildrens();
    }

    public function currentNode()
    {
        return $this->lastNode;
    }
}
