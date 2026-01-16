<?php

namespace App\Http\Controllers\Admin\dashboard\Users\Customers;

use App\Http\Controllers\Controller;
use App\Services\Users\Customers\CustomersServices;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(protected CustomersServices $customerServices) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = $this->customerServices->fetchAllCustomers();
        return view('admin.dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer = $this->customerServices->fetchCustomerById($id);
        return view('admin.dashboard.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'max:255',
            'confirm_password' => 'max:255|same:password',
            'status' => 'required|in:1,0',
        ]);
        $data = $request->only(['status', 'password']);
        $result = $this->customerServices->updateCustomerInformation($id, $data);
        if ($result) {
            return redirect()->route('admin.Customers.index')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update customer');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $result = $this->customerServices->deleteCustomer($id);
        if ($result) {
            return redirect()->back()->with('success', 'Customer deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete customer');
        }
    }
}
