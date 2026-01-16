<?php

namespace App\Repositories\Users\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UsersRepositoryContract
{
    /**
     * Fetch All User (Customers or Agents) from database
     * @return Collection
     */
    public function fetchAll(): Collection;
    /**
     * Fetch Single User (Customer or Agent) From database
     * @param int $id
     * @return Model
     */
    public function fetchOne(int $id): Model;
    /**
     * Update users (Customer or Agent)  information (status and password)
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;
    /**
     * Delete User (Customer or Agent)
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
