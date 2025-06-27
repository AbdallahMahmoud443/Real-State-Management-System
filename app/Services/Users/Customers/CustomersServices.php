<?php

namespace App\Services\Users\Customers;

use App\Repositories\Users\Contracts\CustomersRepositoryContract;
use App\Services\Users\Customers\Contracts\CustomersServicesContract;

class CustomersServices implements CustomersServicesContract
{
    public function __construct(protected CustomersRepositoryContract $customersRepository)
    {
        // Constructor logic if needed
    }

    /**
     * Fetch all customers.
     *
     * @return mixed
     */
    public function fetchAllCustomers()
    {
        return $this->customersRepository->fetchAll();
    }

    /**
     * Fetch a customer by ID.
     *
     * @param int $customerId
     * @return mixed
     */
    public function fetchCustomerById($customerId)
    {
        return $this->customersRepository->fetchOne($customerId);
    }
    /**
     * Update customer information.
     *
     * @param int $customerId
     * @param array $data
     * @return bool
     */
    public function updateCustomerInformation($customerId, $data)
    {
        if (isset($data['password']) &  $data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        return $this->customersRepository->update($customerId, $data);
    }

    /**
     * Delete a customer.
     *
     * @param int $customerId
     * @return bool
     */
    public function deleteCustomer($customerId)
    {
        return $this->customersRepository->delete($customerId);
    }
}
