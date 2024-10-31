@extends('admin.layouts.front',['main_page' > 'yes'])
@section('content')
    <style>
        /* General styles for the container */
        .content-wrapper {
            position: relative;
            top: 0px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 900px; /* Limit the maximum width for a clean look */
            margin: 20px auto;
            background: linear-gradient(145deg, #f0f4f9, #fff); /* Subtle gradient background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }

        /* Styling for the content header */
        .content-header {
            padding: 20px;
            background-color: #e9f7fe; /* Light blue background for better contrast */
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Adds shadow for better visual separation */
            margin-bottom: 20px;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        .content-header:hover {
            background-color: #d3eefc; /* Slight hover effect for interactivity */
        }

        .content-header h4 {
            font-size: 28px;
            font-weight: bold;
            color: #0073e6; /* Bright color for the header */
            margin-bottom: 10px;
            text-align: center; /* Center align the title */
        }

        .content-header strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333; /* Dark text for better readability */
        }

        .content-header p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
        }

        /* Styling the vehicle section */
        .veicle-sec {
            padding: 20px;
            background-color: #fff; /* Clean white background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease; /* Smooth animation on hover */
            margin-top: 20px;
        }

        .veicle-sec:hover {
            transform: translateY(-5px); /* Hover effect to lift the box */
        }

        .veicle-sec h4 {
            font-size: 26px;
            font-weight: bold;
            color: #0073e6;
            margin-bottom: 15px;
            text-align: center; /* Center align the title */
        }

        .veicle-sec strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        /* Styling for images */
        .veicle-sec img {
            display: block;
            width: 100%;
            max-width: 300px; /* Control the max width of the image */
            margin: 15px auto; /* Center the image */
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adds depth to the image */
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 768px) {
            .content-wrapper {
                padding: 15px;
            }

            .veicle-sec {
                padding: 15px;
            }

            .content-header, .veicle-sec h4 {
                font-size: 22px;
            }

            .veicle-sec img {
                max-width: 100%; /* Ensure the image is responsive on small screens */
            }
        }

    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <h4>Client Details</h4><br>
            @foreach($vehicles as $vehicle)
                <strong>Client Name</strong>{{$vehicle->customer->name}}<br>
                <strong>Client Address</strong>{{$vehicle->customer->address}}<br>
                <strong>Client Contacts</strong>{{$vehicle->customer->contact}}<br>
                <strong>Client Nic</strong>{{$vehicle->customer->nic}}<br>
                <strong>Client No</strong>{{$vehicle->customer->agreement_no}}<br><br>
            @endforeach

            <div class="veicle-sec">
                @foreach($vehicles as $vehicle)
                <h4>Vehicle Details</h4><br>
                <strong>Customer_id</strong>{{$vehicle->customer_id}}<br>
                <strong>Vehicle Type</strong>{{$vehicle->vehicle_type}}<br>
                <strong>Vehicle Number</strong>{{$vehicle->vehicle_no}}<br>
                <strong>Engine No</strong>{{$vehicle->engine_no}}<br>
                <strong>Vehicle Book</strong><br>
                    <img src="{{ asset('storage/images/vehicle/' . $vehicle->vehicle_book) }}" alt="">

                    <strong>Owner Type</strong>{{$vehicle->owner_type}}
                @endforeach
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
@endsection

