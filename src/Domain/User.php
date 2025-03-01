<?php

namespace Domain;

class User {
    public function __construct(
        private string $id,
        private string $name,
        private string $email
    ) {}

    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
}
