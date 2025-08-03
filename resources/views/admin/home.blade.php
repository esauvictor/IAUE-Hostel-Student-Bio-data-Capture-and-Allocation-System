<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Hostel Allocation Management System">
    <title>Hostel Allocation Portal | Dashboard</title>
    
    <!-- Preload & CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="icon" href="https://iaue.edu.ng/favicon.ico">
    

@if (session('error'))
  <div 
    class="alert alert-danger alert-dismissible fade show mt-4 border-0 shadow-lg d-flex align-items-start gap-3 position-relative animate-fadeIn"
    role="alert"
    style="background: linear-gradient(135deg, #ff4e50 0%, #f9d423 100%); color: #1b1b1b; padding: 1.2rem 1.5rem; border-radius: 0.8rem;"
  >
    <div class="fs-4">
      <i class="bi bi-exclamation-triangle-fill"></i>
    </div>
    <div>
      <h6 class="fw-bold mb-1 text-dark">Heads up!</h6>
      <p class="mb-0">{{ session('error') }}</p>
    </div>
    <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


    <style>
      :root {
    --primary:#2563eb; --primary-light:#3b82f6; --primary-dark:#1d4ed8;
    --accent:#ec4899; --success:#10b981; --warning:#f59e0b;
    --error:#ef4444; --light:#f8fafc; --dark:#1e293b;
    --gray:#64748b; --border:#e2e8f0
}
body {
    font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif;
    background-color:#f1f5f9; color:var(--dark); line-height:1.5;
    display:flex; flex-direction:column; min-height:100vh
}
@supports (font-variation-settings:normal) {
    body { font-family:'Inter var',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif }
}

/* Navbar */
.navbar {
    background:linear-gradient(135deg,var(--primary),var(--primary-dark));
    box-shadow:0 4px 6px -1px rgba(0,0,0,0.1); padding:.75rem 1rem
}
.navbar-brand {
    font-weight:600; letter-spacing:-.025em;
    display:inline-flex; align-items:center; gap:.5rem
}
.nav-link {
    font-weight:500; padding:.5rem .75rem; border-radius:.375rem;
    transition:all 150ms ease; display:inline-flex; align-items:center; gap:.5rem
}
.nav-link:hover, .nav-link:focus { background:rgba(255,255,255,0.1) }
.nav-link.active { background:rgba(255,255,255,0.2); font-weight:600 }

