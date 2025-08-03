<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hostel Portal Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .card {
      background: white;
      padding: 2.5rem;
      border-radius: 1.25rem;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
      animation: floatIn 0.6s ease-out;
    }

    @keyframes floatIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card h2 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 600;
      font-size: 1.6rem;
      color: #333;
    }

    .form-group {
      margin-bottom: 1.4rem;
    }

    .form-group label {
      font-size: 0.9rem;
      display: block;
      margin-bottom: 0.3rem;
      color: #333;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 0.7rem 0.9rem;
      font-size: 1rem;
      border: 1.5px solid #ccc;
      border-radius: 0.6rem;
      outline: none;
      transition: border 0.2s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #007bff;
    }

    .btn-submit {
      width: 100%;
      padding: 0.8rem;
      background: #007bff;
      color: white;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      border-radius: 0.6rem;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-submit:hover {
      background: #0056b3;
      transform: translateY(-2px);
    }

    .alert {
      padding: 0.75rem 1rem;
      margin-bottom: 1rem;
      border-radius: 0.5rem;
      font-size: 0.95rem;
      font-weight: 500;
      text-align: center;
      animation: fadeIn 0.3s ease-in-out;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .footer-link {
      text-align: center;
      font-size: 0.9rem;
      margin-top: 1rem;
    }

    .footer-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
    }

    .footer-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .card {
        padding: 2rem;
      }
    }
  </style>
</head>
<body>
  <main class="card">
    <h2>Create Your Account 📝</h2>

    <!-- Flash Messages -->
    @if ($errors->any())
      <div>
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('registration.post') }}" method="POST" aria-label="Registration form">
      @csrf

      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required autocomplete="name">
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required autocomplete="email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required minlength="6" autocomplete="new-password">
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role" required>
          <option value="">Select Role</option>
          <option value="admin">Admin</option>
          <option value="superadmin">Superadmin</option>
        </select>
      </div>

      <button type="submit" class="btn-submit">Register</button>

      <div class="footer-link">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
      </div>
    </form>
  </main>

  <script>
    // Optional: Add fade-out effect for flash messages
    window.addEventListener('DOMContentLoaded', () => {
      const alerts = document.querySelectorAll('.alert');
      if (alerts.length > 0) {
        setTimeout(() => {
          alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
          });
        }, 4000);
      }
    });
  </script>
</body>
</html>
