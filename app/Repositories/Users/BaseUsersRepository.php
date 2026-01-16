<?php

namespace App\Repositories\Users;

use App\Repositories\Users\Contracts\UsersRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseUsersRepository implements UsersRepositoryContract
{

    public function __construct(protected Model $model) {}
    public function fetchAll(): Collection
    {
        return $this->model->get();
    }
    public function fetchOne(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
    public function update(int $id, array $data): bool
    {
        $user = $this->fetchOne($id);
        return $user->update($data);
    }
    public function delete(int $id): bool
    {
        $user = $this->fetchOne($id);
        return $user->delete();
    }
}
