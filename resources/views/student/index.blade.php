<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Bio-Data Capture</title>
    <link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Base Styles */
        body {
            background-image: url('https://hostel.iauestudentsaffairs.com/-/background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Logo Styles */
        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 20px auto;
            border: 5px solid #007bff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            display: block;
        }
        
        /* Form Styles */
        .form-section {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .form-control, .custom-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .form-control:focus, .custom-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
            background-color: white;
        }
        
        label {
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 5px;
            display: block;
        }
        
        .input-group-text {
            background-color: #007bff;
            color: white;
            border: none;
        }
        
        .custom-file-label {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        /* Button Styles */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        /* OTP Modal Styles */
        #otpModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 1050;
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background-color: #f8f9fa;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            color: #333;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            border: none;
        }
        
        .otp-input {
            width: 45px;
            height: 45px;
            text-align: center;
            font-size: 20px;
            margin: 0 5px;
            border-radius: 5px;
            border: 2px solid #ddd;
            font-weight: bold;
        }
        
        .otp-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        
        /* Spinner Styles */
        .spinner {
            display: none;
            width: 40px;
            height: 40px;
            margin: 0 auto 20px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 4px solid #007bff;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Alert Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
        }
        
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        
        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }
        
        /* Terms Modal Styles */
        #termsModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 1050;
        }
        
        .terms-content {
            background: white;
            width: 90%;
            max-width: 700px;
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            max-height: 80vh;
            overflow-y: auto;
            color: #333;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        /* Footer Styles */
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #ffffff;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            margin-top: 40px;
        }
        
        footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        
        /* Section Headers */
        .section-header {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
        
        /* Shake Animation */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
        }
        
        .shake {
            animation: shake 0.5s;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .form-section {
                padding: 20px;
            }
            
            .otp-input {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .modal-content {
                margin: 20% auto;
                padding: 20px;
            }
            
            .section-header {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <img src="https://iaue.edu.ng/wp-content/uploads/2024/03/cropped-Ignatus-log.png" alt="IAUE Logo" class="logo">
        </div>
        
        <h2 class="text-center mb-4" style="color: #ffffff; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">Hostel Bio-Data Capture Form</h2>
        
        @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle mr-2"></i>{{$error}}
            </div>
            @endforeach
        @endif
        
        @if(session()->has('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle mr-2"></i>{{session('error')}}
        </div>
        @endif
        
        @if(session()->has('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle mr-2"></i>{{session('success')}}
        </div>
        @endif
        
  <div class="form-section">
  <div style="
    margin-bottom: 30px; 
    padding: 20px; 
    background-color: #e7f3fe; 
    border-radius: 8px; 
    color: #004085;
  ">
    <h4 style="color: #004085; margin-bottom: 15px;">
      <i class="fas fa-info-circle" style="margin-right: 8px;"></i>Important Instructions
    </h4>
    <ul style="padding-left: 20px; margin: 0;">
      <li>All fields marked with <span style="color: red;">*</span> are required.</li>
      <li>Ensure your passport photo meets the specified requirements.</li>
      <li>Contact the admin on WhatsApp for the OTP.</li>
      <li>Only students on the hostel list should complete this form.</li>
    </ul>
  </div>

  <div style="margin-bottom: 10px;">
    <i class="fa fa-camera" style="color: #004085; font-size: 18px;"></i>
  </div>

  <div style="
    display: flex; 
    flex-wrap: wrap; 
    align-items: flex-start; 
    margin-top: 10px;
  ">
    <img 
      src="https://hostel.iauestudentsaffairs.com/-/white.jpeg" 
      alt="White  sample photo" 
      style="
        width: 120px; 
        height: 120px; 
        object-fit: cover; 
        border-radius: 6px; 
        border: 2px solid #b8daff; 
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); 
        margin: 0 20px 20px 0;
      "
    >
    <img 
      src="https://hostel.iauestudentsaffairs.com/-/blue.jpeg" 
      alt="Blue sample photo" 
      style="
        width: 120px; 
        height: 120px; 
        object-fit: cover; 
        border-radius: 6px; 
        border: 2px solid #b8daff; 
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); 
        margin: 0 20px 20px 0;
      "
    >
    <img 
      src="https://hostel.iauestudentsaffairs.com/-/red.jpeg" 
      alt="Red sample photo" 
      style="
        width: 120px; 
        height: 120px; 
        object-fit: cover; 
        border-radius: 6px; 
        border: 2px solid #b8daff; 
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); 
        margin: 0 20px 20px 0;
      "
    >
  </div>
</div>

            <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data" id="hostelForm">
                @csrf
                <input type="hidden" name="status" value="Not Yet Allocated">
                <input type="hidden" name="otp_verified" id="otpVerified" value="0">

                <!-- Section 1: Personal Information -->
                <h4 class="mb-3" style="color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 5px;">
                    <i class="fas fa-user-circle mr-2"></i>Personal Information
                </h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-id-card mr-2 text-primary"></i>Matriculation Number <span style="color: red;">*</span></label>
                        <input type="text" name="matriculation_number" class="form-control" placeholder="e.g. U/2022/17921 or 20251937485JK" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="d-flex align-items-center">
                            <i class="fas fa-camera mr-2 text-primary"></i>
                            Passport Photograph <span style="color: red;">*</span>
                            <small class="text-muted ml-2"></small>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-upload"></i>
                                </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="photoUpload" accept="image/*" required>
                                <label class="custom-file-label" for="photoUpload">Choose photo</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
   <div class="col-md-6 mb-3">
    <label><i class="fas fa-user mr-2 text-primary"></i>Full Name <span style="color: red;">*</span></label>
    <input 
        type="text" 
        name="name" 
        id="fullName" 
        class="form-control" 
        placeholder="Surname Firstname Middlename" 
        required
    >
</div>
  <div class="col-md-6 mb-3">
    <label><i class="fas fa-map-marker-alt mr-2 text-primary"></i>State of Origin <span style="color: red;">*</span></label>
    <select name="state_of_origin" class="form-control" required>
        <option value="" disabled selected>-- Select State --</option>
        <option value="Abia">Abia</option>
        <option value="Adamawa">Adamawa</option>
        <option value="Akwa Ibom">Akwa Ibom</option>
        <option value="Anambra">Anambra</option>
        <option value="Bauchi">Bauchi</option>
        <option value="Bayelsa">Bayelsa</option>
        <option value="Benue">Benue</option>
        <option value="Borno">Borno</option>
        <option value="Cross River">Cross River</option>
        <option value="Delta">Delta</option>
        <option value="Ebonyi">Ebonyi</option>
        <option value="Edo">Edo</option>
        <option value="Ekiti">Ekiti</option>
        <option value="Enugu">Enugu</option>
        <option value="Federal Capital Territory">Federal Capital Territory</option>
        <option value="Gombe">Gombe</option>
        <option value="Imo">Imo</option>
        <option value="Jigawa">Jigawa</option>
        <option value="Kaduna">Kaduna</option>
        <option value="Kano">Kano</option>
        <option value="Katsina">Katsina</option>
        <option value="Kebbi">Kebbi</option>
        <option value="Kogi">Kogi</option>
        <option value="Kwara">Kwara</option>
        <option value="Lagos">Lagos</option>
        <option value="Nasarawa">Nasarawa</option>
        <option value="Niger">Niger</option>
        <option value="Ogun">Ogun</option>
        <option value="Ondo">Ondo</option>
        <option value="Osun">Osun</option>
        <option value="Oyo">Oyo</option>
        <option value="Plateau">Plateau</option>
        <option value="Rivers">Rivers</option>
        <option value="Sokoto">Sokoto</option>
        <option value="Taraba">Taraba</option>
        <option value="Yobe">Yobe</option>
        <option value="Zamfara">Zamfara</option>
    </select>
</div>
</div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-calendar-alt mr-2 text-primary"></i>Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                   <div class="col-md-6 mb-3">
    <label><i class="fas fa-home mr-2 text-primary"></i>Residential Address <span style="color: red;">*</span></label>
    <input type="text" name="residential_address" class="form-control" 
           placeholder="e.g. 123 Main Street, City, State" required>
</div>
</div>
                
              <div class="row">
    <div class="col-md-6 mb-3">
        <label><i class="fas fa-envelope mr-2 text-primary"></i>Email Address <span style="color: red;">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="e.g. yourname@example.com" required>
    </div>
    
                   <div class="col-md-6 mb-3">
    <label><i class="fas fa-phone-alt mr-2 text-primary"></i>Phone Number <span style="color: red;">*</span></label>
    <input 
        type="tel" 
        name="phone_number" 
        id="phoneNumber" 
        class="form-control" 
        placeholder="e.g. 08132084092" 
        pattern="[0-9]{11}" 
        maxlength="11" 
        required
        oninput="this.value = this.value.replace(/\D/g, '').slice(0, 11)"
        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
    >
    <small class="form-text text-success">Enter 11-digit Nigerian number (e.g., 08132084092)</small>
</div>
                </div>
                
                <div class="row">
    <div class="col-md-6 mb-3">
    <label><i class="fas fa-map-pin mr-2 text-primary"></i>Local Government Area <span style="color: red;">*</span></label>
    <select name="local_government_area" class="form-control" required>
        <option value="">-- Select LGA --</option>
        
        <!-- ABIA STATE (17 LGAs) -->
        <optgroup label="Abia State">
            <option value="Aba North">Aba North</option>
            <option value="Aba South">Aba South</option>
            <option value="Arochukwu">Arochukwu</option>
            <option value="Bende">Bende</option>
            <option value="Ikwuano">Ikwuano</option>
            <option value="Isiala Ngwa North">Isiala Ngwa North</option>
            <option value="Isiala Ngwa South">Isiala Ngwa South</option>
            <option value="Isuikwuato">Isuikwuato</option>
            <option value="Obi Ngwa">Obi Ngwa</option>
            <option value="Ohafia">Ohafia</option>
            <option value="Osisioma">Osisioma</option>
            <option value="Ugwunagbo">Ugwunagbo</option>
            <option value="Ukwa East">Ukwa East</option>
            <option value="Ukwa West">Ukwa West</option>
            <option value="Umuahia North">Umuahia North</option>
            <option value="Umuahia South">Umuahia South</option>
            <option value="Umu Nneochi">Umu Nneochi</option>
        </optgroup>

        <!-- ADAMAWA STATE (21 LGAs) -->
        <optgroup label="Adamawa State">
            <option value="Demsa">Demsa</option>
            <option value="Fufure">Fufure</option>
            <option value="Ganye">Ganye</option>
            <option value="Gayuk">Gayuk</option>
            <option value="Gombi">Gombi</option>
            <option value="Grie">Grie</option>
            <option value="Hong">Hong</option>
            <option value="Jada">Jada</option>
            <option value="Lamurde">Lamurde</option>
            <option value="Madagali">Madagali</option>
            <option value="Maiha">Maiha</option>
            <option value="Mayo-Belwa">Mayo-Belwa</option>
            <option value="Michika">Michika</option>
            <option value="Mubi North">Mubi North</option>
            <option value="Mubi South">Mubi South</option>
            <option value="Numan">Numan</option>
            <option value="Shelleng">Shelleng</option>
            <option value="Song">Song</option>
            <option value="Toungo">Toungo</option>
            <option value="Yola North">Yola North</option>
            <option value="Yola South">Yola South</option>
        </optgroup>

        <!-- AKWA IBOM STATE (31 LGAs) -->
        <optgroup label="Akwa Ibom State">
            <option value="Abak">Abak</option>
            <option value="Eastern Obolo">Eastern Obolo</option>
            <option value="Eket">Eket</option>
            <option value="Esit Eket">Esit Eket</option>
            <option value="Essien Udim">Essien Udim</option>
            <option value="Etim Ekpo">Etim Ekpo</option>
            <option value="Etinan">Etinan</option>
            <option value="Ibeno">Ibeno</option>
            <option value="Ibesikpo Asutan">Ibesikpo Asutan</option>
            <option value="Ibiono Ibom">Ibiono Ibom</option>
            <option value="Ika">Ika</option>
            <option value="Ikono">Ikono</option>
            <option value="Ikot Abasi">Ikot Abasi</option>
            <option value="Ikot Ekpene">Ikot Ekpene</option>
            <option value="Ini">Ini</option>
            <option value="Itu">Itu</option>
            <option value="Mbo">Mbo</option>
            <option value="Mkpat Enin">Mkpat Enin</option>
            <option value="Nsit Atai">Nsit Atai</option>
            <option value="Nsit Ibom">Nsit Ibom</option>
            <option value="Nsit Ubium">Nsit Ubium</option>
            <option value="Obot Akara">Obot Akara</option>
            <option value="Okobo">Okobo</option>
            <option value="Onna">Onna</option>
            <option value="Oron">Oron</option>
            <option value="Oruk Anam">Oruk Anam</option>
            <option value="Udung Uko">Udung Uko</option>
            <option value="Ukanafun">Ukanafun</option>
            <option value="Uruan">Uruan</option>
            <option value="Urue-Offong/Oruko">Urue-Offong/Oruko</option>
            <option value="Uyo">Uyo</option>
        </optgroup>

        <!-- ANAMBRA STATE (21 LGAs) -->
        <optgroup label="Anambra State">
            <option value="Aguata">Aguata</option>
            <option value="Anambra East">Anambra East</option>
            <option value="Anambra West">Anambra West</option>
            <option value="Anaocha">Anaocha</option>
            <option value="Awka North">Awka North</option>
            <option value="Awka South">Awka South</option>
            <option value="Ayamelum">Ayamelum</option>
            <option value="Dunukofia">Dunukofia</option>
            <option value="Ekwusigo">Ekwusigo</option>
            <option value="Idemili North">Idemili North</option>
            <option value="Idemili South">Idemili South</option>
            <option value="Ihiala">Ihiala</option>
            <option value="Njikoka">Njikoka</option>
            <option value="Nnewi North">Nnewi North</option>
            <option value="Nnewi South">Nnewi South</option>
            <option value="Ogbaru">Ogbaru</option>
            <option value="Onitsha North">Onitsha North</option>
            <option value="Onitsha South">Onitsha South</option>
            <option value="Orumba North">Orumba North</option>
            <option value="Orumba South">Orumba South</option>
            <option value="Oyi">Oyi</option>
        </optgroup>

        <!-- BAUCHI STATE (20 LGAs) -->
        <optgroup label="Bauchi State">
            <option value="Alkaleri">Alkaleri</option>
            <option value="Bauchi">Bauchi</option>
            <option value="Bogoro">Bogoro</option>
            <option value="Damban">Damban</option>
            <option value="Darazo">Darazo</option>
            <option value="Dass">Dass</option>
            <option value="Gamawa">Gamawa</option>
            <option value="Ganjuwa">Ganjuwa</option>
            <option value="Giade">Giade</option>
            <option value="Itas/Gadau">Itas/Gadau</option>
            <option value="Jama'are">Jama'are</option>
            <option value="Katagum">Katagum</option>
            <option value="Kirfi">Kirfi</option>
            <option value="Misau">Misau</option>
            <option value="Ningi">Ningi</option>
            <option value="Shira">Shira</option>
            <option value="Tafawa Balewa">Tafawa Balewa</option>
            <option value="Toro">Toro</option>
            <option value="Warji">Warji</option>
            <option value="Zaki">Zaki</option>
        </optgroup>

        <!-- BAYELSA STATE (8 LGAs) -->
        <optgroup label="Bayelsa State">
            <option value="Brass">Brass</option>
            <option value="Ekeremor">Ekeremor</option>
            <option value="Kolokuma/Opokuma">Kolokuma/Opokuma</option>
            <option value="Nembe">Nembe</option>
            <option value="Ogbia">Ogbia</option>
            <option value="Sagbama">Sagbama</option>
            <option value="Southern Ijaw">Southern Ijaw</option>
            <option value="Yenagoa">Yenagoa</option>
        </optgroup>

        <!-- BENUE STATE (23 LGAs) -->
        <optgroup label="Benue State">
            <option value="Ado">Ado</option>
            <option value="Agatu">Agatu</option>
            <option value="Apa">Apa</option>
            <option value="Buruku">Buruku</option>
            <option value="Gboko">Gboko</option>
            <option value="Guma">Guma</option>
            <option value="Gwer East">Gwer East</option>
            <option value="Gwer West">Gwer West</option>
            <option value="Katsina-Ala">Katsina-Ala</option>
            <option value="Konshisha">Konshisha</option>
            <option value="Kwande">Kwande</option>
            <option value="Logo">Logo</option>
            <option value="Makurdi">Makurdi</option>
            <option value="Obi">Obi</option>
            <option value="Ogbadibo">Ogbadibo</option>
            <option value="Ohimini">Ohimini</option>
            <option value="Oju">Oju</option>
            <option value="Okpokwu">Okpokwu</option>
            <option value="Oturkpo">Oturkpo</option>
            <option value="Tarka">Tarka</option>
            <option value="Ukum">Ukum</option>
            <option value="Ushongo">Ushongo</option>
            <option value="Vandeikya">Vandeikya</option>
        </optgroup>

        <!-- BORNO STATE (27 LGAs) -->
        <optgroup label="Borno State">
            <option value="Abadam">Abadam</option>
            <option value="Askira/Uba">Askira/Uba</option>
            <option value="Bama">Bama</option>
            <option value="Bayo">Bayo</option>
            <option value="Biu">Biu</option>
            <option value="Chibok">Chibok</option>
            <option value="Damboa">Damboa</option>
            <option value="Dikwa">Dikwa</option>
            <option value="Gubio">Gubio</option>
            <option value="Guzamala">Guzamala</option>
            <option value="Gwoza">Gwoza</option>
            <option value="Hawul">Hawul</option>
            <option value="Jere">Jere</option>
            <option value="Kaga">Kaga</option>
            <option value="Kala/Balge">Kala/Balge</option>
            <option value="Konduga">Konduga</option>
            <option value="Kukawa">Kukawa</option>
            <option value="Kwaya Kusar">Kwaya Kusar</option>
            <option value="Mafa">Mafa</option>
            <option value="Magumeri">Magumeri</option>
            <option value="Maiduguri">Maiduguri</option>
            <option value="Marte">Marte</option>
            <option value="Mobbar">Mobbar</option>
            <option value="Monguno">Monguno</option>
            <option value="Ngala">Ngala</option>
            <option value="Nganzai">Nganzai</option>
            <option value="Shani">Shani</option>
        </optgroup>

        <!-- CROSS RIVER STATE (18 LGAs) -->
        <optgroup label="Cross River State">
            <option value="Abi">Abi</option>
            <option value="Akamkpa">Akamkpa</option>
            <option value="Akpabuyo">Akpabuyo</option>
            <option value="Bakassi">Bakassi</option>
            <option value="Bekwarra">Bekwarra</option>
            <option value="Biase">Biase</option>
            <option value="Boki">Boki</option>
            <option value="Calabar Municipal">Calabar Municipal</option>
            <option value="Calabar South">Calabar South</option>
            <option value="Etung">Etung</option>
            <option value="Ikom">Ikom</option>
            <option value="Obanliku">Obanliku</option>
            <option value="Obubra">Obubra</option>
            <option value="Obudu">Obudu</option>
            <option value="Odukpani">Odukpani</option>
            <option value="Ogoja">Ogoja</option>
            <option value="Yakurr">Yakurr</option>
            <option value="Yala">Yala</option>
        </optgroup>

        <!-- DELTA STATE (25 LGAs) -->
        <optgroup label="Delta State">
            <option value="Aniocha North">Aniocha North</option>
            <option value="Aniocha South">Aniocha South</option>
            <option value="Bomadi">Bomadi</option>
            <option value="Burutu">Burutu</option>
            <option value="Ethiope East">Ethiope East</option>
            <option value="Ethiope West">Ethiope West</option>
            <option value="Ika North East">Ika North East</option>
            <option value="Ika South">Ika South</option>
            <option value="Isoko North">Isoko North</option>
            <option value="Isoko South">Isoko South</option>
            <option value="Ndokwa East">Ndokwa East</option>
            <option value="Ndokwa West">Ndokwa West</option>
            <option value="Okpe">Okpe</option>
            <option value="Oshimili North">Oshimili North</option>
            <option value="Oshimili South">Oshimili South</option>
            <option value="Patani">Patani</option>
            <option value="Sapele">Sapele</option>
            <option value="Udu">Udu</option>
            <option value="Ughelli North">Ughelli North</option>
            <option value="Ughelli South">Ughelli South</option>
            <option value="Ukwuani">Ukwuani</option>
            <option value="Uvwie">Uvwie</option>
            <option value="Warri North">Warri North</option>
            <option value="Warri South">Warri South</option>
            <option value="Warri South West">Warri South West</option>
        </optgroup>

        <!-- EBONYI STATE (13 LGAs) -->
        <optgroup label="Ebonyi State">
            <option value="Abakaliki">Abakaliki</option>
            <option value="Afikpo North">Afikpo North</option>
            <option value="Afikpo South">Afikpo South</option>
            <option value="Ebonyi">Ebonyi</option>
            <option value="Ezza North">Ezza North</option>
            <option value="Ezza South">Ezza South</option>
            <option value="Ikwo">Ikwo</option>
            <option value="Ishielu">Ishielu</option>
            <option value="Ivo">Ivo</option>
            <option value="Izzi">Izzi</option>
            <option value="Ohaozara">Ohaozara</option>
            <option value="Ohaukwu">Ohaukwu</option>
            <option value="Onicha">Onicha</option>
        </optgroup>

        <!-- EDO STATE (18 LGAs) -->
        <optgroup label="Edo State">
            <option value="Akoko-Edo">Akoko-Edo</option>
            <option value="Egor">Egor</option>
            <option value="Esan Central">Esan Central</option>
            <option value="Esan North-East">Esan North-East</option>
            <option value="Esan South-East">Esan South-East</option>
            <option value="Esan West">Esan West</option>
            <option value="Etsako Central">Etsako Central</option>
            <option value="Etsako East">Etsako East</option>
            <option value="Etsako West">Etsako West</option>
            <option value="Igueben">Igueben</option>
            <option value="Ikpoba-Okha">Ikpoba-Okha</option>
            <option value="Oredo">Oredo</option>
            <option value="Orhionmwon">Orhionmwon</option>
            <option value="Ovia North-East">Ovia North-East</option>
            <option value="Ovia South-West">Ovia South-West</option>
            <option value="Owan East">Owan East</option>
            <option value="Owan West">Owan West</option>
            <option value="Uhunmwonde">Uhunmwonde</option>
        </optgroup>

        <!-- EKITI STATE (16 LGAs) -->
        <optgroup label="Ekiti State">
            <option value="Ado Ekiti">Ado Ekiti</option>
            <option value="Efon">Efon</option>
            <option value="Ekiti East">Ekiti East</option>
            <option value="Ekiti South-West">Ekiti South-West</option>
            <option value="Ekiti West">Ekiti West</option>
            <option value="Emure">Emure</option>
            <option value="Gbonyin">Gbonyin</option>
            <option value="Ido-Osi">Ido-Osi</option>
            <option value="Ijero">Ijero</option>
            <option value="Ikere">Ikere</option>
            <option value="Ikole">Ikole</option>
            <option value="Ilejemeje">Ilejemeje</option>
            <option value="Irepodun/Ifelodun">Irepodun/Ifelodun</option>
            <option value="Ise/Orun">Ise/Orun</option>
            <option value="Moba">Moba</option>
            <option value="Oye">Oye</option>
        </optgroup>

        <!-- ENUGU STATE (17 LGAs) -->
        <optgroup label="Enugu State">
            <option value="Aninri">Aninri</option>
            <option value="Awgu">Awgu</option>
            <option value="Enugu East">Enugu East</option>
            <option value="Enugu North">Enugu North</option>
            <option value="Enugu South">Enugu South</option>
            <option value="Ezeagu">Ezeagu</option>
            <option value="Igbo Etiti">Igbo Etiti</option>
            <option value="Igbo Eze North">Igbo Eze North</option>
            <option value="Igbo Eze South">Igbo Eze South</option>
            <option value="Isi Uzo">Isi Uzo</option>
            <option value="Nkanu East">Nkanu East</option>
            <option value="Nkanu West">Nkanu West</option>
            <option value="Nsukka">Nsukka</option>
            <option value="Oji River">Oji River</option>
            <option value="Udenu">Udenu</option>
            <option value="Udi">Udi</option>
            <option value="Uzo-Uwani">Uzo-Uwani</option>
        </optgroup>

        <!-- GOMBE STATE (11 LGAs) -->
        <optgroup label="Gombe State">
            <option value="Akko">Akko</option>
            <option value="Balanga">Balanga</option>
            <option value="Billiri">Billiri</option>
            <option value="Dukku">Dukku</option>
            <option value="Funakaye">Funakaye</option>
            <option value="Gombe">Gombe</option>
            <option value="Kaltungo">Kaltungo</option>
            <option value="Kwami">Kwami</option>
            <option value="Nafada">Nafada</option>
            <option value="Shongom">Shongom</option>
            <option value="Yamaltu/Deba">Yamaltu/Deba</option>
        </optgroup>

        <!-- IMO STATE (27 LGAs) -->
        <optgroup label="Imo State">
            <option value="Aboh Mbaise">Aboh Mbaise</option>
            <option value="Ahiazu Mbaise">Ahiazu Mbaise</option>
            <option value="Ehime Mbano">Ehime Mbano</option>
            <option value="Ezinihitte">Ezinihitte</option>
            <option value="Ideato North">Ideato North</option>
            <option value="Ideato South">Ideato South</option>
            <option value="Ihitte/Uboma">Ihitte/Uboma</option>
            <option value="Ikeduru">Ikeduru</option>
            <option value="Isiala Mbano">Isiala Mbano</option>
            <option value="Isu">Isu</option>
            <option value="Mbaitoli">Mbaitoli</option>
            <option value="Ngor Okpala">Ngor Okpala</option>
            <option value="Njaba">Njaba</option>
            <option value="Nkwerre">Nkwerre</option>
            <option value="Nwangele">Nwangele</option>
            <option value="Obowo">Obowo</option>
            <option value="Oguta">Oguta</option>
            <option value="Ohaji/Egbema">Ohaji/Egbema</option>
            <option value="Okigwe">Okigwe</option>
            <option value="Onuimo">Onuimo</option>
            <option value="Orlu">Orlu</option>
            <option value="Orsu">Orsu</option>
            <option value="Oru East">Oru East</option>
            <option value="Oru West">Oru West</option>
            <option value="Owerri Municipal">Owerri Municipal</option>
            <option value="Owerri North">Owerri North</option>
            <option value="Owerri South">Owerri South</option>
        </optgroup>

        <!-- JIGAWA STATE (27 LGAs) -->
        <optgroup label="Jigawa State">
            <option value="Auyo">Auyo</option>
            <option value="Babura">Babura</option>
            <option value="Biriniwa">Biriniwa</option>
            <option value="Birnin Kudu">Birnin Kudu</option>
            <option value="Buji">Buji</option>
            <option value="Dutse">Dutse</option>
            <option value="Gagarawa">Gagarawa</option>
            <option value="Garki">Garki</option>
            <option value="Gumel">Gumel</option>
            <option value="Guri">Guri</option>
            <option value="Gwaram">Gwaram</option>
            <option value="Gwiwa">Gwiwa</option>
            <option value="Hadejia">Hadejia</option>
            <option value="Jahun">Jahun</option>
            <option value="Kafin Hausa">Kafin Hausa</option>
            <option value="Kaugama">Kaugama</option>
            <option value="Kazaure">Kazaure</option>
            <option value="Kiri Kasama">Kiri Kasama</option>
            <option value="Maigatari">Maigatari</option>
            <option value="Malam Madori">Malam Madori</option>
            <option value="Miga">Miga</option>
            <option value="Ringim">Ringim</option>
            <option value="Roni">Roni</option>
            <option value="Sule Tankarkar">Sule Tankarkar</option>
            <option value="Taura">Taura</option>
            <option value="Yankwashi">Yankwashi</option>
        </optgroup>

        <!-- KADUNA STATE (23 LGAs) -->
        <optgroup label="Kaduna State">
            <option value="Birnin Gwari">Birnin Gwari</option>
            <option value="Chikun">Chikun</option>
            <option value="Giwa">Giwa</option>
            <option value="Igabi">Igabi</option>
            <option value="Ikara">Ikara</option>
            <option value="Jaba">Jaba</option>
            <option value="Jema'a">Jema'a</option>
            <option value="Kachia">Kachia</option>
            <option value="Kaduna North">Kaduna North</option>
            <option value="Kaduna South">Kaduna South</option>
            <option value="Kagarko">Kagarko</option>
            <option value="Kajuru">Kajuru</option>
            <option value="Kaura">Kaura</option>
            <option value="Kauru">Kauru</option>
            <option value="Kubau">Kubau</option>
            <option value="Kudan">Kudan</option>
            <option value="Lere">Lere</option>
            <option value="Makarfi">Makarfi</option>
            <option value="Sabon Gari">Sabon Gari</option>
            <option value="Sanga">Sanga</option>
            <option value="Soba">Soba</option>
            <option value="Zangon Kataf">Zangon Kataf</option>
            <option value="Zaria">Zaria</option>
        </optgroup>

        <!-- KANO STATE (44 LGAs) -->
        <optgroup label="Kano State">
            <option value="Ajingi">Ajingi</option>
            <option value="Albasu">Albasu</option>
            <option value="Bagwai">Bagwai</option>
            <option value="Bebeji">Bebeji</option>
            <option value="Bichi">Bichi</option>
            <option value="Bunkure">Bunkure</option>
            <option value="Dala">Dala</option>
            <option value="Dambatta">Dambatta</option>
            <option value="Dawakin Kudu">Dawakin Kudu</option>
            <option value="Dawakin Tofa">Dawakin Tofa</option>
            <option value="Doguwa">Doguwa</option>
            <option value="Fagge">Fagge</option>
            <option value="Gabasawa">Gabasawa</option>
            <option value="Garko">Garko</option>
            <option value="Garun Mallam">Garun Mallam</option>
            <option value="Gaya">Gaya</option>
            <option value="Gezawa">Gezawa</option>
            <option value="Gwale">Gwale</option>
            <option value="Gwarzo">Gwarzo</option>
            <option value="Kabo">Kabo</option>
            <option value="Kano Municipal">Kano Municipal</option>
            <option value="Karaye">Karaye</option>
            <option value="Kibiya">Kibiya</option>
            <option value="Kiru">Kiru</option>
            <option value="Kumbotso">Kumbotso</option>
            <option value="Kunchi">Kunchi</option>
            <option value="Kura">Kura</option>
            <option value="Madobi">Madobi</option>
            <option value="Makoda">Makoda</option>
            <option value="Minjibir">Minjibir</option>
            <option value="Nassarawa">Nassarawa</option>
            <option value="Rano">Rano</option>
            <option value="Rimin Gado">Rimin Gado</option>
            <option value="Rogo">Rogo</option>
            <option value="Shanono">Shanono</option>
            <option value="Sumaila">Sumaila</option>
            <option value="Takai">Takai</option>
            <option value="Tarauni">Tarauni</option>
            <option value="Tofa">Tofa</option>
            <option value="Tsanyawa">Tsanyawa</option>
            <option value="Tudun Wada">Tudun Wada</option>
            <option value="Ungogo">Ungogo</option>
            <option value="Warawa">Warawa</option>
            <option value="Wudil">Wudil</option>
        </optgroup>

        <!-- KATSINA STATE (34 LGAs) -->
        <optgroup label="Katsina State">
            <option value="Bakori">Bakori</option>
            <option value="Batagarawa">Batagarawa</option>
            <option value="Batsari">Batsari</option>
            <option value="Baure">Baure</option>
            <option value="Bindawa">Bindawa</option>
            <option value="Charanchi">Charanchi</option>
            <option value="Dan Musa">Dan Musa</option>
            <option value="Dandume">Dandume</option>
            <option value="Danja">Danja</option>
            <option value="Daura">Daura</option>
            <option value="Dutsi">Dutsi</option>
            <option value="Dutsin-Ma">Dutsin-Ma</option>
            <option value="Faskari">Faskari</option>
            <option value="Funtua">Funtua</option>
            <option value="Ingawa">Ingawa</option>
            <option value="Jibia">Jibia</option>
            <option value="Kafur">Kafur</option>
            <option value="Kaita">Kaita</option>
            <option value="Kankara">Kankara</option>
            <option value="Kankia">Kankia</option>
            <option value="Katsina">Katsina</option>
            <option value="Kurfi">Kurfi</option>
            <option value="Kusada">Kusada</option>
            <option value="Mai'Adua">Mai'Adua</option>
            <option value="Malumfashi">Malumfashi</option>
            <option value="Mani">Mani</option>
            <option value="Mashi">Mashi</option>
            <option value="Matazu">Matazu</option>
            <option value="Musawa">Musawa</option>
            <option value="Rimi">Rimi</option>
            <option value="Sabuwa">Sabuwa</option>
            <option value="Safana">Safana</option>
            <option value="Sandamu">Sandamu</option>
            <option value="Zango">Zango</option>
        </optgroup>

        <!-- KEBBI STATE (21 LGAs) -->
        <optgroup label="Kebbi State">
            <option value="Aleiro">Aleiro</option>
            <option value="Arewa Dandi">Arewa Dandi</option>
            <option value="Argungu">Argungu</option>
            <option value="Augie">Augie</option>
            <option value="Bagudo">Bagudo</option>
            <option value="Birnin Kebbi">Birnin Kebbi</option>
            <option value="Bunza">Bunza</option>
            <option value="Dandi">Dandi</option>
            <option value="Fakai">Fakai</option>
            <option value="Gwandu">Gwandu</option>
            <option value="Jega">Jega</option>
            <option value="Kalgo">Kalgo</option>
            <option value="Koko/Besse">Koko/Besse</option>
            <option value="Maiyama">Maiyama</option>
            <option value="Ngaski">Ngaski</option>
            <option value="Sakaba">Sakaba</option>
            <option value="Shanga">Shanga</option>
            <option value="Suru">Suru</option>
            <option value="Wasagu/Danko">Wasagu/Danko</option>
            <option value="Yauri">Yauri</option>
            <option value="Zuru">Zuru</option>
        </optgroup>

        <!-- KOGI STATE (21 LGAs) -->
        <optgroup label="Kogi State">
            <option value="Adavi">Adavi</option>
            <option value="Ajaokuta">Ajaokuta</option>
            <option value="Ankpa">Ankpa</option>
            <option value="Bassa">Bassa</option>
            <option value="Dekina">Dekina</option>
            <option value="Ibaji">Ibaji</option>
            <option value="Idah">Idah</option>
            <option value="Igalamela-Odolu">Igalamela-Odolu</option>
            <option value="Ijumu">Ijumu</option>
            <option value="Kabba/Bunu">Kabba/Bunu</option>
            <option value="Kogi">Kogi</option>
            <option value="Lokoja">Lokoja</option>
            <option value="Mopa-Muro">Mopa-Muro</option>
            <option value="Ofu">Ofu</option>
            <option value="Ogori/Magongo">Ogori/Magongo</option>
            <option value="Okehi">Okehi</option>
            <option value="Okene">Okene</option>
            <option value="Olamaboro">Olamaboro</option>
            <option value="Omala">Omala</option>
            <option value="Yagba East">Yagba East</option>
            <option value="Yagba West">Yagba West</option>
        </optgroup>

        <!-- KWARA STATE (16 LGAs) -->
        <optgroup label="Kwara State">
            <option value="Asa">Asa</option>
            <option value="Baruten">Baruten</option>
            <option value="Edu">Edu</option>
            <option value="Ekiti">Ekiti</option>
            <option value="Ifelodun">Ifelodun</option>
            <option value="Ilorin East">Ilorin East</option>
            <option value="Ilorin South">Ilorin South</option>
            <option value="Ilorin West">Ilorin West</option>
            <option value="Irepodun">Irepodun</option>
            <option value="Isin">Isin</option>
            <option value="Kaiama">Kaiama</option>
            <option value="Moro">Moro</option>
            <option value="Offa">Offa</option>
            <option value="Oke Ero">Oke Ero</option>
            <option value="Oyun">Oyun</option>
            <option value="Pategi">Pategi</option>
        </optgroup>

        <!-- LAGOS STATE (20 LGAs) -->
        <optgroup label="Lagos State">
            <option value="Agege">Agege</option>
            <option value="Ajeromi-Ifelodun">Ajeromi-Ifelodun</option>
            <option value="Alimosho">Alimosho</option>
            <option value="Amuwo-Odofin">Amuwo-Odofin</option>
            <option value="Apapa">Apapa</option>
            <option value="Badagry">Badagry</option>
            <option value="Epe">Epe</option>
            <option value="Eti-Osa">Eti-Osa</option>
            <option value="Ibeju-Lekki">Ibeju-Lekki</option>
            <option value="Ifako-Ijaiye">Ifako-Ijaiye</option>
            <option value="Ikeja">Ikeja</option>
            <option value="Ikorodu">Ikorodu</option>
            <option value="Kosofe">Kosofe</option>
            <option value="Lagos Island">Lagos Island</option>
            <option value="Lagos Mainland">Lagos Mainland</option>
            <option value="Mushin">Mushin</option>
            <option value="Ojo">Ojo</option>
            <option value="Oshodi-Isolo">Oshodi-Isolo</option>
            <option value="Shomolu">Shomolu</option>
            <option value="Surulere">Surulere</option>
        </optgroup>

        <!-- NASARAWA STATE (13 LGAs) -->
        <optgroup label="Nasarawa State">
            <option value="Akwanga">Akwanga</option>
            <option value="Awe">Awe</option>
            <option value="Doma">Doma</option>
            <option value="Karu">Karu</option>
            <option value="Keana">Keana</option>
            <option value="Keffi">Keffi</option>
            <option value="Kokona">Kokona</option>
            <option value="Lafia">Lafia</option>
            <option value="Nasarawa">Nasarawa</option>
            <option value="Nasarawa Egon">Nasarawa Egon</option>
            <option value="Obi">Obi</option>
            <option value="Toto">Toto</option>
            <option value="Wamba">Wamba</option>
        </optgroup>

        <!-- NIGER STATE (25 LGAs) -->
        <optgroup label="Niger State">
            <option value="Agaie">Agaie</option>
            <option value="Agwara">Agwara</option>
            <option value="Bida">Bida</option>
            <option value="Borgu">Borgu</option>
            <option value="Bosso">Bosso</option>
            <option value="Chanchaga">Chanchaga</option>
            <option value="Edati">Edati</option>
            <option value="Gbako">Gbako</option>
            <option value="Gurara">Gurara</option>
            <option value="Katcha">Katcha</option>
            <option value="Kontagora">Kontagora</option>
            <option value="Lapai">Lapai</option>
            <option value="Lavun">Lavun</option>
            <option value="Magama">Magama</option>
            <option value="Mariga">Mariga</option>
            <option value="Mashegu">Mashegu</option>
            <option value="Mokwa">Mokwa</option>
            <option value="Munya">Munya</option>
            <option value="Paikoro">Paikoro</option>
            <option value="Rafi">Rafi</option>
            <option value="Rijau">Rijau</option>
            <option value="Shiroro">Shiroro</option>
            <option value="Suleja">Suleja</option>
            <option value="Tafa">Tafa</option>
            <option value="Wushishi">Wushishi</option>
        </optgroup>

        <!-- OGUN STATE (20 LGAs) -->
        <optgroup label="Ogun State">
            <option value="Abeokuta North">Abeokuta North</option>
            <option value="Abeokuta South">Abeokuta South</option>
            <option value="Ado-Odo/Ota">Ado-Odo/Ota</option>
            <option value="Egbado North">Egbado North</option>
            <option value="Egbado South">Egbado South</option>
            <option value="Ewekoro">Ewekoro</option>
            <option value="Ifo">Ifo</option>
            <option value="Ijebu East">Ijebu East</option>
            <option value="Ijebu North">Ijebu North</option>
            <option value="Ijebu North East">Ijebu North East</option>
            <option value="Ijebu Ode">Ijebu Ode</option>
            <option value="Ikenne">Ikenne</option>
            <option value="Imeko Afon">Imeko Afon</option>
            <option value="Ipokia">Ipokia</option>
            <option value="Obafemi Owode">Obafemi Owode</option>
            <option value="Odeda">Odeda</option>
            <option value="Odogbolu">Odogbolu</option>
            <option value="Ogun Waterside">Ogun Waterside</option>
            <option value="Remo North">Remo North</option>
            <option value="Sagamu">Sagamu</option>
        </optgroup>

        <!-- ONDO STATE (18 LGAs) -->
        <optgroup label="Ondo State">
            <option value="Akoko North-East">Akoko North-East</option>
            <option value="Akoko North-West">Akoko North-West</option>
            <option value="Akoko South-East">Akoko South-East</option>
            <option value="Akoko South-West">Akoko South-West</option>
            <option value="Akure North">Akure North</option>
            <option value="Akure South">Akure South</option>
            <option value="Ese Odo">Ese Odo</option>
            <option value="Idanre">Idanre</option>
            <option value="Ifedore">Ifedore</option>
            <option value="Ilaje">Ilaje</option>
            <option value="Ile Oluji/Okeigbo">Ile Oluji/Okeigbo</option>
            <option value="Irele">Irele</option>
            <option value="Odigbo">Odigbo</option>
            <option value="Okitipupa">Okitipupa</option>
            <option value="Ondo East">Ondo East</option>
            <option value="Ondo West">Ondo West</option>
            <option value="Ose">Ose</option>
            <option value="Owo">Owo</option>
        </optgroup>

        <!-- OSUN STATE (30 LGAs) -->
        <optgroup label="Osun State">
            <option value="Aiyedaade">Aiyedaade</option>
            <option value="Aiyedire">Aiyedire</option>
            <option value="Atakunmosa East">Atakunmosa East</option>
            <option value="Atakunmosa West">Atakunmosa West</option>
            <option value="Boluwaduro">Boluwaduro</option>
            <option value="Boripe">Boripe</option>
            <option value="Ede North">Ede North</option>
            <option value="Ede South">Ede South</option>
            <option value="Egbedore">Egbedore</option>
            <option value="Ejigbo">Ejigbo</option>
            <option value="Ife Central">Ife Central</option>
            <option value="Ife East">Ife East</option>
            <option value="Ife North">Ife North</option>
            <option value="Ife South">Ife South</option>
            <option value="Ifedayo">Ifedayo</option>
            <option value="Ifelodun">Ifelodun</option>
            <option value="Ila">Ila</option>
            <option value="Ilesa East">Ilesa East</option>
            <option value="Ilesa West">Ilesa West</option>
            <option value="Irepodun">Irepodun</option>
            <option value="Irewole">Irewole</option>
            <option value="Isokan">Isokan</option>
            <option value="Iwo">Iwo</option>
            <option value="Obokun">Obokun</option>
            <option value="Odo Otin">Odo Otin</option>
            <option value="Ola Oluwa">Ola Oluwa</option>
            <option value="Olorunda">Olorunda</option>
            <option value="Oriade">Oriade</option>
            <option value="Orolu">Orolu</option>
            <option value="Osogbo">Osogbo</option>
        </optgroup>

        <!-- OYO STATE (33 LGAs) -->
        <optgroup label="Oyo State">
            <option value="Afijio">Afijio</option>
            <option value="Akinyele">Akinyele</option>
            <option value="Atiba">Atiba</option>
            <option value="Atisbo">Atisbo</option>
            <option value="Egbeda">Egbeda</option>
            <option value="Ibadan North">Ibadan North</option>
            <option value="Ibadan North-East">Ibadan North-East</option>
            <option value="Ibadan North-West">Ibadan North-West</option>
            <option value="Ibadan South-East">Ibadan South-East</option>
            <option value="Ibadan South-West">Ibadan South-West</option>
            <option value="Ibarapa Central">Ibarapa Central</option>
            <option value="Ibarapa East">Ibarapa East</option>
            <option value="Ibarapa North">Ibarapa North</option>
            <option value="Ido">Ido</option>
            <option value="Irepo">Irepo</option>
            <option value="Iseyin">Iseyin</option>
            <option value="Itesiwaju">Itesiwaju</option>
            <option value="Iwajowa">Iwajowa</option>
            <option value="Kajola">Kajola</option>
            <option value="Lagelu">Lagelu</option>
            <option value="Ogbomosho North">Ogbomosho North</option>
            <option value="Ogbomosho South">Ogbomosho South</option>
            <option value="Ogo Oluwa">Ogo Oluwa</option>
            <option value="Olorunsogo">Olorunsogo</option>
            <option value="Oluyole">Oluyole</option>
            <option value="Ona Ara">Ona Ara</option>
            <option value="Orelope">Orelope</option>
            <option value="Ori Ire">Ori Ire</option>
            <option value="Oyo East">Oyo East</option>
            <option value="Oyo West">Oyo West</option>
            <option value="Saki East">Saki East</option>
            <option value="Saki West">Saki West</option>
            <option value="Surulere">Surulere</option>
        </optgroup>

        <!-- PLATEAU STATE (17 LGAs) -->
        <optgroup label="Plateau State">
            <option value="Barkin Ladi">Barkin Ladi</option>
            <option value="Bassa">Bassa</option>
            <option value="Bokkos">Bokkos</option>
            <option value="Jos East">Jos East</option>
            <option value="Jos North">Jos North</option>
            <option value="Jos South">Jos South</option>
            <option value="Kanam">Kanam</option>
            <option value="Kanke">Kanke</option>
            <option value="Langtang North">Langtang North</option>
            <option value="Langtang South">Langtang South</option>
            <option value="Mangu">Mangu</option>
            <option value="Mikang">Mikang</option>
            <option value="Pankshin">Pankshin</option>
            <option value="Qua'an Pan">Qua'an Pan</option>
            <option value="Riyom">Riyom</option>
            <option value="Shendam">Shendam</option>
            <option value="Wase">Wase</option>
        </optgroup>

        <!-- RIVERS STATE (23 LGAs) -->
        <optgroup label="Rivers State">
            <option value="Abua-Odual">Abua-Odual</option>
            <option value="Ahoada East">Ahoada East</option>
            <option value="Ahoada West">Ahoada West</option>
            <option value="Akuku-Toru">Akuku-Toru</option>
            <option value="Andoni">Andoni</option>
            <option value="Asari-Toru">Asari-Toru</option>
            <option value="Bonny">Bonny</option>
            <option value="Degema">Degema</option>
            <option value="Eleme">Eleme</option>
            <option value="Emohua">Emohua</option>
            <option value="Etche">Etche</option>
            <option value="Gokana">Gokana</option>
            <option value="Ikwerre">Ikwerre</option>
            <option value="Khana">Khana</option>
            <option value="Obio-Akpor">Obio-Akpor</option>
            <option value="Ogba-Egbema-Ndoni">Ogba-Egbema-Ndoni</option>
            <option value="Ogu-Bolo">Ogu-Bolo</option>
            <option value="Okrika">Okrika</option>
            <option value="Omuma">Omuma</option>
            <option value="Opobo-Nkoro">Opobo-Nkoro</option>
            <option value="Oyigbo">Oyigbo</option>
            <option value="Port Harcourt">Port Harcourt</option>
            <option value="Tai">Tai</option>
        </optgroup>

        <!-- SOKOTO STATE (23 LGAs) -->
        <optgroup label="Sokoto State">
            <option value="Binji">Binji</option>
            <option value="Bodinga">Bodinga</option>
            <option value="Dange-Shuni">Dange-Shuni</option>
            <option value="Gada">Gada</option>
            <option value="Goronyo">Goronyo</option>
            <option value="Gudu">Gudu</option>
            <option value="Gwadabawa">Gwadabawa</option>
            <option value="Illela">Illela</option>
            <option value="Isa">Isa</option>
            <option value="Kebbe">Kebbe</option>
            <option value="Kware">Kware</option>
            <option value="Rabah">Rabah</option>
            <option value="Sabon Birni">Sabon Birni</option>
            <option value="Shagari">Shagari</option>
            <option value="Silame">Silame</option>
            <option value="Sokoto North">Sokoto North</option>
            <option value="Sokoto South">Sokoto South</option>
            <option value="Tambuwal">Tambuwal</option>
            <option value="Tangaza">Tangaza</option>
            <option value="Tureta">Tureta</option>
            <option value="Wamako">Wamako</option>
            <option value="Wurno">Wurno</option>
            <option value="Yabo">Yabo</option>
        </optgroup>

        <!-- TARABA STATE (16 LGAs) -->
        <optgroup label="Taraba State">
            <option value="Ardo Kola">Ardo Kola</option>
            <option value="Bali">Bali</option>
            <option value="Donga">Donga</option>
            <option value="Gashaka">Gashaka</option>
            <option value="Gassol">Gassol</option>
            <option value="Ibi">Ibi</option>
            <option value="Jalingo">Jalingo</option>
            <option value="Karim Lamido">Karim Lamido</option>
            <option value="Kurmi">Kurmi</option>
            <option value="Lau">Lau</option>
            <option value="Sardauna">Sardauna</option>
            <option value="Takum">Takum</option>
            <option value="Ussa">Ussa</option>
            <option value="Wukari">Wukari</option>
            <option value="Yorro">Yorro</option>
            <option value="Zing">Zing</option>
        </optgroup>

        <!-- YOBE STATE (17 LGAs) -->
        <optgroup label="Yobe State">
            <option value="Bade">Bade</option>
            <option value="Bursari">Bursari</option>
            <option value="Damaturu">Damaturu</option>
            <option value="Fika">Fika</option>
            <option value="Fune">Fune</option>
            <option value="Geidam">Geidam</option>
            <option value="Gujba">Gujba</option>
            <option value="Gulani">Gulani</option>
            <option value="Jakusko">Jakusko</option>
            <option value="Karasuwa">Karasuwa</option>
            <option value="Machina">Machina</option>
            <option value="Nangere">Nangere</option>
            <option value="Nguru">Nguru</option>
            <option value="Potiskum">Potiskum</option>
            <option value="Tarmuwa">Tarmuwa</option>
            <option value="Yunusari">Yunusari</option>
            <option value="Yusufari">Yusufari</option>
        </optgroup>

        <!-- ZAMFARA STATE (14 LGAs) -->
        <optgroup label="Zamfara State">
            <option value="Anka">Anka</option>
            <option value="Bakura">Bakura</option>
            <option value="Birnin Magaji/Kiyaw">Birnin Magaji/Kiyaw</option>
            <option value="Bukkuyum">Bukkuyum</option>
            <option value="Bungudu">Bungudu</option>
            <option value="Gummi">Gummi</option>
            <option value="Gusau">Gusau</option>
            <option value="Kaura Namoda">Kaura Namoda</option>
            <option value="Maradun">Maradun</option>
            <option value="Maru">Maru</option>
            <option value="Shinkafi">Shinkafi</option>
            <option value="Talata Mafara">Talata Mafara</option>
            <option value="Tsafe">Tsafe</option>
            <option value="Zurmi">Zurmi</option>
        </optgroup>

        <!-- FEDERAL CAPITAL TERRITORY (6 LGAs) -->
        <optgroup label="Federal Capital Territory">
            <option value="Abaji">Abaji</option>
            <option value="Bwari">Bwari</option>
            <option value="Gwagwalada">Gwagwalada</option>
            <option value="Kuje">Kuje</option>
            <option value="Kwali">Kwali</option>
            <option value="Municipal">Municipal</option>
        </optgroup>
    </select>

</div>
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-venus-mars mr-2 text-primary"></i>Gender <span style="color: red;">*</span></label>
                        <select class="custom-select" name="sex" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <!-- Section 2: Academic Information -->
                <h4 class="mb-3 mt-4" style="color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 5px;">
                    <i class="fas fa-graduation-cap mr-2"></i>Academic Information
                </h4>
                
                <div class="row">
<div class="col-md-6 mb-3">
    <label><i class="fas fa-building mr-2 text-primary"></i>Department <span style="color: red;">*</span></label>
    <select name="department" class="form-control" required>
        <option value="">-- Select Department --</option>
        
<!-- FACULTY OF AGRICULTURE -->
        <optgroup label="FACULTY OF AGRICULTURE">
            <option value="Agricultural Economics and Extension">Agricultural Economics and Extension</option>
            <option value="Animal Science and Fisheries">Animal Science and Fisheries</option>
            <option value="Crop Science and Soil Science">Crop Science and Soil Science</option>
        </optgroup>

        <!-- FACULTY OF VOCATIONAL AND TECHNICAL EDUCATION -->
        <optgroup label="FACULTY OF VOCATIONAL AND TECHNICAL EDUCATION">
            <option value="Agricultural Education">Agricultural Education</option>
            <option value="Technical Education">Technical Education</option>
            <option value="Building Technology">Building Technology</option>
            <option value="Electrical/Electronics Technology">Electrical/Electronics Technology</option>
            <option value="Mechanical Technology">Mechanical Technology</option>
            <option value="Automobile Technology">Automobile Technology</option>
            <option value="Home Economics, Hospitality & Tourism">Home Economics, Hospitality & Tourism</option>
        </optgroup>

        <!-- FACULTY OF SOCIAL SCIENCES -->
        <optgroup label="FACULTY OF SOCIAL SCIENCES">
            <option value="Political Science">Political Science</option>
            <option value="Economics">Economics</option>
            <option value="Sociology">Sociology</option>
            <option value="Social Works">Social Works</option>
            <option value="Geography and Environmental Studies">Geography and Environmental Studies</option>
            <option value="Petroleum Economics and Policy Studies">Petroleum Economics and Policy Studies</option>
            <option value="Public Administration">Public Administration</option>
            <option value="Library and Information Science">Library and Information Science</option>
        </optgroup>

        <!-- FACULTY OF EDUCATION -->
        <optgroup label="FACULTY OF EDUCATION">
            <option value="Educational Management">Educational Management</option>
            <option value="Library and Information Science">Library and Information Science</option>
            <option value="Primary Education Studies">Primary Education Studies</option>
            <option value="Early Childhood Education">Early Childhood Education</option>
            <option value="Special Education">Special Education</option>
            <option value="Guidance and Counselling">Guidance and Counselling</option>
            <option value="Adult Education and Community Development">Adult Education and Community Development</option>
            <option value="Educational Technology">Educational Technology</option>
            <option value="Education and Political Science">Education and Political Science</option>
            <option value="Education and Economics">Education and Economics</option>
            <option value="Education and Social Studies">Education and Social Studies</option>
            <option value="Education and Geography">Education and Geography</option>
            <option value="Education and French">Education and French</option>
            <option value="Education and Religious Studies">Education and Religious Studies</option>
            <option value="Education Fine & Applied Arts">Education Fine & Applied Arts</option>
            <option value="Education and History">Education and History</option>
            <option value="Education and Music">Education and Music</option>
            <option value="Education and English">Education and English</option>
            <option value="Accounting Education">Accounting Education</option>
            <option value="Secretarial Education">Secretarial Education</option>
            <option value="Marketing Education">Marketing Education</option>
            <option value="Management Education">Management Education</option>
            <option value="Education and Biology">Education and Biology</option>
            <option value="Computer Education">Computer Education</option>
            <option value="Education and Mathematics">Education and Mathematics</option>
            <option value="Health and Safety Education">Health and Safety Education</option>
            <option value="Education and Physics">Education and Physics</option>
            <option value="Education and Chemistry">Education and Chemistry</option>
            <option value="Education and Integrated Science">Education and Integrated Science</option>
            <option value="Human Kinetics and Sports Science">Human Kinetics and Sports Science</option>
        </optgroup>

        <!-- FACULTY OF HUMANITIES -->
        <optgroup label="FACULTY OF HUMANITIES">
            <option value="French Languages and International Studies">French Languages and International Studies</option>
            <option value="Religious Studies">Religious Studies</option>
            <option value="Theatre Arts, Film & Theater Studies">Theatre Arts, Film & Theater Studies</option>
            <option value="Fine & Applied Arts">Fine & Applied Arts</option>
            <option value="History and Diplomatic Studies">History and Diplomatic Studies</option>
            <option value="Music">Music</option>
            <option value="English and Communication Arts">English and Communication Arts</option>
            <option value="Linguistics">Linguistics</option>
            <option value="Philosophy">Philosophy</option>
            <option value="Mass Communication">Mass Communication</option>
            <option value="Peace and Conflict Studies">Peace and Conflict Studies</option>
        </optgroup>

        <!-- FACULTY OF ADMINISTRATION AND MANAGEMENT SCIENCES -->
        <optgroup label="FACULTY OF ADMINISTRATION AND MANAGEMENT SCIENCES">
            <option value="Accounting">Accounting</option>
            <option value="Office and Information Management">Office and Information Management</option>
            <option value="Marketing">Marketing</option>
            <option value="Management">Management</option>
            <option value="Employment & Human Resources Management">Employment & Human Resources Management</option>
            <option value="Entrepreneurship">Entrepreneurship</option>
            <option value="Banking and Finance">Banking and Finance</option>
            <option value="Hospitality and Tourism Management">Hospitality and Tourism Management</option>
        </optgroup>

        <!-- FACULTY OF NATURAL & APPLIED SCIENCES -->
        <optgroup label="FACULTY OF NATURAL & APPLIED SCIENCES">
            <option value="Biology">Biology</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Human Kinetics">Human Kinetics</option>
            <option value="Physics">Physics</option>
            <option value="Chemistry">Chemistry</option>
            <option value="Geophysics">Geophysics</option>
            <option value="Industrial Chemistry">Industrial Chemistry</option>
            <option value="Statistics">Statistics</option>
            <option value="Software Engineering">Software Engineering</option>
        </optgroup>
    </select>
</div>
    <div class="col-md-6 mb-3">
    <label><i class="fas fa-graduation-cap mr-2 text-primary"></i>Faculty <span style="color: red;">*</span></label>
    <select name="faculty" class="form-control" required>
        <option value="">-- Select Faculty --</option>
        <option value="Faculty of Agriculture">Faculty of Agriculture</option>
        <option value="Faculty of Vocational and Technical Education">Faculty of Vocational and Technical Education</option>
        <option value="Faculty of Social Sciences">Faculty of Social Sciences</option>
        <option value="Faculty of Education">Faculty of Education</option>
        <option value="Faculty of Humanities">Faculty of Humanities</option>
        <option value="Faculty of Administration and Management Sciences">Faculty of Administration and Management Sciences</option>
        <option value="Faculty of Natural and Applied Sciences">Faculty of Natural and Applied Sciences</option>
    </select>
</div>
 </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-university mr-2 text-primary"></i>Campus <span style="color: red;">*</span></label>
                        <select class="custom-select" name="campus" required>
                            <option value="">-- Select Campus --</option>
                            <option>Main Campus</option>
                            <option>Ndele Campus</option>
                            <option>St. John's Campus</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-calendar-check mr-2 text-primary"></i>Year of Entry <span style="color: red;">*</span></label>
                        <select class="custom-select" name="year_of_entry" required>
                            <option value="">-- Select Year --</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>

                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-layer-group mr-2 text-primary"></i>Level <span style="color: red;">*</span></label>
                        <select class="custom-select" name="level" required>
                            <option value="">-- Select Level --</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
                        
                    </div>
                    
                    <div class="col-md-6 mb-3">
    <label><i class="fas fa-users mr-2 text-primary"></i>Club Membership</label>
    <select name="club_membership" class="form-control">
        <option value="">-- Select Club Membership --</option>
       <option value="Student Union">Student Union</option>
        <option value="Press Club">Press Club</option>
        <option value="Debate Society">Debate Society</option>
        <option value="ICT Club">ICT Club</option>
        <option value="Literary and Debating Society">Literary & Debating Society</option>
        <option value="Rotaract Club">Rotaract Club</option>
        <option value="Sports Club">Sports Club</option>
        <option value="Music and Drama Club">Music & Drama Club</option>
        <option value="Entrepreneurship Club">Entrepreneurship Club</option>
        <option value="Red Cross Society">Red Cross Society</option>
        <option value="Christian Fellowship">Christian Fellowship</option>
        <option value="Muslim Students Society">Muslim Students Society</option>
        <option value="Environmental Club">Environmental Club</option>
        <option value="None">None</option>
    </select>
</div>
</div>

                <!-- Section 3: Hostel Information -->
                <h4 class="mb-3 mt-4" style="color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 5px;">
                    <i class="fas fa-bed mr-2"></i>Hostel Information
                </h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-bed mr-2 text-primary"></i>Hostel Choice <span style="color: red;">*</span></label>
                        <select class="custom-select" name="hostel_choice" required>
                           <option value="">-- Select Hostel --</option>
                           <option>HOSTEL A</option>
                           <option>HOSTEL B</option>
                           <option>HOSTEL C</option>
                           <option>HOSTEL D</option>
                           <option>HOSTEL E</option>
                           <option>HOSTEL F</option>
                           <option>HOSTEL G</option>
                           <option>HOSTEL H</option>
                           <option>STELLA OBASANJO</option>
                           <option>NEW HEAVEN HOSTEL</option>
                           <option>SALVATION HOSTEL SINGLE ROOM</option>
                           <option>SALVATION (SELFCON)</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><i class="fas fa-ring mr-2 text-primary"></i>Marital Status <span style="color: red;">*</span></label>
                         <select class="custom-select" name="marital_status" required>
                          <option value="">-- Select Marital Status --</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                      </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label><i class="fas fa-door-open mr-2 text-primary"></i>Room Number <small>(Admin Only)</small></label>
                    <input type="text" name="room_number" class="form-control" value="To Be Assigned" readonly>
                </div>

                <!-- Consent Section -->
                <div class="alert alert-info mt-4">
                    <h5><i class="fas fa-exclamation-triangle mr-2"></i>Important Notice</h5>
                    <p>By checking this box, you acknowledge that:</p>
                    <ul>
                        <li>All information provided is correct and accurate</li>
                        <li>Providing false information will result in forfeiture of your hostel space</li>
                        <li>You understand that hostel allocation is subject to availability</li>
                    </ul>
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" class="custom-control-input" id="consentCheckbox" name="acknowledgement_of_consent" required>
                        <label class="custom-control-label" for="consentCheckbox" style="color: #0000FF;">
                            <i class="fas fa-check-square mr-1"></i> I agree to the terms and conditions
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="button" class="btn btn-primary btn-block btn-lg mt-3" id="submitBtn">
                    <i class="fas fa-paper-plane mr-2"></i>Submit Application
                </button>
            </form>
        </div>
    </div>

    <!-- OTP Verification Modal -->
    <div id="otpModal">
        <div class="modal-content">
            <h3 class="text-center mb-4" style="color: #007bff;">
                <i class="fas fa-mobile-alt mr-2"></i>OTP Verification
            </h3>
            <p class="text-center">
    We've sent a 6-digit verification code to <strong>(Hostel Admin)</strong> 
    Please enter it below to verify your application.
</p>

<div class="text-center" style="margin-top: 10px;">
    <a href="#" id="whatsappButton" 
       style="display: inline-block; background-color: #25D366; color: white; padding: 12px 24px; 
              border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 8px rgba(0,0,0,0.2);
              transition: all 0.3s ease; font-size: 16px;">
        <i class="fab fa-whatsapp" style="margin-right: 10px;"></i>Get OTP
    </a>
</div>

<script>
    document.getElementById('whatsappButton').addEventListener('click', function(e) {
        e.preventDefault();
        
        const phoneNumber = '2348147254628';
        const message = `Hello! I need an OTP code to complete my registration.

*Payment Instructions:*
- Bank Name: VFD MICROFINANCE BANK
- Account Number: 4600415696
- Account Name: SHUGALITE GLOBAL SOLUTIONS
- Amount: ₦500

*After Payment:*
1. Make payment of ₦500 to the account above
2. Send proof of payment (screenshot) here
3. You will receive your OTP immediately

Thank you!`;
        const encodedMessage = encodeURIComponent(message);
        
        // Detect if user is on mobile or desktop
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // Mobile users - open WhatsApp app
            window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
        } else {
            // Desktop users - open WhatsApp Web
            window.open(`https://web.whatsapp.com/send/?phone=${phoneNumber}&text=${encodedMessage}&type=phone_number&app_absent=0`, '_blank');
        }
    });
</script>

<!-- Font Awesome for WhatsApp icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            
            <div class="text-center mb-4">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 1)" onkeydown="moveToPrevious(event, 1)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 2)" onkeydown="moveToPrevious(event, 2)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 3)" onkeydown="moveToPrevious(event, 3)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 4)" onkeydown="moveToPrevious(event, 4)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 5)" onkeydown="moveToPrevious(event, 5)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 6)" onkeydown="moveToPrevious(event, 6)">
            </div>
            
            <div id="otpError" class="alert alert-danger text-center" style="display: none;"></div>
            
            <div class="text-center">
                <div class="spinner" id="otpSpinner"></div>
                <button class="btn btn-primary" id="verifyOtpBtn" style="width: 150px;">
                    <i class="fas fa-check-circle mr-2"></i>Verify
                </button>
                <button class="btn btn-secondary mt-2" id="resendOtpBtn" style="width: 150px;">
                    <i class="fas fa-redo mr-2"></i>Resend OTP
                </button>
            </div>
            
            <p class="text-muted text-center mt-3" style="font-size: 12px;">
                <i class="fas fa-info-circle mr-1"></i>
                <strong>The OTP will be sent to the hostel admin with your name for verification.<br>Click on "Get OTP Button" to chat Admin on WhatsApp.</strong>
            </p>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div id="termsModal">
        <div class="terms-content">
            <h3 style="margin-bottom: 15px; color: #007bff;">
                <i class="fas fa-file-contract mr-2"></i>Terms and Conditions
            </h3>
            
            <h4>1. Eligibility</h4>
            <p>
                Only registered students of Ignatius Ajuru University of Education are eligible to apply for hostel accommodation. Any false declaration will lead to disqualification and possible disciplinary action.
            </p>

            <h4>2. Application Process</h4>
            <ul>
                <li>Hostel spaces are allocated on a first-come, first-served basis.</li>
                <li>All applications must be submitted through the official portal.</li>
                <li>You must complete the OTP verification process to validate your application.</li>
            </ul>

            <h4>3. Verification Process</h4>
            <ul>
                <li>An OTP will be sent to the hostel admin (+2348132084092) for verification.</li>
                <li>The OTP will include your name for identification purposes.</li>
                <li>You must enter the OTP received by the admin to complete your application.</li>
            </ul>

            <h4>4. Conduct and Discipline</h4>
            <ul>
                <li>Students must maintain cleanliness and order within the hostel premises.</li>
                <li>Respect for roommates, staff, and property is mandatory.</li>
                <li>Any violation of hostel rules may result in immediate eviction.</li>
            </ul>

            <h4>5. Privacy Policy</h4>
            <p>
                The information you provide will be used solely for hostel allocation purposes and will be kept confidential in accordance with the university's data protection policy.
            </p>

            <div class="text-center mt-4">
                <button id="closeModal" class="btn btn-primary">
                    <i class="fas fa-times mr-2"></i>Close
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
   <footer>
    <div class="container">
        <p style="margin: 0; font-weight: bold;">All Rights Reserved 2022-2025 IAUE SA</p>
        
        <p style="margin: 10px 0; font-style: italic; font-size: 14px;">
            <i class="fas fa-shield-alt mr-2"></i>Secure Hostel Application Portal | Powered by 
            <a href="https://wa.me/2348132084092" target="_blank">Esau De Genius</a>
        </p>
        
        <p style="margin-bottom: 10px; font-size: 14px;">
            By using this site, you agree to our 
            <a href="#" id="termsLink" style="text-decoration: underline;">Terms of Service</a> 
            and acknowledge our privacy policy.
        </p>
        
        <p style="margin: 5px 0; font-size: 14px;">
            <i class="fas fa-phone-alt mr-2"></i>Contact: 
            <a href="tel:+2348132084092">+234 813 208 4092</a> | 
            <a href="mailto:hostel@iauestudentsaffairs.com">
                <i class="fas fa-envelope mr-2"></i>hostel@iauestudentsaffairs.com
            </a>
        </p>

        <!-- ESET Security Notice -->
        <p style="margin-top: 10px; font-size: 14px; color: #0073e6;">
            <i class="fas fa-lock mr-2" style="color: #0073e6;"></i>
            This site is protected by <strong>ESET Smart Security</strong> to ensure the safety and security of your browsing experience.
        </p>

        <!-- ESET Logo -->
        <p style="margin-top: 5px;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&amp;s" 
                 alt="ESET Smart Security" 
                 class="logo" 
                 style="width: 120px; height: auto;">
        </p>
    </div>
