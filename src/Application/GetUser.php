<?php

namespace Application;

use Infrastructure\UserRepository;
use Domain\User;

class GetUser {
    public function __construct(private UserRepository $userRepository) {}

    public function execute(string $id): ?User {
        return $this->userRepository->getById($id);
    }
}