/* User Avatar */
.user-avatar {
    width:2.25rem; height:2.25rem; border-radius:50%;
    background:linear-gradient(135deg,var(--accent),#9333ea);
    display:inline-flex; align-items:center; justify-content:center;
    color:white; font-weight:600; flex-shrink:0
}

/* Main Content */
.main-content { flex:1; padding:1.5rem 0 }

/* Dashboard Card */
.dashboard-card {
    background:white; border-radius:.75rem;
    box-shadow:0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
    overflow:hidden; transition:transform 150ms ease,box-shadow 150ms ease
}
.dashboard-card:hover {
    transform:translateY(-2px);
    box-shadow:0 10px 15px -3px rgba(0,0,0,0.1),0 4px 6px -2px rgba(0,0,0,0.05)
}
.card-header {
    padding:1.25rem 1.5rem; border-bottom:1px solid var(--border);
    display:flex; justify-content:space-between; align-items:center;
    flex-wrap:wrap; gap:1rem
}
.card-title {
    font-weight:600; margin:0;
    display:inline-flex; align-items:center; gap:.75rem
}

/* Enhanced Table Styles */
.data-table {
    width:100%; border-collapse:separate; border-spacing:0;
    font-size:0.925rem;
}
.data-table thead th {
    background:linear-gradient(to right,var(--primary),var(--primary-dark));
    color:white; padding:.875rem 1rem; font-weight:600;
    text-align:left; position:sticky; top:0; z-index:10;
    border:none;
}
.data-table thead th:first-child {
    border-top-left-radius:0.75rem;
}
.data-table thead th:last-child {
    border-top-right-radius:0.75rem;
}
.data-table tbody tr { 
    transition:background-color 100ms ease;
    border-bottom:1px solid var(--border);
}
.data-table tbody tr:last-child td {
    border-bottom:none;
}
.data-table tbody tr:hover { 
    background-color:rgba(59,130,246,0.05);
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}
.data-table td {
    padding:1rem; 
    vertical-align:middle;
    border-bottom:1px solid var(--border);
    position:relative;
}
.data-table tbody tr:nth-child(even) {
    background-color:rgba(241,245,249,0.5);
}
.data-table tbody tr:nth-child(even):hover {
    background-color:rgba(59,130,246,0.05);
}

/* Status Badges */
.status-badge {
    display:inline-flex; align-items:center; padding:.375rem .75rem;
    border-radius:9999px; font-size:.8125rem; font-weight:600; line-height:1;
    box-shadow:0 1px 2px rgba(0,0,0,0.05);
}
.status-badge i { 
    margin-right:.375rem; font-size:.75em;
    animation:pulse 2s infinite;
}
@keyframes pulse {
    0% { opacity:1; }
    50% { opacity:0.6; }
    100% { opacity:1; }
}
.status-active { 
    background-color:rgba(16,185,129,0.1); 
    color:var(--success);
    border:1px solid rgba(16,185,129,0.3);
}
.status-pending { 
    background-color:rgba(245,158,11,0.1); 
    color:var(--warning);
    border:1px solid rgba(245,158,11,0.3);
}
.status-allocated { 
    background-color:rgba(16,185,129,0.2); 
    color:var(--success);
    border:1px solid rgba(16,185,129,0.4);
}

/* Matric number */
.matric-no { 
    color:var(--success); 
    font-weight:500;
    font-family:monospace;
    letter-spacing:-0.5px;
}

/* Action Buttons */
.action-btn {
    width:2rem; height:2rem; display:inline-flex;
    align-items:center; justify-content:center;
    border-radius:.5rem; transition:all 150ms ease;
    color:inherit; border:none; background:transparent;
    box-shadow:0 1px 2px rgba(0,0,0,0.1);
}
.action-btn:hover { 
    transform:translateY(-1px);
    box-shadow:0 2px 4px rgba(0,0,0,0.15);
}
.action-btn-view { 
    background-color:rgba(59,130,246,0.1); 
    color:var(--primary);
    border:1px solid rgba(59,130,246,0.2);
}
.action-btn-view:hover {
    background-color:rgba(59,130,246,0.2);
}
.action-btn-delete { 
    background-color:rgba(239,68,68,0.1); 
    color:var(--error);
    border:1px solid rgba(239,68,68,0.2);
}
.action-btn-delete:hover {
    background-color:rgba(239,68,68,0.2);
}

/* Passport Image */
.passport-img {
    width:2.5rem; height:2.5rem; border-radius:.5rem;
    object-fit:cover; border:2px solid var(--border);
    transition:all 200ms ease;
    box-shadow:0 1px 3px rgba(0,0,0,0.1);
}
.passport-img:hover {
    transform:scale(3); z-index:20;
    box-shadow:0 10px 15px -3px rgba(0,0,0,0.2);
    border-color:var(--primary);
}

/* Footer */
.footer {
    background:var(--dark); color:white; padding:1.5rem 0; margin-top:auto
}
.footer-links {
    display:flex; justify-content:center; flex-wrap:wrap;
    gap:1.25rem; margin-bottom:1rem
}
.footer-link {
    color:rgba(255,255,255,0.7); text-decoration:none;
    transition:color 150ms ease; display:inline-flex;
    align-items:center; gap:.375rem
}
.footer-link:hover { color:white }

/* Print Styles */
@media print {
    .navbar, .footer, .dataTables_length, .dataTables_filter, .dataTables_paginate {
        display:none!important
    }
    .dashboard-card { 
        box-shadow:none; 
        border:1px solid #ddd;
        page-break-inside:avoid;
    }
    .data-table { 
        width:100%!important;
        font-size:0.8rem;
    }
    .data-table td, .data-table th { 
        padding:.5rem; 
        border:1px solid #ddd;
    }
    .data-table thead th {
        background:#f1f1f1!important;
        color:#000!important;
        -webkit-print-color-adjust:exact;
        print-color-adjust:exact;
    }
    .status-badge {
        background:#f1f1f1!important;
        color:#000!important;
        border:1px solid #ddd!important;
        -webkit-print-color-adjust:exact;
        print-color-adjust:exact;
    }
}

/* DataTable Customizations */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding:0.375rem 0.75rem;
    margin-left:0.25rem;
    border-radius:0.375rem;
    border:1px solid var(--border);
    color:var(--dark);
    transition:all 150ms ease;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background:var(--primary);
    color:white!important;
    border-color:var(--primary);
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background:var(--primary);
    color:white!important;
    border-color:var(--primary);
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    opacity:0.5;
    cursor:not-allowed;
}
.dataTables_wrapper .dataTables_info {
    color:var(--gray);
    padding-top:0.75rem;
}
.dataTables_wrapper .dataTables_filter input {
    border:1px solid var(--border);
    border-radius:0.375rem;
    padding:0.375rem 0.75rem;
    margin-left:0.5rem;
}
.dataTables_wrapper .dataTables_length select {
    border:1px solid var(--border);
    border-radius:0.375rem;
    padding:0.375rem 0.75rem;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-home"></i>
                <span class="d-none d-sm-inline">Hostel Allocation</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('filter.printFilter') }}">
                            <i class="fas fa-print"></i>
                            <span class="d-none d-sm-inline">Reports</span>
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2">
        <img 
            src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
            alt="Profile Icon" 
            width="35" 
            height="35" 
            class="rounded-circle"
        >
        <span>Welcome, {{ auth()->user()->name }}</span>
    </a>

    @auth
        @if(auth()->user()->role !== 'admin')
            <a href="https://iauestudentsaffairs.com:2096/cpsess9835740684/3rdparty/roundcube/?_task=mail&_mbox=INBOX" 
               class="btn btn-sm btn-outline-light me-2" 
               target="_blank" 
               rel="noopener noreferrer"
               title="Access Webmail">
                <i class="fas fa-envelope"></i>
                <span class="d-none d-sm-inline">Webmail</span>
            </a>
        @endif
    @endauth

    <a href="{{ url('/logout') }}" class="btn btn-sm btn-outline-light" title="Logout">
        <i class="fas fa-sign-out-alt"></i>
        <span class="d-none d-sm-inline">Logout</span>
    </a>
