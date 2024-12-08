<?php

abstract class Mediator {
    abstract public function send(string $message, Colleague $colleague);
}

class ConcreteMediator extends Mediator {
    private $colleague1;
    private $colleague2;
    private $colleague3;

    public function setColleague1(ConcreteColleague1 $colleague) {
        $this->colleague1 = $colleague;
    }

    public function setColleague2(ConcreteColleague2 $colleague) {
        $this->colleague2 = $colleague;
    }

    public function setColleague3(ConcreteColleague3 $colleague) {
        $this->colleague3 = $colleague;
    }

    public function send(string $message, Colleague $colleague) {
        if ($colleague === $this->colleague1) {
            $this->colleague2->notify($message);
            $this->colleague3->notify($message);
        } elseif ($colleague === $this->colleague2) {
            $this->colleague1->notify($message);
            $this->colleague3->notify($message);
        } elseif ($colleague === $this->colleague3) {
            $this->colleague1->notify($message);
            $this->colleague2->notify($message);
        }
    }
}

abstract class Colleague {
    protected $mediator;

    public function __construct(Mediator $mediator) {
        $this->mediator = $mediator;
    }
}

class ConcreteColleague1 extends Colleague {
    public function send(string $message) {
        $this->mediator->send($message, $this);
    }

    public function notify(string $message) {
        echo "Colleague1 gets message: $message" . "<br>";
    }
}

class ConcreteColleague2 extends Colleague {
    public function send(string $message) {
        $this->mediator->send($message, $this);
    }

    public function notify(string $message) {
        echo "Colleague2 gets message: $message" . "<br>";
    }
}

class ConcreteColleague3 extends Colleague {
    public function send(string $message) {
        $this->mediator->send($message, $this);
    }

    public function notify(string $message) {
        echo "Colleague3 gets message: $message " . "<br>";
    }
}

$mediator = new ConcreteMediator();

$colleague1 = new ConcreteColleague1($mediator);
$colleague2 = new ConcreteColleague2($mediator);
$colleague3 = new ConcreteColleague3($mediator);

$mediator->setColleague1($colleague1);
$mediator->setColleague2($colleague2);
$mediator->setColleague3($colleague3);

$colleague1->send("How are you?");
$colleague2->send("Fine, thanks.");
$colleague3->send("Hello!");