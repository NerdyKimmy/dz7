<?php

interface IFigure {
    public function clone(): IFigure;
    public function getInfo(): void;
}

class Rectangle implements IFigure {
    private $width;
    private $height;

    public function __construct(int $width, int $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function clone(): IFigure {
        return new Rectangle($this->width, $this->height);
    }

    public function getInfo(): void {
        echo "Прямокутник довжиною {$this->height} і шириною {$this->width}<br>";
    }
}

class Circle implements IFigure {
    private $radius;

    public function __construct(int $radius) {
        $this->radius = $radius;
    }

    public function clone(): IFigure {
        return new Circle($this->radius);
    }

    public function getInfo(): void {
        echo "Круг радіусом {$this->radius}<br>";
    }
}

class Triangle implements IFigure {
    private $sideA;
    private $sideB;
    private $sideC;

    public function __construct(int $sideA, int $sideB, int $sideC) {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        $this->sideC = $sideC;
    }

    public function clone(): IFigure {
        return new Triangle($this->sideA, $this->sideB, $this->sideC);
    }

    public function getInfo(): void {
        echo "Трикутник зі сторонами {$this->sideA}, {$this->sideB}, {$this->sideC}<br>";
    }
}

function main() {
    $rectangle = new Rectangle(10, 20);
    $clonedRectangle = $rectangle->clone();
    $rectangle->getInfo();
    $clonedRectangle->getInfo();

    $circle = new Circle(15);
    $clonedCircle = $circle->clone();
    $circle->getInfo();
    $clonedCircle->getInfo();

    $triangle = new Triangle(10, 20, 25);
    $clonedTriangle = $triangle->clone();
    $triangle->getInfo();
    $clonedTriangle->getInfo();
}

main();