</footer>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Generate a random 6-digit OTP
        function generateOTP() {
            return Math.floor(100000 + Math.random() * 900000);
        }
        
        // Store the generated OTP and student data
        let generatedOTP = '';
        let studentName = '';
        let phoneNumber = '';
        
        // Move to next OTP input field when a digit is entered
function moveToNext(current, next) {
    if (current.value.length === 1) {
        if (next <= 6) {
            document.querySelectorAll('.otp-input')[next-1].focus();
        }
    }
}

// Move to previous OTP input field on backspace
function moveToPrevious(event, current) {
    if (event.key === 'Backspace' && current > 1 && !event.target.value) {
        document.querySelectorAll('.otp-input')[current-2].focus();
    }
}

// Handle paste event for OTP (allows pasting the full OTP)
function handleOtpPaste(e) {
    e.preventDefault();
    const pasteData = e.clipboardData.getData('text/plain').trim();
    
    // Only allow numeric values
    if (/^\d+$/.test(pasteData)) {
        const otpDigits = pasteData.split('').slice(0, 6); // Get first 6 digits
        
        // Fill the OTP boxes
        const otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach((input, index) => {
            if (index < otpDigits.length) {
                input.value = otpDigits[index];
            }
        });
        
        // Focus on the last filled box
        if (otpDigits.length < 6) {
            otpInputs[otpDigits.length].focus();
        } else {
            otpInputs[5].focus();
        }
    }
}

