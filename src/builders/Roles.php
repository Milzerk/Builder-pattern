<?php

namespace App\builders;

class Roles extends BuilderArray
{
    public function must()
    {
        $this->addNode('must');
        return $this;
    }

    public function should()
    {
        $this->addNode('should');
        return $this;
    }

    public function equals()
    {
        $this->addNode('equals');
        return $this;
    }
}