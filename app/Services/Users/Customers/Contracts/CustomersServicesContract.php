<?php


namespace App\Services\Users\Customers\Contracts;

interface CustomersServicesContract
{
    /**
     * Fetch all customers.
     *
     * @return mixed
     */
    public function fetchAllCustomers();
    /**
     * Update customer information.
     *
     * @param int $customerId
     * @param array $data
     * @return bool
     */
    public function updateCustomerInformation($customerId, $data);
    /**
     * Delete a customer.
     *
     * @param int $customerId
     * @return bool
     */
    public function deleteCustomer($customerId);
}