// Add event listeners to all OTP input fields
document.querySelectorAll('.otp-input').forEach((input, index) => {
    // Auto-focus first input when modal opens
    if (index === 0) {
        input.addEventListener('focus', function() {
            this.select();
        });
    }
    
    // Handle paste event
    input.addEventListener('paste', handleOtpPaste);
    
    // Handle keyboard input
    input.addEventListener('keydown', function(e) {
        // Allow only numeric input
        if (e.key.length === 1 && !/\d/.test(e.key)) {
            e.preventDefault();
        }
        
        // Move to previous on backspace if empty
        if (e.key === 'Backspace' && !this.value) {
            moveToPrevious(e, index + 1);
        }
    });
    
    // Auto-move to next on input
    input.addEventListener('input', function(e) {
        if (this.value.length === 1) {
            moveToNext(this, index + 2);
        }
    });
});
        
        // Send OTP via Telegram Bot API
        async function sendOTP(name, otp) {
            const botToken = '###'; // Replace with your actual bot token
            const chatId = '###'; // Replace with your admin's chat ID
            const message = `🔐 OTP Verification for IAUE Hostel Registration

Dear ${name},

Your One-Time Password (OTP) is: ${otp}
Phone: ${phoneNumber}

Please enter this code to complete your registration.

⚠️ Do not share this code with anyone. It is valid for one-time use only.`;
            
            try {
                const response = await fetch(`https://api.telegram.org/bot${botToken}/sendMessage`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        chat_id: chatId,
                        text: message
                    })
                });
                
                const data = await response.json();
                return data.ok;
            } catch (error) {
                console.error('Error sending OTP:', error);
                return false;
            }
        }
        
        // Verify the entered OTP
        function verifyOTP() {
            const otpInputs = document.querySelectorAll('.otp-input');
            let enteredOTP = '';
            
            otpInputs.forEach(input => {
                enteredOTP += input.value;
            });
            
            if (enteredOTP.length < 6) {
                document.getElementById('otpError').textContent = 'Please enter a complete 6-digit OTP.';
                document.getElementById('otpError').style.display = 'block';
                return;
            }
            
            if (enteredOTP === generatedOTP) {
                document.getElementById('otpError').style.display = 'none';
                document.getElementById('otpVerified').value = '1';
                document.getElementById('otpModal').style.display = 'none';
                
                // Show loading spinner on form submit button
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                submitBtn.disabled = true;
                
                // Submit the form
                document.getElementById('hostelForm').submit();
            } else {
                document.getElementById('otpError').textContent = 'Invalid OTP. Please try again.';
                document.getElementById('otpError').style.display = 'block';
                
                // Shake animation for wrong OTP
                const otpContainer = document.querySelector('.modal-content');
                otpContainer.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    otpContainer.style.animation = '';
                }, 500);
            }
        }
        
        // Resend OTP
        async function resendOTP() {
            document.getElementById('otpSpinner').style.display = 'block';
            document.getElementById('verifyOtpBtn').disabled = true;
            document.getElementById('resendOtpBtn').disabled = true;
            
            // Clear previous OTP inputs
            document.querySelectorAll('.otp-input').forEach(input => {
                input.value = '';
            });
            
            // Focus on first OTP input
            document.querySelectorAll('.otp-input')[0].focus();
            
            // Generate new OTP
            generatedOTP = generateOTP().toString();
            
            try {
                // Send new OTP via Telegram
                const success = await sendOTP(studentName, generatedOTP);
                
                document.getElementById('otpSpinner').style.display = 'none';
                document.getElementById('verifyOtpBtn').disabled = false;
                document.getElementById('resendOtpBtn').disabled = false;
                
                if (success) {
                    document.getElementById('otpError').textContent = 'New OTP sent to admin successfully!';
                    document.getElementById('otpError').className = 'alert alert-success';
                    document.getElementById('otpError').style.display = 'block';
                    
                    // Hide success message after 3 seconds
                    setTimeout(() => {
                        document.getElementById('otpError').style.display = 'none';
                    }, 3000);
                } else {
                    document.getElementById('otpError').textContent = 'Failed to send OTP. Please try again.';
                    document.getElementById('otpError').className = 'alert alert-danger';
                    document.getElementById('otpError').style.display = 'block';
                }
            } catch (error) {
                document.getElementById('otpSpinner').style.display = 'none';
                document.getElementById('verifyOtpBtn').disabled = false;
                document.getElementById('resendOtpBtn').disabled = false;
                document.getElementById('otpError').textContent = 'Failed to send OTP. Please try again.';
                document.getElementById('otpError').className = 'alert alert-danger';
                document.getElementById('otpError').style.display = 'block';
            }
        }
        
        // Form submission handler
