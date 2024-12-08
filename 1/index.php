<?php

abstract class Car {
    abstract public function info(): void;
}

class Ford extends Car {
    public function info(): void {
        echo "Ford" . "<br>";
    }
}

class Toyota extends Car {
    public function info(): void {
        echo "Toyota" . "<br>";
    }
}

class Mersedes extends Car {
    public function info(): void {
        echo "Mersedes" . "<br>";
    }
}

abstract class Engine {
    abstract public function getPower(): void;
}

class FordEngine extends Engine {
    public function getPower(): void {
        echo "Ford Engine 4.4" . "<br>";
    }
}

class ToyotaEngine extends Engine {
    public function getPower(): void {
        echo "Toyota Engine 3.2" . "<br>";
    }
}

class MersedesEngine extends Engine {
    public function getPower(): void {
        echo "Mersedes Engine 5.5" . "<br>";
    }
}

interface ICarFactory {
    public function createCar(): Car;
    public function createEngine(): Engine;
}

class FordFactory implements ICarFactory {
    public function createCar(): Car {
        return new Ford();
    }

    public function createEngine(): Engine {
        return new FordEngine();
    }
}

class ToyotaFactory implements ICarFactory {
    public function createCar(): Car {
        return new Toyota();
    }

    public function createEngine(): Engine {
        return new ToyotaEngine();
    }
}

class MersedesFactory implements ICarFactory {
    public function createCar(): Car {
        return new Mersedes();
    }

    public function createEngine(): Engine {
        return new MersedesEngine();
    }
}

function clientCode(ICarFactory $factory) {
    $car = $factory->createCar();
    $car->info();

    $engine = $factory->createEngine();
    $engine->getPower();
}

echo "Toyota Factory:" . "<br>";
clientCode(new ToyotaFactory());

echo "Ford Factory:" . "<br>";
clientCode(new FordFactory());

echo "Mersedes Factory:" . "<br>";
clientCode(new MersedesFactory());
