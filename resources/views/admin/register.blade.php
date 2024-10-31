
@extends('admin.layouts.front',['main_page' > 'yes'])
@section('content')



    <body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Register Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Client Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <!-- Main content -->
        <section class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
--
                                <h3 class="card-title" >Client Register Form1</h3>
                            </div>


                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="u_id" value="{{ Auth::id() }}">

                                <form method="POST" action="{{ route('clientRegister.submit') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="u_id" value="{{ Auth::id() }}">

                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h3 class="card-title" style="color: rgb(4, 4, 48); font-weight: bold;">Client Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" rows="1" name="address" id="address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="contact" class="form-label">Contact</label>
                                                    <input type="number" name="contact" id="contact" class="form-control" required oninput="checkInputLength()">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nic" class="form-label">NIC</label>
                                                    <input type="text" name="nic" id="nic" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="agreement_no" class="form-label">Agreement No</label>
                                                    <input type="text" name="agreement_no" id="agreement_no" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="card-header">
                                            <h3 class="card-title" style="color: rgb(4, 4, 48); font-weight: bold;">Vehicle Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="vehicle_type" class="form-label">Vehicle Type</label>
                                                    <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" required>
                                                    <span id="error_message" style="color:red;"></span> <!-- Error message span -->
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="vehicle_no" class="form-label">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="engine_no" class="form-label">Engine No</label>
                                                    <input type="text" name="engine_no" id="engine_no" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="vehicle_book" class="form-label">Vehicle Book</label>
                                                    <input type="file" class="form-control" id="vehicle_book" name="vehicle_book" accept=".pdf,image/*" multiple>
                                                    {{-- <small class="form-text text-muted">Upload images or PDF files</small> --}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="owner_type" class="form-label">Owner Type</label>
                                                    <select name="owner_type" id="owner_type" class="form-select" required>
                                                        <option value="">Select owner type</option>
                                                        <option value="second_party">Second Party</option>
                                                        <option value="third_party">Third Party</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}


                                        {{-- <div class="card mb-4"> --}}
                                        <div class="card-header">
                                            <h3 class="card-title" style="color: rgb(4, 4, 48); font-weight: bold;">Guarantor Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- First Guarantor -->
                                                <div class="col-md-4 mb-3">
                                                    <h6>First Guarantor</h6>
                                                    <div class="mb-3">
                                                        <label for="guarantor1_name" class="form-label">Name</label>
                                                        <input type="text" name="guarantor1_name" id="guarantor1_name" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor1_address" class="form-label">Address</label>
                                                        <textarea class="form-control" rows="2" name="guarantor1_address" id="guarantor1_address" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor1_nic" class="form-label">NIC</label>
                                                        <input type="text" name="guarantor1_nic" id="guarantor1_nic" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor1_contact" class="form-label">Contact</label>
                                                        <input type="tel" name="guarantor1_contact" id="guarantor1_contact" class="form-control" required>
                                                    </div>
                                                </div>

                                                <!-- Second Guarantor -->
                                                <div class="col-md-4 mb-3">
                                                    <h6>Second Guarantor</h6>
                                                    <div class="mb-3">
                                                        <label for="guarantor2_name" class="form-label">Name</label>
                                                        <input type="text" name="guarantor2_name" id="guarantor2_name" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor2_address" class="form-label">Address</label>
                                                        <textarea class="form-control" rows="2" name="guarantor2_address" id="guarantor2_address" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor2_nic" class="form-label">NIC</label>
                                                        <input type="text" name="guarantor2_nic" id="guarantor2_nic" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor2_contact" class="form-label">Contact</label>
                                                        <input type="tel" name="guarantor2_contact" id="guarantor2_contact" class="form-control" required>
                                                    </div>
                                                </div>

                                                <!-- Third Guarantor -->
                                                <div class="col-md-4 mb-3">
                                                    <h6>Third Guarantor</h6>
                                                    <div class="mb-3">
                                                        <label for="guarantor3_name" class="form-label">Name</label>
                                                        <input type="text" name="guarantor3_name" id="guarantor3_name" class="form-control" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor3_address" class="form-label">Address</label>
                                                        <textarea class="form-control" rows="2" name="guarantor3_address" id="guarantor3_address"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor3_nic" class="form-label">NIC</label>
                                                        <input type="text" name="guarantor3_nic" id="guarantor3_nic" class="form-control" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guarantor3_contact" class="form-label">Contact</label>
                                                        <input type="tel" name="guarantor3_contact" id="guarantor3_contact" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}


                                        {{-- <div class="card mb-4"> --}}
                                        <div class="card-header">
                                            <h3 class="card-title" style="color: rgb(4, 4, 48); font-weight: bold;">Installment Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="full_amount" class="form-label">Full Amount</label>
                                                    <input type="number" name="full_amount" id="full_amount" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="down_amount" class="form-label">Down Amount</label>
                                                    <input type="number" name="down_amount" id="down_amount" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="lease_amount" class="form-label">Lease Amount</label>
                                                    <input type="number" name="lease_amount" id="lease_amount" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="document_charge" class="form-label">Document Charge</label>
                                                    <input type="number" name="document_charge" id="document_charge" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rate" class="form-label">Rate (%)</label>
                                                    <div class="input-group">
                                                        <input type="number" name="rate" id="rate" class="form-control" required>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="full_lease_amount" class="form-label">Full Lease Amount</label>
                                                    <input type="number" name="full_lease_amount" id="full_lease_amount" class="form-control" required>
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="duration" class="form-label">Duration (Months)</label>
                                                    <input type="number" name="duration" id="duration" class="form-control" required>

                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">&nbsp;</label>
                                                    <button type="button" class="btn btn-warning form-control" onclick="calculateAmount()">Calculate</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="monthly_rental" class="form-label">Monthly Rental</label>
                                                    <input type="number" name="monthly_rental" id="monthly_rental" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- </div> --}}


                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>



        <script>
            // Function to calculate amounts
            function calculateAmount() {
                const fullAmount = parseFloat(document.getElementById('full_amount').value) || 0;
                const downAmount = parseFloat(document.getElementById('down_amount').value) || 0;
                const documentCharge = parseFloat(document.getElementById('document_charge').value) || 0;
                const duration = parseInt(document.getElementById('duration').value) || 0;
                const rate = parseFloat(document.getElementById('rate').value) || 0;

                // Calculate Lease Amount
                const leaseAmount = fullAmount - downAmount;
                document.getElementById('lease_amount').value = leaseAmount.toFixed(2);

                // Calculate Full Lease Amount: (Lease Amount + Document Charge) * Rate
                const fullLeaseAmount = (leaseAmount + documentCharge) * (1 + (rate / 100));
                document.getElementById('full_lease_amount').value = fullLeaseAmount.toFixed(2);

                // Calculate Monthly Rental
                if (duration > 0) {
                    const monthlyRental = fullLeaseAmount / duration;
                    document.getElementById('monthly_rental').value = monthlyRental.toFixed(2);
                } else {
                    document.getElementById('monthly_rental').value = '';
                }
            }

            // Add event listeners to input fields
            document.getElementById('full_amount').addEventListener('input', calculateLeaseAmount);
            document.getElementById('down_amount').addEventListener('input', calculateLeaseAmount);
            document.getElementById('document_charge').addEventListener('input', calculateFullLeaseAmount);
            document.getElementById('rate').addEventListener('input', calculateFullLeaseAmount);

            function calculateLeaseAmount() {
                const fullAmount = parseFloat(document.getElementById('full_amount').value) || 0;
                const downAmount = parseFloat(document.getElementById('down_amount').value) || 0;
                const leaseAmount = fullAmount - downAmount;
                document.getElementById('lease_amount').value = leaseAmount.toFixed(2);
                calculateFullLeaseAmount();
            }

            function calculateFullLeaseAmount() {
                const leaseAmount = parseFloat(document.getElementById('lease_amount').value) || 0;
                const documentCharge = parseFloat(document.getElementById('document_charge').value) || 0;
                const fullLeaseAmount = (leaseAmount + documentCharge) * (1 + (parseFloat(document.getElementById('rate').value) / 100));
                document.getElementById('full_lease_amount').value = fullLeaseAmount.toFixed(2);
            }
            document.getElementById('vehicle_type').addEventListener('input', function (e) {
                var invalidChars = /[0-9]/;
                if (invalidChars.test(e.target.value)) {
                    document.getElementById('error_message').innerText = "Numbers are not allowed in Vehicle Type!";
                    e.target.value = e.target.value.replace(invalidChars, '');
                } else {
                    document.getElementById('error_message').innerText = "";
                }
            });
            function checkInputLength() {
                const inputField=document.getElementById('contact');
                if (inputField.value.length>10){
                    inputField.value=inputField.value.slice(0,9);
                }else {

                }
            }


        </script>







    </div>
    </body>





@endsection






















