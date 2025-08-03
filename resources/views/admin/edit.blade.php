<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Student Record</title>
  <link rel="icon" href="https://iaue.edu.ng/favicon.ico" />

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .card-header {
      background-color: #0d6efd;
      color: #fff;
      font-weight: 600;
      font-size: 1.25rem;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 0.3rem;
    }

    .form-control,
    .form-select {
      border-radius: 8px;
      border: 1px solid #ced4da;
      padding: 0.6rem 1rem;
      font-size: 0.95rem;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.15);
    }

    .section-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #0d6efd;
      margin-top: 2.5rem;
      margin-bottom: 16px;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 6px;
    }

    footer {
      border-top: 1px solid #dee2e6;
      padding: 30px 0;
      font-size: 14px;
      background-color: #fff;
    }

    input[type="file"] {
      background-color: #f1f3f5;
      border-radius: 6px;
    }

    .img-thumbnail {
      max-width: 150px;
      border-radius: 8px;
      border: 1px solid #ced4da;
    }

    .rounded-bottom-4 {
      border-bottom-left-radius: 12px;
      border-bottom-right-radius: 12px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" width="35" class="rounded-circle me-2" />
      Hi, {{ auth()->user()->name }}
    </a>
    <div class="ms-auto">
      <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-home"></i> Home</a>
      <a href="{{ route('filter.printFilter') }}" class="btn btn-outline-secondary btn-sm me-2"><i class="fas fa-filter"></i> Filter</a>
      <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container">
  <div class="card mb-5">
    <div class="card-header">
      <i class="fas fa-user-edit me-2"></i> Update Student Record
    </div>
    <div class="card-body">
      <!-- Alerts -->
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
      @endforeach

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Form Start -->
      <form method="POST" action="{{ route('record.update', $hostels->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Personal Info -->
        <h5 class="section-title">Personal Information</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ $hostels->name }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Mat/Reg No.</label>
            <input type="text" name="matriculation_number" class="form-control" value="{{ $hostels->matriculation_number }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Gender</label>
            <select name="sex" class="form-select">
              <option selected>{{ $hostels->sex }}</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $hostels->date_of_birth }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Marital Status</label>
            <select name="marital_status" class="form-select">
              <option selected>{{ $hostels->marital_status }}</option>
              <option>Married</option>
              <option>Single</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Club Membership</label>
            <select name="club_membership" class="form-select">
                <option selected>{{ $hostels->club_membership }}</option>
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

        <!-- Contact Info -->
        <h5 class="section-title">Contact Information</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $hostels->email }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $hostels->phone_number }}">
          </div>
          <div class="col-md-6">
  <label class="form-label">State of Origin</label>
  <select name="state_of_origin" class="form-select">
    <option selected>{{ $hostels->state_of_origin }}</option>
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
          <div class="col-md-6">
  <label class="form-label">LGA</label>
  <select name="local_government_area" class="form-select">
    <option selected>{{ $hostels->local_government_area }}</option>
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
          <div class="col-12">
            <label class="form-label">Residential Address</label>
            <input type="text" name="residential_address" class="form-control" value="{{ $hostels->residential_address }}">
          </div>
        </div>

        <!-- Academic Info -->
        <h5 class="section-title">Academic Information</h5>
        <div class="row g-3">
  <div class="col-md-6">
    <label for="department" class="form-label">Department</label>
    <select name="department" class="form-select">
         <option selected>{{ $hostels->department }}</option>
        
        <!-- FACULTY OF AGRICULTURE -->
        <optgroup label="Faculty of Agriculture">
            <option value="Agricultural Economics and Extension">Agricultural Economics and Extension</option>
            <option value="Animal Science and Fisheries">Animal Science and Fisheries</option>
            <option value="Crop Science and Soil Science">Crop Science and Soil Science</option>
        </optgroup>

        <!-- FACULTY OF VOCATIONAL AND TECHNICAL EDUCATION -->
        <optgroup label="Faculty of Vocational and Technical Education">
            <option value="Agricultural Education">Agricultural Education</option>
            <option value="Technical Education">Technical Education</option>
            <option value="Building Technology">Building Technology</option>
            <option value="Electrical/Electronics Technology">Electrical/Electronics Technology</option>
            <option value="Mechanical Technology">Mechanical Technology</option>
            <option value="Automobile Technology">Automobile Technology</option>
            <option value="Home Economics, Hospitality & Tourism">Home Economics, Hospitality & Tourism</option>
        </optgroup>

        <!-- FACULTY OF SOCIAL SCIENCES -->
        <optgroup label="Faculty of Social Sciences">
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
        <optgroup label="Faculty of Education">
            <option value="Educational Management">Educational Management</option>
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
        <optgroup label="Faculty of Humanities">
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
        <optgroup label="Faculty of Administration and Management Sciences">
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
        <optgroup label="Faculty of Natural & Applied Sciences">
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
         <div class="col-md-6">
  <label class="form-label">Faculty</label>
  <select name="faculty" class="form-select">
     <option selected>{{ $hostels->faculty }}</option
      <option value="" disabled selected>-- Select Faculty --</option>
        <option value="Faculty of Agriculture">Faculty of Agriculture</option>
        <option value="Faculty of Vocational and Technical Education">Faculty of Vocational and Technical Education</option>
        <option value="Faculty of Social Sciences">Faculty of Social Sciences</option>
        <option value="Faculty of Education">Faculty of Education</option>
        <option value="Faculty of Humanities">Faculty of Humanities</option>
        <option value="Faculty of Administration and Management Sciences">Faculty of Administration and Management Sciences</option>
        <option value="Faculty of Natural and Applied Sciences">Faculty of Natural and Applied Sciences</option>
  </select>
