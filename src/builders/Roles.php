<?php
/** 
 *  bool (must)
 *  must
 */ 


namespace App\builders;

class Roles extends BuilderArray
{
    private function newRole(string $node, array $functions)
    {
        if(count($functions) > 0) {
            foreach ($functions as $key => $value) {
                # code...
            }
            $this->next();
            
        }
        $this->addNode($node);
        $this->end();
    }

    public function must(mixed ...$functions)
    {        
        $this->newRole('must', $functions);
        return $this;
    }

    public function bool(mixed ...$functions)
    {
        $this->newRole('bool', $functions);
        return $this;
    }

    public function should(mixed ...$functions)
    {
        $this->newRole('should', $functions);
        return $this;
    }

    public function equals(mixed ...$functions)
    {
        $this->newRole('equals', $functions);
        return $this;
    }

    
    public function match(string $key, mixed $value)
    {
        
        $this->addNode($key, $value, true);
        $this->addNode('match');
        $this->end();

        // $nodeMatch = $this->createNode('match');
        // $nodeMatch = $this->addChild($nodeMatch, $fieldSearch);
        
        return $this;
    }
}