</div>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container-fluid">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-bed text-primary"></i>
                        Student Allocations
                    </h2>
                    <div class="text-muted">
                       <a class="navbar-brand fw-bold" "">Hi, {{ auth()->user()->name }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="allocationsTable" class="data-table w-100">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Matric No.</th>
                                <th>Room</th>
                                <th>Campus</th>
                                <th>Hostel</th>
                                <th>Status</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hostels as $item)
                            <tr>
                                <td data-label="S/N">{{ $loop->iteration }}</td>
                                <td data-label="Name">{{ $item->name }}</td>
                                <td data-label="Matric No."><code class="matric-no">{{ $item->matriculation_number }}</code></td>
                                <td data-label="Room"><span class="badge bg-primary">{{ $item->assigned_Room }}</span></td>
                                <td data-label="Campus">{{ $item->campus }}</td>
                                <td data-label="Hostel">{{ $item->hostel_choice }}</td>
                                <td data-label="Status">
                                    <span class="status-badge {{ $item->status === 'Allocated' ? 'status-allocated' : 'status-pending' }}">
                                        <i class="fas fa-circle"></i>
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td data-label="Photo">
                                    <img src="{{ asset($item->photo) }}" class="passport-img" loading="lazy" alt="Student photo">
                                </td>
                                <td data-label="Actions">
                                    <div class="d-flex gap-2 action-btns">
                                        <a href="{{ url('admin/view/' . $item->id) }}" class="action-btn action-btn-view" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @auth
    @if(auth()->user()->role === 'super_admin')
        <form action="{{ route('record.destroy', $item->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button type="submit" class="action-btn action-btn-delete" title="Delete Record" onclick="return confirm('Are you sure you want to delete this record?')">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    @else
        <button class="action-btn action-btn-delete" title="Only Superadmin can delete" disabled style="opacity: 0.5; cursor: not-allowed;">
            <i class="fas fa-trash-alt"></i>
        </button>
    @endif
@endauth

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-light py-4 mt-5 text-center border-top">
        <p class="mb-1 fw-bold">&copy; 2022–2025 IAUE SA</p>
        <p class="mb-1 text-success small">100% Uptime | Powered by <a href="https://wa.me/248132084092" target="_blank">Esau De Genius</a></p>
        <p class="small text-muted">By using this site, you agree to our <a href="/-/Terms and Conditions for Hostel Services at Ignatius Ajuru University of Education.pdf" target="_blank">Terms</a>. All content is protected by intellectual property law.</p>
        <p><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s" alt="Security" style="max-width:120px"></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#allocationsTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search students...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No matching records found",
                    zeroRecords: "No matching records found",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        next: '<i class="fas fa-angle-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>'
                    }
                },
                dom: '<"top"<"d-flex justify-content-between align-items-center"lf>><"table-responsive"tr><"bottom"<"d-flex justify-content-between align-items-center"ip>>',
                initComplete: function() {
                    $('.dataTables_filter input').addClass('form-control form-control-sm').attr('placeholder','Search...');
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                    
                    // Add export buttons
                    const btnGroup = $('<div class="btn-group ms-2"></div>');
                    btnGroup.append('<button class="btn btn-sm btn-outline-primary print-btn"><i class="fas fa-print me-1"></i> Print</button>');
                    btnGroup.append('<button class="btn btn-sm btn-outline-primary export-btn"><i class="fas fa-file-export me-1"></i> Export</button>');
                    
                    $('.dataTables_length').after(btnGroup);
                }
            });

            // Print button functionality
            $(document).on('click', '.print-btn', function() {
                window.print();
            });

            // Export button functionality
            $(document).on('click', '.export-btn', function() {
                // This would typically trigger a server-side export
                alert('Export functionality would be implemented here');
            });

            // Security measures
            document.addEventListener('keydown', function(e) {
                if(e.ctrlKey && e.key === 'u') {
                    e.preventDefault();
                    showToast('Source code viewing is restricted');
                }
                if(e.key === 'F12') {
                    e.preventDefault();
                    showToast('Developer tools are restricted');
                }
            });

            function showToast(message) {
                const toast = document.createElement('div');
                toast.className = 'position-fixed bottom-0 end-0 m-3 p-3 bg-danger text-white rounded shadow-sm';
                toast.style.zIndex = '9999';
                toast.style.maxWidth = '320px';
                toast.innerHTML = `<div class="d-flex align-items-center"><i class="fas fa-exclamation-triangle me-2"></i><span>${message}</span></div>`;
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }

            // Initialize tooltips
            $('[title]').tooltip({
                trigger: 'hover',
                placement: 'top'
            });
        });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/659532038d261e1b5f4ea273/1hj7cmohv';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>