<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('appointments.service')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function show(int $id)
    {
        $customer = Customer::with('appointments.service')->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'tel' => 'required'
            ]
        );
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer added.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, int $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate(['name' => 'required', 'tel' => 'required']);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated.');
    }

    public function destroy(int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted.');
    }
}
?>
