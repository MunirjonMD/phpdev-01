<?php

include_once ('./NodeInterface.php');

class Node implements NodeInterface
{
    
	/**
	 *
	 * @param string $name 
	 *
	 * @return mixed
	 */
    private $name;
	private $children;
	public function __construct(string $name) {
        $this->name=$name;
        $this->children=[];
	}
	
	/**
	 *
	 * @return string
	 */
	public function __toString(): string {
        return $this->prepareTree($this,"","+");
	}
	
    private function prepareTree(Node $node,$str,$startPlus) 
    {        
        $str.=$startPlus.$node->getName()."\n\t";
        if($node->hasChild()){
            foreach($node->getChildren() as $nodeChild){
                $this->prepareTree($nodeChild,$str,$startPlus."+");
            }    
        }
        return $str;
    }

	/**
	 *
	 * @return string
	 */
	public function getName(): string {
        return $this->name;
	}
	
	/**
	 *
	 * @return array
	 */
	public function getChildren(): array {
        return $this->children;
	}
	public function hasChild():bool
    {
		print_r($this->children); 
        if(!empty($this->children)) return true;
        return false;
    }
	/**
	 *
	 * @param Node $node 
	 *
	 * @return NodeInterface
	 */
	public function addChild(Node $node): NodeInterface {
		array_push($this->children,$node);
        return $this;
	}
}
?>