document.getElementById('submitBtn').addEventListener('click', async function() {
    // Get all required fields
    const requiredFields = document.querySelectorAll('input[required], select[required]');
    let allFieldsValid = true;
    
    // Check each required field
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            allFieldsValid = false;
            // Add red border to highlight empty required fields
            field.style.borderColor = 'red';
            
            // Remove red border when user starts typing
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.style.borderColor = '';
                }
            });
        }
    });
    
    // Check if consent checkbox is checked
    const consentCheckbox = document.getElementById('consentCheckbox');
    if (!consentCheckbox.checked) {
        allFieldsValid = false;
        // Highlight the checkbox label
        const checkboxLabel = consentCheckbox.nextElementSibling;
        checkboxLabel.style.color = 'red';
        
        // Remove highlight when checkbox is checked
        consentCheckbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxLabel.style.color = '';
            }
        });
    }
    
    // If not all fields are valid, show error message and return
    if (!allFieldsValid) {
        alert('Please fill in all required fields and acknowledge the consent before submitting.');
        return;
    }
    
    // Get student name and phone number from form
    studentName = document.getElementById('fullName').value;
    phoneNumber = document.getElementById('phoneNumber').value;
    
    // Validate phone number format (Nigeria)
    if (!phoneNumber.match(/^(\+234|0)[789][01]\d{8}$/)) {
        document.getElementById('otpError').textContent = 'Please enter a valid Nigerian phone number starting with 0';
        document.getElementById('otpError').className = 'alert alert-danger';
        document.getElementById('otpError').style.display = 'block';
        return;
    }
    
    // If all validations pass, proceed with OTP generation
    generatedOTP = generateOTP().toString();
    
    // Show OTP modal
    document.getElementById('otpModal').style.display = 'block';
    
    // Send OTP via Telegram
    document.getElementById('otpSpinner').style.display = 'block';
    
    try {
        const success = await sendOTP(studentName, generatedOTP);
        
        document.getElementById('otpSpinner').style.display = 'none';
        
        if (success) {
            document.getElementById('otpError').textContent = 'OTP sent to admin successfully! Please ask the admin for the code.';
            document.getElementById('otpError').className = 'alert alert-success';
            document.getElementById('otpError').style.display = 'block';
            
            // Focus on first OTP input
            setTimeout(() => {
                document.querySelectorAll('.otp-input')[0].focus();
                document.getElementById('otpError').style.display = 'none';
            }, 3000);
        } else {
            document.getElementById('otpError').textContent = 'Failed to send OTP. Please try again.';
            document.getElementById('otpError').className = 'alert alert-danger';
            document.getElementById('otpError').style.display = 'block';
        }
    } catch (error) {
        document.getElementById('otpSpinner').style.display = 'none';
        document.getElementById('otpError').textContent = 'Failed to send OTP. Please try again.';
        document.getElementById('otpError').className = 'alert alert-danger';
        document.getElementById('otpError').style.display = 'block';
    }
});
        
        // Verify OTP button click handler
        document.getElementById('verifyOtpBtn').addEventListener('click', verifyOTP);
        
        // Resend OTP button click handler
        document.getElementById('resendOtpBtn').addEventListener('click', resendOTP);
        
        // Terms modal
        document.getElementById('termsLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('termsModal').style.display = 'block';
        });
        
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('termsModal').style.display = 'none';
        });
        
        window.addEventListener('click', function(e) {
            if (e.target === document.getElementById('termsModal')) {
                document.getElementById('termsModal').style.display = 'none';
            }
            if (e.target === document.getElementById('otpModal')) {
                document.getElementById('otpModal').style.display = 'none';
            }
        });
        
        // File input label update
        document.getElementById('photoUpload').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
            document.querySelector('.custom-file-label').textContent = fileName;
        });
    </script>
       <!-- ESET Smart Security Protection -->
    <style>
        /* Style for the loading screen */
        
        #loadingScreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            z-index: 1000;
        }

        /* Style for the protection message */
        #protectionMessage {
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(0, 128, 0, 0.7); /* Green background */
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <!-- Loading screen container -->
    <div id="loadingScreen">
        <div id="protectionMessage">
            Site is protected by ESET Smart Security
        </div>
    </div>

    <!-- Main content of the page -->
    <div id="mainContent" style="display:none;">
        <h1</h1>
        <p></p>
    </div>

    <script>
        // Function to hide the loading screen after 3 seconds
        setTimeout(function() {
            // Hide the loading screen
            document.getElementById('loadingScreen').style.display = 'none';
            // Show the main content of the page
            document.getElementById('mainContent').style.display = 'block';
        }, 3000);  // 3000ms = 3 seconds
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
    
