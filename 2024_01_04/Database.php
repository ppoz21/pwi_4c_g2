<?php

require_once 'Car.php';

class Database
{
    private ?PDO $connection;

    public function __construct(
        string $host,
        string $username,
        string $password,
        string $database
    ) {
        // DSN - Data Source Name
        $this->connection = new PDO(
            "mysql:host=$host;dbname=$database",
            $username,
            $password
        );

        $this->connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function __destruct()
    {
        $this->connection = null;
    }

    public function getCars(): array
    {
        $sql = "SELECT * FROM Car";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Car');

        return $statement->fetchAll();
    }

    public function getCar(int $id): ?Car
    {
        $sql = "SELECT * FROM Car WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Car');

        $car = $statement->fetch();

        if ($car === false) {
            return null;
        }

        return $car;
    }
}