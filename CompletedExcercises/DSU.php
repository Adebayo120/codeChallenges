<?php

class DSU
{
    private array $parents = [];

    private function find($x)
    {
        if (isset($this->parents[$x])) {
            if ($this->parents[$x] < 0) {
                return $x; // is a parent
            } else {
                // recursive until find x
                return $this->find($this->parents[$x]);
            }
        } else {
            $this->parents[$x] = -1;
            return $x;
        }
    }

    public function union($x, $y)
    {
        $xpar = $this->find($x);
        $ypar = $this->find($y);
        if($xpar != $ypar) {
			// x's parent is now the parent of y also. 
			// if y was a parent to more than one node, then
			// all of those nodes are now also connected to x's parent.
			$this->parents[$xpar]+= $this->parents[$ypar]; 
			$this->parents[$ypar] = $xpar;
			return false;
		} else {
			return true; //this link creates a cycle
		}
    }

    public function console_print()
    {
        print_r($this->parents);
        echo ("<br>");
    }
}

$dsu = new DSU();
$dsu->union(1,2);
$dsu->console_print();
$dsu->union(3,4);
$dsu->console_print();
$dsu->union(5,6);
$dsu->console_print();
$dsu->union(7,8);
$dsu->console_print();
$dsu->union(2,4);
$dsu->console_print();
$dsu->union(2,5);
$dsu->console_print();
$dsu->union(1,3);
$dsu->console_print();
$dsu->union(6,8);
$dsu->console_print();
$dsu->union(5,7);
$dsu->console_print();