<?php

namespace App\Repositories\PricingPackages;


use App\Repositories\PricingPackages\contracts\PricingPackagesRepoContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\PricingPackage;

class PricingPackagesRepository implements PricingPackagesRepoContract
{
    protected Model $model;
    public function __construct()
    {
        $this->model = new PricingPackage();
    }
    public function fetchALL()
    {
        return $this->model->all();
    }
    public function fetchOne(int $id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update(int $id, array $data)
    {
        $pricingPackage = $this->fetchOne($id);
        $pricingPackage->update($data);
        return $pricingPackage;
    }
    public function delete(int $id)
    {
        $pricingPackage = $this->fetchOne($id);
        return  $pricingPackage->delete();
    }
}
