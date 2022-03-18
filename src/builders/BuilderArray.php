<?php

namespace App\builders;

use App\classes\Node;

abstract class BuilderArray
{

    private array $childrensNode;
    private Node $root;
    private bool $hasChild;

    public function __construct()
    {
        $this->hasChild = false;
        $this->childrensNode = [];
        $this->brothersNode = [];
    }

    public function builder($keyRoot = 'query')
    {
        $this->next();

        $this->addNode($keyRoot);
        $this->root = $this->childrensNode[0];
        return $this;
    }

    protected function addNode(string $key, mixed $value = null, bool $hasChild = true)
    {
        $newNode = new Node($key, $value);
        if(!empty($this->childrensNode) && $this->hasChild) {
            foreach ($this->childrensNode as $node) {
                $newNode->addChildren($node);
            }
            $this->childrensNode = [];
        }
        $this->childrensNode[] = $newNode;
    }

    public function end()
    {
        $this->hasChild = false;
        return $this;
    }

    public function next()
    {
        $this->hasChild = true;
        return $this;
    }

    public function buildArray()
    {
        if(!isset($this->root)) {
            $this->builder();
        }

        return $this->root->keyChildrens();
    }
}