</div>
          <div class="col-md-6">
            <label class="form-label">Level</label>
            <select class="form-select" name="level">
              <option selected>{{ $hostels->level }}</option>
              @foreach([100, 200, 300, 400] as $lvl)
                <option>{{ $lvl }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Year of Entry</label>
            <select class="form-select" name="year_of_entry">
              <option selected>{{ $hostels->year_of_entry }}</option>
              @foreach(range(2021, 2025) as $year)
                <option>{{ $year }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Campus</label>
            <select class="form-select" name="campus">
              <option selected>{{ $hostels->campus }}</option>
              <option>Main Campus</option>
              <option>Ndele Campus</option>
              <option>St. John's Campus</option>
            </select>
          </div>
        </div>

        <!-- Hostel Info -->
        <h5 class="section-title">Hostel Information</h5>
        <div class="row g-3">
          <div class="col-md-6">
  <label class="form-label">Assigned Room</label>
  <select name="assigned_Room" class="form-select">
    <option selected value="{{ $hostels->assigned_Room }}">{{ $hostels->assigned_Room ?: 'Select Room' }}</option>
    
    <!-- Numeric rooms 01-46 -->
    @for($i = 1; $i <= 46; $i++)
      <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
    @endfor
    
    <!-- Letter rooms A1-F15 -->
    @foreach(['A','B','C','D','E','F'] as $block)
      @for($i = 1; $i <= 15; $i++)
        <option value="{{ $block.$i }}">{{ $block.$i }}</option>
      @endfor
    @endforeach
  </select>
</div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
              <option value="Allocated" {{ $hostels->status === 'Allocated' ? 'selected' : '' }}>Allocated</option>
              <option value="Not Yet Allocated" {{ $hostels->status === 'Not Yet Allocated' ? 'selected' : '' }}>Not Yet Allocated</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Hostel Choice</label>
            <select class="form-select" name="hostel_choice">
              <option selected>{{ $hostels->hostel_choice }}</option>
              @foreach(['Hostel A','Hostel B','Hostel C','Hostel D','Hostel E','Hostel F','Hostel G','Hostel H','STELLA OBASANJO','NEW HEAVEN HOSTEL','SALVATION HOSTEL SINGLE ROOM','SALVATION (SELFCON)'] as $choice)
         <option value="{{ strtoupper($choice) }}">{{ strtoupper($choice) }}</option>
         @endforeach
            </select>
          </div>
        </div>

        <!-- Photo Upload -->
        <h5 class="section-title">Passport Photo</h5>
        @if ($hostels->photo)
          <div class="mb-2">
            <img src="{{ asset($hostels->photo) }}" class="img-thumbnail" alt="Student Photo">
            <p class="text-muted mt-2">Current Photo</p>
          </div>
        @endif
        <input type="file" name="photo" class="form-control mb-2" accept="image/*">
        <small class="text-muted">Uploading a new photo will replace the old one. Max size: 2MB</small>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer inside container -->
  <footer class="text-center mt-5 border-top py-4 bg-white shadow-sm rounded-bottom-4">
    <p class="fw-bold mb-1">&copy; 2022–2025 IAUE SA</p>
    <p class="text-success small mb-1">100% Uptime | Powered by <a href="https://wa.me/248132084092" target="_blank">Esau De Genius</a></p>
    <p class="small text-muted">
      By using this site, you agree to our
      <a href="/-/Terms and Conditions for Hostel Services at Ignatius Ajuru University of Education.pdf" target="_blank">Terms</a>.
    </p>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s" alt="Security" style="max-width: 120px;">
  </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
