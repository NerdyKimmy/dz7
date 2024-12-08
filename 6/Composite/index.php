<?php

interface Employee {
    public function getInfo(): string;
    public function add(Employee $employee): void;
    public function remove(Employee $employee): void;
}

class Developer implements Employee {
    private $name;
    private $position;

    public function __construct(string $name, string $position) {
        $this->name = $name;
        $this->position = $position;
    }

    public function getInfo(): string {
        return "{$this->position}: {$this->name}<br>";
    }

    public function add(Employee $employee): void {
        throw new Exception("Cannot add to a leaf");
    }

    public function remove(Employee $employee): void {
        throw new Exception("Cannot remove from a leaf");
    }
}

class Department implements Employee {
    private $name;
    private $employees = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getInfo(): string {
        $info = "Department: {$this->name}<br>";
        foreach ($this->employees as $employee) {
            $info .= $employee->getInfo();
        }
        return $info;
    }

    public function add(Employee $employee): void {
        $this->employees[] = $employee;
    }

    public function remove(Employee $employee): void {
        $this->employees = array_filter($this->employees, fn($e) => $e !== $employee);
    }
}

function mainComposite() {
    $developer1 = new Developer("Alice", "Backend Developer");
    $developer2 = new Developer("Bob", "Frontend Developer");

    $devDepartment = new Department("Development");
    $devDepartment->add($developer1);
    $devDepartment->add($developer2);

    $hr = new Developer("Carol", "HR Manager");
    $hrDepartment = new Department("Human Resources");
    $hrDepartment->add($hr);

    $company = new Department("Company");
    $company->add($devDepartment);
    $company->add($hrDepartment);

    echo $company->getInfo();
}

mainComposite();
