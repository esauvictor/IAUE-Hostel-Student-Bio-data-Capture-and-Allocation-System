@extends('admin.layout')

@section('content')
<link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="card border-0 shadow-lg rounded-4">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Student Details</h5>
    <span class="badge bg-light text-primary">{{ $hostels->status }}</span>
  </div>

  <div class="card-body">
    {{-- Alerts --}}
    @foreach (['error' => 'danger', 'success' => 'success'] as $key => $type)
      @if(session($key))
        <div class="alert alert-{{ $type }} alert-dismissible fade show">
          <i class="fas {{ $type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' }} me-2"></i>{{ session($key) }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
    @endforeach

    {{-- Profile --}}
    <div class="row">
      <div class="col-md-4 text-center mb-4">
        <div class="bg-light p-3 rounded-3 shadow-sm">
          <img src="{{ asset($hostels->photo) }}" alt="Student Photo" class="img-thumbnail rounded-circle shadow profile-image" data-bs-toggle="modal" data-bs-target="#imageModal">
          <h3 class="mt-3">{{ $hostels->name }}</h3>
          <p class="text-muted"><i class="fas fa-id-card me-1"></i>{{ $hostels->matriculation_number }}</p>
        </div>
      </div>

      {{-- Info Table --}}
      <div class="col-md-8">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-primary d-none d-md-table-header-group">
              <tr><th>Field</th><th>Details</th></tr>
            </thead>
            <tbody>
              @php
              $sections = [
                'Personal Information' => [
                  ['icon' => 'fa-user', 'label' => 'Full Name', 'value' => $hostels->name],
                  ['icon' => 'fa-id-card', 'label' => 'Matric/Reg No.', 'value' => '<span class="badge bg-pink text-white">'.$hostels->matriculation_number.'</span>'],
                  ['icon' => 'fa-toggle-on', 'label' => 'Status', 'value' => '<span class="badge '.($hostels->status === 'Allocated' ? 'bg-success' : 'bg-warning text-dark').'"><i class="fas fa-circle me-1 small"></i>'.$hostels->status.'</span>'],
                 ['icon' => 'fa-birthday-cake', 'label' => 'Date of Birth', 'value' => date('jS F, Y', strtotime($hostels->date_of_birth))],
                  ['icon' => 'fa-venus-mars', 'label' => 'Gender', 'value' => $hostels->sex],
                ],
                'Contact Information' => [
                  ['icon' => 'fa-phone', 'label' => 'Phone Number', 'value' => '<a href="tel:'.$hostels->phone_number.'" class="text-decoration-none text-primary">'.$hostels->phone_number.'</a>'],
                  ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => '<a href="mailto:'.$hostels->email.'" class="text-decoration-none text-primary">'.$hostels->email.'</a>'],
                  ['icon' => 'fa-map-marker-alt', 'label' => 'Residential Address', 'value' => $hostels->residential_address],
                ],
                'Academic Information' => [
                  ['icon' => 'fa-building', 'label' => 'Department', 'value' => $hostels->department],
                  ['icon' => 'fa-layer-group', 'label' => 'Faculty', 'value' => $hostels->faculty],
                  ['icon' => 'fa-level-up-alt', 'label' => 'Level', 'value' => $hostels->level],
                  ['icon' => 'fa-calendar-plus', 'label' => 'Year of Entry', 'value' => $hostels->year_of_entry],
                ],
                'Hostel Information' => [
                  ['icon' => 'fa-university', 'label' => 'Campus', 'value' => $hostels->campus],
                  ['icon' => 'fa-list-alt', 'label' => 'Hostel Choice', 'value' => $hostels->hostel_choice],
                  ['icon' => 'fa-door-closed', 'label' => 'Assigned Room', 'value' => '<span class="badge bg-primary">'.$hostels->assigned_Room.'</span>'],
                ],
                'Timestamps' => [
                  ['icon' => 'fa-calendar-check', 'label' => 'Submission Date', 'value' => $hostels->created_at->format('jS F, Y \a\t h:i A')],
                  ['icon' => 'fa-clock', 'label' => 'Last Updated', 'value' => $hostels->updated_at->format('jS F, Y \a\t h:i A')],
                ]
              ];
              @endphp

              @foreach($sections as $section => $items)
                <tr class="table-group-divider">
                  <td colspan="2" class="bg-light fw-bold">
                    <i class="fas fa-{{ Str::slug($section) === 'personal-information' ? 'user' : (Str::contains($section, 'Contact') ? 'address-book' : (Str::contains($section, 'Academic') ? 'graduation-cap' : (Str::contains($section, 'Hostel') ? 'bed' : 'clock'))) }} me-2"></i>{{ $section }}
                  </td>
                </tr>
                @foreach($items as $item)
                  <tr>
                    <td class="fw-bold text-nowrap d-none d-md-table-cell">
                      <i class="fas {{ $item['icon'] }} me-1 text-primary"></i>{{ $item['label'] }}
                    </td>
                    <td data-label="{{ $item['label'] }}">{!! $item['value'] !!}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Buttons --}}
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
      <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>

      @if(auth()->user()->role === 'super_admin')
        <a href="{{ route('admin.updateStatus', $hostels->id) }}" class="btn btn-success" onclick="return confirm('Confirm allocation?')">
          <i class="fas fa-check me-1"></i> Allocate
        </a>
        <a href="{{ route('admin.updateStatusTwo', $hostels->id) }}" class="btn btn-danger" onclick="return confirm('Confirm deallocation?')">
          <i class="fas fa-times me-1"></i> Deallocate
        </a>
        <a href="{{ route('admin.edit', $hostels->id) }}" class="btn btn-warning">
          <i class="fas fa-pencil-alt me-1"></i> Edit
        </a>
      @endif

      @if(in_array(auth()->user()->role, ['admin', 'super_admin']))
        <a href="{{ route('admin.report1', $hostels->id) }}" class="btn btn-info">
          <i class="fas fa-print me-1"></i> Print
        </a>
      @endif
    </div>

    {{-- Image Modal --}}
    <div class="modal fade" id="imageModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ $hostels->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body text-center">
            <img src="{{ asset($hostels->photo) }}" class="img-fluid" alt="Student Photo">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Footer --}}
