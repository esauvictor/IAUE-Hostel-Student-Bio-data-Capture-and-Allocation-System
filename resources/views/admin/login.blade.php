<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hostel Allocation Portal | Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
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
    }

    .card {
      background: white;
      padding: 2.5rem;
      border-radius: 1.25rem;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
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

    h2 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 600;
      font-size: 1.6rem;
      color: #333;
    }

    .form-group {
      margin-bottom: 1.4rem;
    }

    label {
      font-size: 0.9rem;
      display: block;
      margin-bottom: 0.3rem;
      color: #333;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.7rem;
      font-size: 1rem;
      border: 1.5px solid #ccc;
      border-radius: 0.6rem;
      outline: none;
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

    .btn-submit:hover:enabled {
      background: #0056b3;
      transform: translateY(-2px);
    }

    .btn-submit:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }

    /* Modal Styles */
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100vw;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      width: 90%;
      max-width: 600px;
      max-height: 80vh;
      overflow: hidden;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .terms-scroll-box {
      overflow-y: auto;
      flex: 1;
      padding-right: 1rem;
      margin-bottom: 1rem;
    }

    .confirmation-msg {
      color: green;
      font-weight: bold;
      margin: 0.5rem 0;
      text-align: center;
      display: none;
    }

    .modal-close {
      display: none;
      margin-top: 0.5rem;
      padding: 0.7rem 1.5rem;
      background-color: #28a745;
      border: none;
      color: white;
      border-radius: 0.5rem;
      cursor: pointer;
      align-self: center;
    }

    @media (max-width: 480px) {
      .card {
        margin: 1rem;
        padding: 2rem;
      }
    }
  </style>
</head>
<body>

<main class="card">
  <h2>Welcome Back 👋</h2>

  <form action="{{ route('login.post') }}" method="POST" onsubmit="return validateForm()" aria-label="Login form">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required minlength="4" />
    </div>

    <button type="submit" id="loginBtn" class="btn-submit" disabled>Login</button>
  </form>
</main>

<!-- Terms Modal -->
<div id="termsModal" style="
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
">
  <div style="
    background: white;
    border-radius: 10px;
    padding: 20px;
    width: 90%;
    max-width: 500px;
    max-height: 80vh;
    overflow: hidden;
    position: relative;
  ">
    <h2 style="margin-top: 0;">Terms & Conditions</h2>
    <div id="termsScrollBox" style="
      overflow-y: auto;
      max-height: 50vh;
      padding-right: 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 1rem;
    ">
      <p>Please carefully read the following terms and responsibilities before proceeding:</p>
<ul>
  <li>This portal is managed by <strong>Mr. Esau Victor</strong>, the Hostel Allocation Officer and Superadmin. He oversees all technical operations including student allocations, deallocations, data modifications, and record management.</li>

  <li><strong>Mr. Temple Wosu Nna</strong> and <strong>Mr. Solomon Chibuzor Obijuru</strong> are responsible for:
    <ul style="list-style-type: disc; margin-left: 1.2rem;">
      <li>Printing student hostel documents,</li>
      <li>Facilitating hostel fee payments,</li>
      <li>Assisting students with booking and bio-data submission under the supervision of <strong>Mr. Esau Victor</strong>.</li>
    </ul>
  </li>

  <li><strong>Mr. Christopher Jnr Sydney</strong> handles offline documentation of student hostel allocations and offers advisory support when needed.</li>

  <li><strong>Mr. Anele Christian Adele</strong> manages the flow of students into the allocation office, attending to inquiries from parents, guardians, lecturers, and staff.</li>

  <li>Students are required to:
    <ul style="list-style-type: disc; margin-left: 1.2rem;">
      <li>Use the portal responsibly and ethically.</li>
      <li>Provide accurate and verifiable information during registration.</li>
      <li>Refrain from sharing login credentials.</li>
      <li>Comply with allocation guidelines and procedures.</li>
    </ul>
  </li>

  <li>All actions on this platform are subject to monitoring and review by the administration.</li>
  <li>By continuing, you confirm that you have read and agree to the responsibilities and policies outlined above.</li>
  <li>You must scroll to the bottom of this message to proceed with login.</li>
</ul>
    </div>
    <div id="confirmationMsg" style="display: none; margin-top: 1rem; color: green;">
      ✅ You've read the terms. You may now log in.
    </div>
    <button id="closeTermsBtn" disabled style="
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: not-allowed;
    ">Close</button>
  </div>
</div>

<script>
  const loginBtn = document.getElementById('loginBtn');
  const closeTermsBtn = document.getElementById('closeTermsBtn');
  const termsModal = document.getElementById('termsModal');
  const scrollBox = document.getElementById('termsScrollBox');
  const confirmationMsg = document.getElementById('confirmationMsg');

  // Detect scroll to bottom
  scrollBox.addEventListener('scroll', () => {
    const scrolledToBottom = scrollBox.scrollTop + scrollBox.clientHeight >= scrollBox.scrollHeight - 2;

    if (scrolledToBottom) {
      loginBtn.disabled = false;
      closeTermsBtn.disabled = false;
      closeTermsBtn.style.cursor = 'pointer';
      confirmationMsg.style.display = 'block';
    }
  });

  closeTermsBtn.addEventListener('click', () => {
    termsModal.style.display = 'none';
  });

  function validateForm() {
    if (loginBtn.disabled) {
      alert('Please read the terms before logging in.');
      return false;
    }
    return true;
  }

  // Optional: auto-scroll to top on open
  window.addEventListener('DOMContentLoaded', () => {
    scrollBox.scrollTop = 0;
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
