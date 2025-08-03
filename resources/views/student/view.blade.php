<link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">
@extends('admin.layout')
@section('content')
<div class="card">
  <div class="card-header">All Details</div>
  <div class="card-body text-center">

    @if(session()->has('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session()->has('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td class="text-center">
              <img src="{{ asset($hostels->photo) }}" style="width: 250px; height: 250;" class="img-fluid rounded" alt="Hostel Photo">
            </td>
            <td class="text-center" style="padding-top: 100px;">
              <h2>{{ $hostels->name }}</h2>
            </td>
          </tr>
          <tr>
            <td><strong>Status:</strong> {{ $hostels->status }}</td>
            <td><strong>Mat/Reg. No.:</strong> {{ $hostels->matriculation_number }}</td>
          </tr>
          <tr>
            <td><strong>Date of Birth:</strong> {{ $hostels->date_of_birth }}</td>
            <td><strong>Sex:</strong> {{ $hostels->sex }}</td>
          </tr>
          <tr>
            <td><strong>Marital Status:</strong> {{ $hostels->marital_status }}</td>
            <td><strong>State of Origin:</strong> {{ $hostels->state_of_origin }}</td>
          </tr>
          <tr>
            <td><strong>LGA:</strong> {{ $hostels->local_government_area }}</td>
            <td><strong>Residential Address:</strong> {{ $hostels->residential_address }}</td>
          </tr>
          <tr>
            <td><strong>Phone:</strong> {{ $hostels->phone_number }}</td>
            <td><strong>Email:</strong> {{ $hostels->email }}</td>
          </tr>
          <tr>
            <td><strong>Year of Entry:</strong> {{ $hostels->year_of_entry }}</td>
            <td><strong>Level:</strong> {{ $hostels->level }}</td>
          </tr>
          <tr>
            <td><strong>Department:</strong> {{ $hostels->department }}</td>
            <td><strong>Faculty:</strong> {{ $hostels->faculty }}</td>
          </tr>
          <tr>
            <td><strong>Campus of Choice:</strong> {{ $hostels->campus }}</td>
            <td><strong>Club Membership:</strong> {{ $hostels->club_membership }}</td>
          </tr>
          <tr>
            <td><strong>Hostel of Choice:</strong> {{ $hostels->hostel_choice }}</td>
            <td><strong>Submission Date:</strong> {{ $hostels->created_at }}</td>
          </tr>
          <tr>
            <td><strong>Assigned Room:</strong> {{ $hostels->assigned_Room }}</td>
            <td><strong>Last Update:</strong> {{ $hostels->updated_at }}</td>
          </tr>
          <tr>
            <td colspan="2" class="text-center">
              <a href="{{ route('home') }}" class="btn btn-dark" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
              <a href="{{ route('admin.updateStatus', $hostels->id) }}" class="btn btn-success" title="Allocate"><i class="fa fa-check" aria-hidden="true"></i> Allocate</a>
              <a href="{{ route('admin.updateStatusTwo', $hostels->id) }}" class="btn btn-danger" title="Deallocate"><i class="fa fa-times" aria-hidden="true"></i> Deallocate</a>
              <a href="{{ route('admin.edit', $hostels->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>
              <a href="{{ route('admin.report1', $hostels->id) }}" class="btn btn-primary" title="Print"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to display a warning message
        function showWarning(message) {
            alert(message);
        }

        // Disable key combinations (Ctrl+U)
        document.addEventListener("keydown", function(e) {
            if (e.ctrlKey && e.key === "u") { // Ctrl+U
                e.preventDefault();
                showWarning("Viewing source Code is disabled by Esau De Genius.");
            }
        });
    });
</script>


 <!-- Footer with Copyright and Terms of Service -->
<footer style="background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 16px; color: #6c757d; border-top: 2px solid #e1e1e1;">
    <p style="margin: 0; font-weight: bold;">All Rights Reserved 2022-2025 IAUE SA</p>
   <p style="margin: 0; font-style: italic; font-size: 14px; color: #28a745;">100% Uptime Guaranteed | Powered by <a href="https://wa.me/message/YYLP3VQBYRW3N1" target="_blank" style="color: #007bff;">Esau De Genius</a></p>
    
   <!-- Terms of Service and Intellectual Property Notice -->
    <p style="margin-top: 10px; font-size: 14px; color: #6c757d;">
        By using this site, you agree to our <a href="/-/Terms and Conditions for Hostel Services at Ignatius Ajuru University of Education.pdf" target="_blank" style="color: #007bff;">Terms of Service</a> and acknowledge that all content on this site is protected by intellectual property laws. Unauthorized use, reproduction, or distribution of any content is prohibited.
    </p>
    
    <!-- ESET Smart Security Protection -->
    <p style="margin-top: 10px; font-size: 14px; color: #6c757d;">
        This site is protected by <strong>ESET Smart Security</strong> to ensure the safety and security of your browsing experience.
    </p>
    
    <!-- ESET Logo -->
     <style>
        /* Define the animation for rotating the logo */
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(0deg);
            }
        }

        /* Apply the animation to the logo */
        .logo {
            animation: rotate 5s linear infinite; /* Rotate in 5 seconds and loop indefinitely */
            display: inline-block;
        }
    </style>
</head>
<body>
    <p style="margin-top: 10px;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s" alt="ESET Smart Security" class="logo" style="width: 120px;">
    </p>
</footer>

</div>
@endsection
