<?php

class Dog
{
    private string $name;
    private string $breed;
    private int $age;
    private string $color;
    private string $owner;

    public function __construct(
        string $name,
        string $breed,
        int $age,
        string $color,
        string $owner
    ){
        $this->name = $name;
        $this->breed = $breed;
        $this->age = $age;
        $this->color = $color;
        $this->owner = $owner;

        echo "A new dog has been created! <br>";
    }

    public function __destruct()
    {
        echo "The dog has been destroyed! <br>";
    }

    public function bark(): void
    {
        echo "Woof! Woof!";
    }

    public function getName(): string
    {
        return $this->name;
    }
}
