<?php

interface ChristmasTree {
    public function decorate(): string;
}

class SimpleChristmasTree implements ChristmasTree {
    public function decorate(): string {
        return "Simple Christmas Tree";
    }
}

abstract class TreeDecorator implements ChristmasTree {
    protected $tree;

    public function __construct(ChristmasTree $tree) {
        $this->tree = $tree;
    }

    public function decorate(): string {
        return $this->tree->decorate();
    }
}

class BallsDecorator extends TreeDecorator {
    public function decorate(): string {
        return parent::decorate() . " with Balls";
    }
}

class GarlandDecorator extends TreeDecorator {
    public function decorate(): string {
        return parent::decorate() . " with Garland that lights up";
    }
}

class LightsDecorator extends TreeDecorator {
    public function decorate(): string {
        return parent::decorate() . " with Twinkling Lights";
    }
}

function main() {
    $tree = new SimpleChristmasTree();
    echo $tree->decorate() . "<br>";

    $TreeWithBalls = new BallsDecorator($tree);
    echo $TreeWithBalls->decorate() . "<br>";

    $garlandedTree = new GarlandDecorator($TreeWithBalls);
    echo $garlandedTree->decorate() . "<br>";

    $fullyDecoratedTree = new LightsDecorator($garlandedTree);
    echo $fullyDecoratedTree->decorate() . "<br>";
}

main();
