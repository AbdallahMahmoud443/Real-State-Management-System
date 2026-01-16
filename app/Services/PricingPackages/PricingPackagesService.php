<?php

namespace App\Services\PricingPackages;

use App\Services\PricingPackages\contracts\PricingPackagesServiceContract;
use App\Repositories\PricingPackages\contracts\PricingPackagesRepoContract;


class PricingPackagesService  implements PricingPackagesServiceContract
{
    public function __construct(protected PricingPackagesRepoContract $PricingPackagesRepo) {}

    public function fetchALLPackages()
    {
        return $this->PricingPackagesRepo->fetchALL();
    }
    public function fetchOnePackage(int $id)
    {
        return $this->PricingPackagesRepo->fetchOne($id);
    }
    public function createPackage(array $data)
    {
        return $this->PricingPackagesRepo->create($data);
    }
    public function updatePackage(int $id, array $data)
    {
        return $this->PricingPackagesRepo->update($id, $data);
    }
    public function deletePackage(int $id)
    {
        return $this->PricingPackagesRepo->delete($id);
    }
}