<style>
    .whatsapp-otp-btn {
        position: fixed;
        left: 20px;
        bottom: 20px;
        background: #25D366;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        cursor: pointer;
        z-index: 9999;
        transition: all 0.3s;
    }
    .whatsapp-otp-btn:hover {
        background: #128C7E;
        transform: scale(1.05);
    }
    .whatsapp-otp-btn svg {
        width: 30px;
        height: 30px;
    }
    .whatsapp-otp-btn::after {
        content: "Get OTP";
        position: absolute;
        left: 70px;
        white-space: nowrap;
        background: #25D366;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 14px;
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
    }
    .whatsapp-otp-btn:hover::after {
        opacity: 1;
    }
</style>

<div class="whatsapp-otp-btn" id="otpBtn">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.148-.643-.05-.297-.197-1.237-.728-2.355-2.32-.888-1.322-1.488-2.955-1.66-3.454-.173-.496.018-.766.173-.945.18-.248.396-.371.643-.371.173 0 .347 0 .495.074.149.074.297.198.446.347.149.148.347.372.495.496.149.124.297.198.446.074.149-.124.595-.483.744-.643.149-.16.248-.235.347-.235.099 0 .199.05.347.148.148.1.595.544.941 1.043.347.496.644.941.792 1.091.149.148.298.248.446.248.149 0 .298-.05.446-.148.149-.1.595-.545.941-1.043.347-.497.57-.843.644-.942.074-.1.124-.15.248-.15.124 0 .298.05.644.248M12 2a10 10 0 0 1 10 10 10 10 0 0 1-10 10c-1.768 0-3.46-.41-5-1.14L2 22l1.386-4.078A9.93 9.93 0 0 1 2 12 10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8c0 1.72.54 3.31 1.46 4.61L4.5 19.5l2.89-.96A8 8 0 0 0 12 20a8 8 0 0 0 8-8 8 8 0 0 0-8-8z"/>
    </svg>
