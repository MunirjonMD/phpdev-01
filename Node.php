<?php

include_once('./NodeInterface.php');

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
    private $tree = "";

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->children = [];
    }

    /**
     *
     * @return string
     */
    public function __toString(): string
    {
        $this->prepareTree($this, "+");
        return $this->tree;
    }

    private function prepareTree(Node $node, $startPlus)
    {
        $this->tree .= $startPlus . $node->getName() . "<br>";
        if ($node->hasChild()) {
            foreach ($node->getChildren() as $nodeChild) {
                $this->prepareTree($nodeChild, $startPlus . "+");
            }
        }
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function hasChild(): bool
    {
        if (!empty($this->children)) return true;
        return false;
    }

    /**
     *
     * @param Node $node
     *
     * @return NodeInterface
     */
    public function addChild(Node $node): NodeInterface
    {
        array_push($this->children, $node);
        return $this;
    }
}

?>