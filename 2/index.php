<?php

class Pizza {
    private $dough;
    private $sauce;
    private $topping;

    public function setDough($dough) {
        $this->dough = $dough;
    }

    public function setSauce($sauce) {
        $this->sauce = $sauce;
    }

    public function setTopping($topping) {
        $this->topping = $topping;
    }

    public function info() {
        echo "Dough: {$this->dough}" . "<br>";
        echo "Sauce: {$this->sauce}". "<br>";
        echo "Topping: {$this->topping}". "<br>";
    }
}

abstract class PizzaBuilder {
    protected $pizza;

    public function createNewPizza() {
        $this->pizza = new Pizza();
    }

    public function getPizza() {
        return $this->pizza;
    }

    abstract public function buildDough();
    abstract public function buildSauce();
    abstract public function buildTopping();
}

class SpicyPizzaBuilder extends PizzaBuilder {
    public function buildDough() {
        $this->pizza->setDough("pan baked");
    }

    public function buildSauce() {
        $this->pizza->setSauce("hot");
    }

    public function buildTopping() {
        $this->pizza->setTopping("pepperoni+salami");
    }
}

class MargaritaPizzaBuilder extends PizzaBuilder {
    public function buildDough() {
        $this->pizza->setDough("thin crust");
    }

    public function buildSauce() {
        $this->pizza->setSauce("tomato");
    }

    public function buildTopping() {
        $this->pizza->setTopping("mozzarella+basil");
    }
}

class Waiter {
    private $pizzaBuilder;

    public function setPizzaBuilder(PizzaBuilder $builder) {
        $this->pizzaBuilder = $builder;
    }

    public function getPizza() {
        return $this->pizzaBuilder->getPizza();
    }

    public function constructPizza() {
        $this->pizzaBuilder->createNewPizza();
        $this->pizzaBuilder->buildDough();
        $this->pizzaBuilder->buildSauce();
        $this->pizzaBuilder->buildTopping();
    }
}

$waiter = new Waiter();

$spicyPizzaBuilder = new SpicyPizzaBuilder();
$waiter->setPizzaBuilder($spicyPizzaBuilder);
$waiter->constructPizza();
$spicyPizza = $waiter->getPizza();
echo "Spicy Pizza:" . "<br>";
$spicyPizza->info();

echo "<br>";

$margaritaPizzaBuilder = new MargaritaPizzaBuilder();
$waiter->setPizzaBuilder($margaritaPizzaBuilder);
$waiter->constructPizza();
$margaritaPizza = $waiter->getPizza();
echo "Margarita Pizza:" . "<br>";
$margaritaPizza->info();

// Hawaii pizza is terrible!