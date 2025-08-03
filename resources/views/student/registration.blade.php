<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secured Hostel Portal - Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="p-4 shadow rounded bg-white">
                <!-- Error and Success Messages -->
                @if($errors->any())
                    <div class="mb-3">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Signup Form -->
                <div class="text-center">
    <img src="https://iaue.edu.ng/wp-content/uploads/2024/03/cropped-Ignatus-log.png" alt="IAUE Logo" class="logo">
</div>

<!-- Styling to beautify and make the logo circular -->
<style>
  /* Add the background image to the body */
    body {
        background-image: url('https://img.freepik.com/free-vector/realistic-christmas-card_1361-3159.jpg?t=st=1733600197~exp=1733603797~hmac=7995feecf990d1ad4f01f368ce7df7697535ed1c13d1d5b77a0ee5826abe4b20&w=740'); /* Replace with the URL of your Christmas image */
        background-size: cover; /* Ensures the image covers the entire background */
        background-position: center; /* Centers the background image */
        background-attachment: fixed; /* Keeps the background fixed during scrolling */
        font-family: Arial, sans-serif; /* Optional: change the font for the page */
    }
    .logo {
        width: 120px; /* Adjust size of the logo */
        height: 120px; /* Make the height equal to width to ensure it's a perfect circle */
        border-radius: 50%; /* Circular border */
        object-fit: cover; /* Ensures the image fits well within the circle */
        margin: 20px auto; /* Centers the logo horizontally and adds space around it */
        border: 5px solid #007bff; /* Adds a border color for contrast */
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow for a floating effect */
    }
</style>
                <h2 class="text-center mb-4">SECURED PORTAL</h2>
                <form action="{{ route('registration.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3"> Register</button>
                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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



</body>
</html>