</div>

<script>
    document.getElementById('otpBtn').addEventListener('click', function() {
        const adminNumber = '2348147254628'; 
        
        const message = `Hello! I need an OTP code to complete my registration.

*Payment Instructions:*
- Bank Name: VFD MICROFINANCE BANK
- Account Number: 4600415696
- Account Name: SHUGALITE GLOBAL SOLUTIONS
- Amount: ₦500

*After Payment:*
1. Make payment of ₦500 to the account above
2. Send proof of payment (screenshot) here
3. You will receive your OTP immediately

Thank you!`;
        
        // Check if user is on mobile or desktop
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // Mobile users
            window.open(`https://wa.me/${adminNumber}?text=${encodeURIComponent(message)}`, '_blank');
        } else {
            // Desktop users (WhatsApp Web)
            window.open(`https://web.whatsapp.com/send/?phone=${adminNumber}&text=${encodeURIComponent(message)}&type=phone_number&app_absent=0`, '_blank');
        }
    });
</script>
    
<style>
#blockMessage {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #ff4d4d;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    z-index: 9999;
    display: none;
    transition: opacity 0.3s ease-in-out;
}
</style>

<div id="blockMessage">🚫 Developer tools access is disabled!</div>

<script>
function showBlockMessage() {
    const msg = document.getElementById('blockMessage');
    msg.style.display = 'block';
    setTimeout(() => {
        msg.style.display = 'none';
    }, 3000);
}

document.addEventListener('keydown', function (e) {
    // Block F12
    if (e.key === 'F12') {
        e.preventDefault();
        showBlockMessage();
    }

    // Block Ctrl+Shift+I/J/C
    if (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key)) {
        e.preventDefault();
        showBlockMessage();
    }

    // Block Ctrl+U
    if (e.ctrlKey && e.key.toLowerCase() === 'u') {
        e.preventDefault();
        showBlockMessage();
    }
});
</script>


</body>
</html>