<footer class="bg-light py-4 mt-5 text-center border-top">
  <p class="mb-1 fw-bold">&copy; 2022–2025 IAUE SA</p>
  <p class="mb-1 text-success small">100% Uptime | Powered by <a href="https://wa.me/248132084092" target="_blank">Esau De Genius</a></p>
  <p class="small text-muted">
    By using this site, you agree to our
    <a href="/-/Terms and Conditions for Hostel Services at Ignatius Ajuru University of Education.pdf" target="_blank">Terms</a>.
    All content is protected by intellectual property law.
  </p>
  <p>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s" alt="Security" style="max-width: 120px;">
  </p>
</footer>

{{-- Styles --}}
<style>
  .profile-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border: 3px solid #fff;
    cursor: pointer;
    transition: transform 0.3s;
  }

  .profile-image:hover {
    transform: scale(1.05);
  }

  .badge.bg-pink {
    background-color: #ec4899;
  }

  @media (max-width: 768px) {
    .table thead {
      display: none;
    }

    .table, .table tbody, .table tr, .table td {
      display: block;
      width: 100%;
    }

    .table tr {
      margin-bottom: 1rem;
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      background-color: #fff;
    }

    .table td {
      text-align: right;
      padding-left: 50%;
      position: relative;
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
    }

    .table td::before {
      content: attr(data-label);
      position: absolute;
      left: 1rem;
      font-weight: bold;
      color: #555;
      text-align: left;
    }
  }
</style>

{{-- Scripts --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("keydown", function (e) {
      if ((e.ctrlKey && ['u', 's'].includes(e.key.toLowerCase())) || e.key === "F12") {
        e.preventDefault();
        showToast("This action is restricted");
      }
    });

    function showToast(message) {
      const toast = document.createElement("div");
      toast.className = "position-fixed bottom-0 end-0 m-3 p-3 bg-danger text-white rounded shadow";
      toast.innerHTML = `<div class="d-flex align-items-center"><i class="fas fa-exclamation-triangle me-2"></i>${message}</div>`;
      document.body.appendChild(toast);
      setTimeout(() => toast.remove(), 3000);
    }
  });
</script>
@endsection
