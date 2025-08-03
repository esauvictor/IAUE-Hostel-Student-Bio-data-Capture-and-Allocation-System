<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">
    <title>Hostel Allocation Report</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand, .nav-link {
            color: white !important;
        }
        
        .navbar-text .btn {
            background-color: var(--accent-color);
            border: none;
        }
        
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        
        .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 0.5rem;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        table.dataTable {
            border-radius: 8px;
            overflow: hidden;
        }
        
        thead {
            background-color: var(--primary-color);
            color: white;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
        }
        
        footer a {
            color: var(--secondary-color);
        }
        
        .logo {
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.1);
        }
        
        .no-data {
            text-align: center;
            padding: 2rem;
            color: #7f8c8d;
            font-size: 1.2rem;
        }
        
        .no-data i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }
        
        .filter-card {
            background-color: var(--light-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .filter-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" "">
    <img 
        src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
        alt="Profile Icon" 
        width="35" 
        height="35" 
        class="rounded-circle"
    >
    <span>Hi, {{ auth()->user()->name }}</span>
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('filter.printFilter') }}">
                            <i class="fas fa-filter me-1"></i>Filter & Print
                        </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="{{ url('/logout') }}" title="Logout" class="text-decoration-none">
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <div class="container pt-4">
        <div class="filter-card">
            <h5 class="filter-title">
                <i class="fas fa-sliders-h"></i> Filter Options
            </h5>
            <form action="{{ route('filter.printFilter') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="campus" class="form-label">
                            <i class="fas fa-university me-1"></i> Campus:
                        </label>
                        <select class="form-select" name="campus" id="campus">
                            <option value="">Select Campus</option>
                            <option value="Main Campus" {{ request('campus') == 'Main Campus' ? 'selected' : '' }}>Main Campus</option>
                            <option value="Ndele Campus" {{ request('campus') == 'Ndele Campus' ? 'selected' : '' }}>Ndele Campus</option>
                            <option value="South" {{ request('campus') == "St. John's Campus" ? 'selected' : '' }}>St. John's Campus</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="hostel" class="form-label">
                            <i class="fas fa-bed me-1"></i> Hostel:
                        </label>
                       <select class="form-select" name="hostel" id="hostel">
                       <option value="">Select Hostel</option>
                       <option value="HOSTEL A" {{ request('hostel') == 'HOSTEL A' ? 'selected' : '' }}>HOSTEL A</option>
                       <option value="HOSTEL B" {{ request('hostel') == 'HOSTEL B' ? 'selected' : '' }}>HOSTEL B</option>
                       <option value="HOSTEL C" {{ request('hostel') == 'HOSTEL C' ? 'selected' : '' }}>HOSTEL C</option>
                       <option value="HOSTEL D" {{ request('hostel') == 'HOSTEL D' ? 'selected' : '' }}>HOSTEL D</option>
                       <option value="HOSTEL E" {{ request('hostel') == 'HOSTEL E' ? 'selected' : '' }}>HOSTEL E</option>
                       <option value="HOSTEL F" {{ request('hostel') == 'HOSTEL F' ? 'selected' : '' }}>HOSTEL F</option>
                       <option value="HOSTEL G" {{ request('hostel') == 'HOSTEL G' ? 'selected' : '' }}>HOSTEL G</option>
                       <option value="HOSTEL H" {{ request('hostel') == 'HOSTEL H' ? 'selected' : '' }}>HOSTEL H</option>
                       <option value="STELLA OBASANJO" {{ request('hostel') == 'STELLA OBASANJO' ? 'selected' : '' }}>STELLA OBASANJO</option>
                       <option value="NEW HEAVEN HOSTEL" {{ request('hostel') == 'NEW HEAVEN HOSTEL' ? 'selected' : '' }}>NEW HEAVEN HOSTEL</option>
                       <option value="SALVATION HOSTEL SINGLE ROOM" {{ request('hostel') == 'SALVATION HOSTEL SINGLE ROOM' ? 'selected' : '' }}>SALVATION HOSTEL SINGLE ROOM</option>
                       <option value="SALVATION (SELFCON)" {{ request('hostel') == 'SALVATION (SELFCON)' ? 'selected' : '' }}>SALVATION (SELFCON)</option>
                       </select>

                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">
                            <i class="fas fa-info-circle me-1"></i> Status:
                        </label>
                        <select class="form-select" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="Not yet Allocated" {{ request('status') == 'Not yet Allocated' ? 'selected' : '' }}>Not yet Allocated</option>
                            <option value="Allocated" {{ request('status') == 'Allocated' ? 'selected' : '' }}>Allocated</option>
                            <option value="Deallocated" {{ request('status') == 'Deallocated' ? 'selected' : '' }}>Deallocated</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(isset($filteredHostels) && $filteredHostels->isNotEmpty())
            <div class="table-responsive">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Mat/Reg.No.</th>
                            <th>Department</th> 
                            <th>Hostel</th>
                            <th>Status</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredHostels as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->matriculation_number}}</td>
                            <td>{{ $item->department}}</td>
                            <td>{{ $item->hostel_choice}}</td>
                            <td>
                                @if($item->status == 'Allocated')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> {{ $item->status }}
                                    </span>
                                @elseif($item->status == 'Not yet Allocated')
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-clock me-1"></i> {{ $item->status }}
                                    </span>
                                @elseif($item->status == 'Deallocated')
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times-circle me-1"></i> {{ $item->status }}
                                    </span>
                                @else
                                    {{ $item->status }}
                                @endif
                            </td>
                            <td>{{ $item->assigned_Room }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        @else 
            <div class="no-data">
                <i class="fas fa-database"></i>
                <p>No Matching Records Found</p>
                <p class="text-muted">Try adjusting your search filters</p>
            </div>
        @endif
    </div>

<!-- Footer --> <footer class="bg-light py-4 mt-5 text-center border-top"> <p class="mb-1 fw-bold">&copy; 2022–2025 IAUE SA</p> <p class="mb-1 text-success small">100% Uptime | Powered by <a href="https://wa.me/248132084092" target="_blank">Esau De Genius</a></p> <p class="small text-muted"> By using this site, you agree to our <a href="/-/Terms and Conditions for Hostel Services at Ignatius Ajuru University of Education.pdf" target="_blank">Terms</a>. All content is protected by intellectual property law. </p> <p><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s" alt="Security" style="max-width: 120px;"></p> </footer>
    <!-- Updated Scripts Section -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- DataTables Core JS -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    
    <!-- DataTables Buttons JS and dependencies -->
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    
    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    
    <!-- PDFMake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    $(document).ready(function () {
        const roomColIndex = 6; // Index of the Room column (0-based)

        // Function to extract just the status text (removes HTML tags)
        function getCleanStatus(statusHtml) {
            const temp = document.createElement('div');
            temp.innerHTML = statusHtml;
            return temp.textContent || temp.innerText || '';
        }

        // Function to format data exactly like the image
        function formatDataForExport(data) {
            let result = [];
            let currentRoom = '';
            
            // Group by room
            const grouped = {};
            data.forEach(row => {
                const room = row[roomColIndex];
                if (!grouped[room]) {
                    grouped[room] = [];
                }
                // Clean the status field
                row[5] = getCleanStatus(row[5]);
                grouped[room].push(row);
            });
            
            // Sort rooms numerically (Room 01, Room 02, etc.)
            const sortedRooms = Object.keys(grouped).sort((a, b) => {
                return parseInt(a.match(/\d+/)) - parseInt(b.match(/\d+/));
            });
            
            // Build the output structure
            sortedRooms.forEach(room => {
                // Add room header
                result.push(['ROOM: ' + room, '', '', '', '', '', '']);
                
                // Add student entries with numbering
                grouped[room].forEach((row, index) => {
                    const studentEntry = [
                        index + 1 + '.',          // Numbering
                        row[1],                   // Name
                        row[2],                   // Matric No
                        row[3],                  // Department
                        row[4],                   // Hostel
                        row[5],                   // Cleaned Status
                        ''                       // Empty for room (already in header)
                    ];
                    result.push(studentEntry);
                });
                
                // Add empty row between rooms
                result.push(['', '', '', '', '', '', '']);
            });
            
            return result;
        }

        const table = new DataTable('#example', {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy me-1"></i> Copy',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible',
                        modifier: { order: 'current', page: 'all' }
                    },
                    customize: function (data) {
                        data.body = formatDataForExport(data.body);
                        data.header = [
                            '#', 'Name', 'Mat/Reg.No.', 'Department', 'Hostel', 'Status', 'Room'
                        ];
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv me-1"></i> CSV',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible',
                        modifier: { order: 'current', page: 'all' }
                    },
                    customize: function (data) {
                        data.body = formatDataForExport(data.body);
                        data.header = [
                            '#', 'Name', 'Mat/Reg.No.', 'Department', 'Hostel', 'Status', 'Room'
                        ];
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel me-1"></i> Excel',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible',
                        modifier: { order: 'current', page: 'all' }
                    },
                    customize: function (xlsx) {
                        const sheet = xlsx.xl.worksheets['sheet1.xml'];
                        
                        // Get the original data
                        const table = $('#example').DataTable();
                        const data = table.rows({ search: 'applied' }).data().toArray();
                        
                        // Clear existing content
                        $('row:gt(0)', sheet).remove();
                        
                        // Group by room and clean status
                        const grouped = {};
                        data.forEach(row => {
                            const room = row[roomColIndex];
                            if (!grouped[room]) {
                                grouped[room] = [];
                            }
                            // Clean the status field
                            row[5] = getCleanStatus(row[5]);
                            grouped[room].push(row);
                        });
                        
                        // Sort rooms numerically
                        const sortedRooms = Object.keys(grouped).sort((a, b) => {
                            return parseInt(a.match(/\d+/)) - parseInt(b.match(/\d+/));
                        });
                        
                        // Add formatted data
                        let rowIndex = 1;
                        sortedRooms.forEach(room => {
                            // Add room header
                            addExcelRow(sheet, rowIndex++, ['ROOM: ' + room, '', '', '', '', '', '']);
                            
                            // Add student entries
                            grouped[room].forEach((row, i) => {
                                addExcelRow(sheet, rowIndex++, [
                                    (i + 1) + '.',
                                    row[1],  // Name
                                    row[2],  // Matric No
                                    row[3],  // Department
                                    row[4],  // Hostel
                                    row[5],  // Cleaned Status
                                    ''       // Room (blank)
                                ]);
                            });
                            
                            // Add empty row
                            addExcelRow(sheet, rowIndex++, ['', '', '', '', '', '', '']);
                        });
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible',
                        modifier: { order: 'current', page: 'all' }
                    },
                    customize: function (doc) {
                        // Get the original data
                        const table = $('#example').DataTable();
                        const data = table.rows({ search: 'applied' }).data().toArray();
                        
                        // Group by room and clean status
                        const grouped = {};
                        data.forEach(row => {
                            const room = row[roomColIndex];
                            if (!grouped[room]) {
                                grouped[room] = [];
                            }
                            // Clean the status field
                            row[5] = getCleanStatus(row[5]);
                            grouped[room].push(row);
                        });
                        
                        // Sort rooms numerically
                        const sortedRooms = Object.keys(grouped).sort((a, b) => {
                            return parseInt(a.match(/\d+/)) - parseInt(b.match(/\d+/));
                        });
                        
                        // Build content array
                        const content = [];
                        
                        // Add title
                 content.push(
    {
        text: 'IGNATIUS AJURU UNIVERSITY OF EDUCATION',
        style: 'header',
        alignment: 'center',
        margin: [0, 0, 0, 5]
    },
    {
        text: "STUDENTS AFFAIRS UNIT",
        style: 'header',
        alignment: 'center',
        margin: [0, 0, 0, 5]
    },
    {
        text: 'HOSTEL ALLOCATION REPORT',
        style: 'header',
        alignment: 'center',
        margin: [0, 0, 0, 20]
    }
);




                        
                        // Add grouped content
                        sortedRooms.forEach(room => {
                            // Add room header
                            content.push({
                                text: 'ROOM: ' + room,
                                style: 'roomHeader',
                                margin: [0, 10, 0, 5]
                            });
                            
                            // Create student table
                            const studentTable = {
                                table: {
                                    widths: ['auto', '*', '*', '*', '*', '*'],
                                    body: [
                                        [
                                            { text: '#', style: 'tableHeader' },
                                            { text: 'Name', style: 'tableHeader' },
                                            { text: 'Mat/Reg.No.', style: 'tableHeader' },
                                            { text: 'Department', style: 'tableHeader' },
                                            { text: 'Hostel', style: 'tableHeader' },
                                            { text: 'Status', style: 'tableHeader' }
                                        ]
                                    ]
                                }
                            };
                            
                            // Add students
                            grouped[room].forEach((row, i) => {
                                studentTable.table.body.push([
                                    { text: (i + 1) + '.', style: 'tableBody' },
                                    { text: row[1], style: 'tableBody' }, // Name
                                    { text: row[2], style: 'tableBody' }, // Matric No
                                    { text: row[3], style: 'tableBody' }, // Department
                                    { text: row[4], style: 'tableBody' }, // Hostel
                                    { text: row[5], style: 'tableBody' }  // Cleaned Status
                                ]);
                            });
                            
                            content.push(studentTable);
                            content.push({ text: '', margin: [0, 0, 0, 10] }); // Spacer
                        });
                        
                        // Replace the default content
                        doc.content = content;
                        
                        // Styles
                        doc.styles = {
                            header: {
                                fontSize: 18,
                                bold: true
                            },
                            roomHeader: {
                                fontSize: 14,
                                bold: true,
                                color: '#2c3e50'
                            },
                            tableHeader: {
                                bold: true,
                                fontSize: 11,
                                color: 'white',
                                fillColor: '#2c3e50'
                            },
                            tableBody: {
                                fontSize: 10
                            }
                        };
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print me-1"></i> Print',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible',
                        modifier: { order: 'current', page: 'all' }
                    },
                    customize: function (win) {
    $(win.document.body).html(
        '<h1 style="text-align: center; line-height: 1.5; font-size: 20px; font-weight: bold; color: #003366;">' +
            'IGNATIUS AJURU UNIVERSITY OF EDUCATION<br>' +
            "STUDENTS AFFAIRS UNIT<br>" +
            'HOSTEL ALLOCATION REPORT' +
        '</h1>' +
        '<div id="print-content"></div>'
                        );
                        
                        const table = $('#example').DataTable();
                        const data = table.rows({ search: 'applied' }).data().toArray();
                        const grouped = {};
                        
                        // Group by room and clean status
                        data.forEach(row => {
                            const room = row[roomColIndex];
                            if (!grouped[room]) {
                                grouped[room] = [];
                            }
                            // Clean the status field
                            row[5] = getCleanStatus(row[5]);
                            grouped[room].push(row);
                        });
                        
                        // Sort rooms numerically
                        const sortedRooms = Object.keys(grouped).sort((a, b) => {
                            return parseInt(a.match(/\d+/)) - parseInt(b.match(/\d+/));
                        });
                        
                        let printContent = '';
                        
                        // Build the print content
                        sortedRooms.forEach(room => {
                            printContent += `
                                <h3 style="margin-top: 20px;">ROOM: ${room}</h3>
                                <table border="1" style="width:100%; border-collapse:collapse; margin-bottom:20px;">
                                    <thead>
                                        <tr style="background-color:#2c3e50; color:white;">
                                            <th style="padding:5px;">#</th>
                                            <th style="padding:5px;">Name</th>
                                            <th style="padding:5px;">Mat/Reg.No.</th>
                                            <th style="padding:5px;">Department</th>
                                            <th style="padding:5px;">Hostel</th>
                                            <th style="padding:5px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            `;
                            
                            // Add student rows
                            grouped[room].forEach((row, i) => {
                                printContent += `
                                    <tr>
                                        <td style="padding:5px;">${i + 1}.</td>
                                        <td style="padding:5px;">${row[1]}</td>
                                        <td style="padding:5px;">${row[2]}</td>
                                        <td style="padding:5px;">${row[3]}</td>
                                        <td style="padding:5px;">${row[4]}</td>
                                        <td style="padding:5px;">${row[5]}</td>
                                    </tr>
                                `;
                            });
                            
                            printContent += `
                                    </tbody>
                                </table>
                            `;
                        });
                        
                        $('#print-content', win.document).html(printContent);
                    }
                }
            ],
            order: [[roomColIndex, 'asc']],
            responsive: true,
            columnDefs: [
                { targets: [roomColIndex], visible: false }
            ],
            drawCallback: function (settings) {
                const api = this.api();
                const startIndex = api.page.info().start;
                let currentRoom = '';

                api.column(0, { page: 'current' }).nodes().each(function (cell, i) {
                    cell.innerHTML = startIndex + i + 1;
                });

                api.rows({ page: 'current' }).every(function () {
                    const data = this.data();
                    const room = data[roomColIndex];
                    const row = this.node();

                    if (room !== currentRoom) {
                        currentRoom = room;
                        $(row).before(
                            '<tr class="group-row" style="background-color:#f2f2f2;">' +
                            '<td colspan="7"><strong>ROOM: ' + room + '</strong></td>' +
                            '</tr>'
                        );
                    }
                });
            }
        });

        // Helper function for Excel export
        function addExcelRow(sheet, rowIndex, values) {
            const row = $('row[r="' + rowIndex + '"]', sheet);
            if (row.length === 0) {
                $('sheetData', sheet).append('<row r="' + rowIndex + '"></row>');
            }
            
            values.forEach((value, colIndex) => {
                const cell = $('c[r="' + String.fromCharCode(65 + colIndex) + rowIndex + '"]', sheet);
                if (cell.length === 0) {
                    $('row[r="' + rowIndex + '"]', sheet).append(
                        '<c r="' + String.fromCharCode(65 + colIndex) + rowIndex + '" t="inlineStr">' +
                        '<is><t>' + (value || '') + '</t></is></c>'
                    );
                }
            });
        }

        document.addEventListener("keydown", function (e) {
            if (e.ctrlKey && e.key.toLowerCase() === "u") {
                e.preventDefault();
                alert("Viewing source code is not permitted.");
            }
        });
    });
</script>



</body>
</html>