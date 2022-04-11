<?php

namespace App\builders;

class CompoundBuild
{
    private string $nodeName;
    private array $nodes;

    public function __construct(string $nodeName = 'root') {
        $this->nodeName = $nodeName;
        $this->nodes = [];
    }

    public function bool()
    {
        if (!array_key_exists('bool', $this->nodes)) {
            $this->nodes['bool'] = new CompoundBuild('bool');
        }

        return $this->nodes['bool'];
    }

    public function must()
    {
        if (!array_key_exists('must', $this->nodes)) {
            $this->nodes['must'] = new CompoundBuild('must');
        }

        return $this->nodes['must'];
    }

    public function mustNot()
    {
        if (!array_key_exists('must_not', $this->nodes)) {
            $this->nodes['must_not'] = new CompoundBuild('must_not');
        }

        return $this->nodes['must_not'];
    }

    public function term(string $field, string $value)
    {
        if (!array_key_exists('term', $this->nodes)) {
            $this->nodes['term'] = new CompoundBuild('term');
        }

        $this->nodes['term']->nodes[$field] = new CompoundBuild($field);
        $this->nodes['term']->nodes[$field]->nodes[] = [
            'value' => $value
        ];

        return $this;
    }
    
    public function builder()
    {
        $return = [];
        foreach($this->nodes as $node) {
            if($node instanceof CompoundBuild) {
                $return[] = $node->builder();
            } else {
                $return = $node;
            }
        }

        return [$this->nodeName => $return];
    }
}
