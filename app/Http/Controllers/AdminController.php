<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Guarantor;
use App\Models\Installemnt;

class AdminController extends Controller
{
    // Function to display the client registration form
    public function clientRegister()
    {
        return view('admin.register');
    }

    // Function to handle the client registration
    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string',
            'nic' => 'required|string',
            'agreement_no' => 'required|string',
            'vehicle_type' => 'required|string',
            'vehicle_no' => 'required|string',
            'engine_no' => 'required|string',
            'vehicle_book' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'owner_type' => 'required|in:second_party,third_party',
            'guarantor1_name' => 'required|string',
            'guarantor1_address' => 'required|string',
            'guarantor1_nic' => 'required|string',
            'guarantor1_contact' => 'required|string',
            'guarantor2_name' => 'required|string',
            'guarantor2_address' => 'required|string',
            'guarantor2_nic' => 'required|string',
            'guarantor2_contact' => 'required|string',
            'guarantor3_name' => 'nullable|string',
            'guarantor3_address' => 'nullable|string',
            'guarantor3_nic' => 'nullable|string',
            'guarantor3_contact' => 'nullable|string',
            'full_amount' => 'required|numeric',
            'down_amount' => 'required|numeric',
            'lease_amount' => 'required|numeric',
            'document_charge' => 'required|numeric',
            'full_lease_amount' => 'required|numeric',
            'duration' => 'required|integer',
            'rate' => 'required|numeric',
            'monthly_rental' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            // Create Customer
            $customer = Customer::create($request->only([
                'name', 'address', 'contact', 'nic', 'agreement_no'
            ]));

            // Handle vehicle book upload
            $vehicleBookPath = null; // Initialize the variable
            if ($request->hasFile('vehicle_book')) {
                $vehicleBook = $request->file('vehicle_book');
                $vehicleBookName = time() . '.' . $vehicleBook->getClientOriginalExtension();
                $vehicleBook->move(public_path('images/vehicle/book'), $vehicleBookName);
                $vehicleBookPath = 'images/vehicle/book/' . $vehicleBookName;
            }

            // Create Vehicle
            Vehicle::create([
                'customer_id' => $customer->id,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_no' => $request->vehicle_no,
                'engine_no' => $request->engine_no,
                'vehicle_book' => $vehicleBookPath,
                'owner_type' => $request->owner_type,
            ]);

            // Create Guarantor
            Guarantor::create($request->only([
                    'guarantor1_name', 'guarantor1_address', 'guarantor1_nic', 'guarantor1_contact',
                    'guarantor2_name', 'guarantor2_address', 'guarantor2_nic', 'guarantor2_contact',
                    'guarantor3_name', 'guarantor3_address', 'guarantor3_nic', 'guarantor3_contact',
                ]) + ['customer_id' => $customer->id]);

            // Create Installment
            Installemnt::create([
                'customer_id' => $customer->id,
                'full_amount' => $request->full_amount,
                'down_amount' => $request->down_amount,
                'lease_amount' => $request->lease_amount,
                'document_charge' => $request->document_charge,
                'full_lease_amount' => $request->full_lease_amount,
                'duration' => $request->duration,
                'rate' => $request->rate,
                'monthly_rental' => $request->monthly_rental,
            ]);

            // Increment the client count in the session
            Session::increment('client_count', 1);

            DB::commit();
            return redirect()->back()->with('success', 'Client registered successfully! Current client count: ' . Session::get('client_count'));
        } catch (\Exception $e) {
            DB::rollback();
            // Log the error for debugging
            \Log::error('Client registration error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while registering the client. Please try again.');
        }
    }

    // Summary method
    public function summery()
    {
        $vehicles = Vehicle::with('customer', 'instllement')->get()->map(function ($vehicle, $index) {
            $vehicle->number = $index + 1;
            return $vehicle;
        });

        return view('admin.summery', ['vehicles' => $vehicles]);
    }

    // Function to view client details
    public function clientDetails()
    {
        return view('admin.clientDetails');
    }

    // Function for installment view
    public function Installment()
    {
        return view('admin.Installment');
    }

    // Function for view details
    public function viewDetailes()
    {
        $vehicles = Vehicle::with('customer')->get();
        return view('admin.view', ['vehicles' => $vehicles]);
    }

    public function viewDetailsShow($customer_id)
    {
        $vehicles = Vehicle::with('customer')
            ->where('customer_id', $customer_id)
            ->get();

        return view('admin.view', ['vehicles' => $vehicles]);
    }

    // Function for editing details
    public function editDetailes()
    {
        return view('admin.edit');
    }
}
