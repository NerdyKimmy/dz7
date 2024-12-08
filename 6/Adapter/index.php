<?php

interface Shape {
    public function draw(): string;
}

class LegacyRectangle {
    public function drawRectangle(): string {
        return "Drawing a rectangle<br>";
    }
}

class RectangleAdapter implements Shape {
    private $legacyRectangle;

    public function __construct(LegacyRectangle $legacyRectangle) {
        $this->legacyRectangle = $legacyRectangle;
    }

    public function draw(): string {
        return $this->legacyRectangle->drawRectangle();
    }
}

class Circle implements Shape {

    public function __construct(int $radius) {
        $this->radius = $radius;
    }

    public function draw(): string {
        return "Drawing a circle<br>";
    }
}

function mainAdapter() {
    $circle = new Circle(10);
    echo $circle->draw();

    $legacyRectangle = new LegacyRectangle();
    $rectangleAdapter = new RectangleAdapter($legacyRectangle);
    echo $rectangleAdapter->draw();
}

mainAdapter();
