<?php include 'php/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Reset */
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        body {
          font-family: 'Poppins', sans-serif;
          background: #0f0f0f;
          color: #fff;
          line-height: 1.6;
        }

        /* Page Title */
        h2 {
          text-align: center;
          margin-bottom: 2rem;
          margin-top: 2rem;
          font-size: 2rem;
          color: #fff;
        }

        /* 🔹 Login Form Styling (separate class) */
        .login-form {
          display: grid;
          margin-bottom: 1rem;
          gap: 1rem;
          max-width: 400px;
          margin: auto;
          background: #1a1a1a;
          padding: 2rem;
          border-radius: 10px;
          box-shadow: 0 0 15px rgba(213, 0, 249, 0.2);
        }

        .login-form label {
          text-align: left;
          font-weight: bold;
        }

        .login-form input {
          background: #0f0f0f;
          color: #fff;
          border: none;
          border-radius: 5px;
          padding: 0.8rem;
          font-size: 1rem;
          outline: none;
        }

        .login-form input:focus {
          border: 1px solid #ff4081;
        }

        .login-form button {
          background: linear-gradient(90deg, #d500f9, #ff4081);
          color: #fff;
          font-weight: bold;
          padding: 0.8rem;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        .login-form button:hover {
          opacity: 0.8;
        }
        .forgot-link {
    margin-top: 10px;
    text-align: right;
}

.forgot-link a {
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
}

.forgot-link a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <h2>Login</h2>
    <!-- 🔹 Added class="login-form" -->
    <form class="login-form" action="php/login_process.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        
        <button type="submit">Login</button>
    <div class="forgot-link">
        <a href="forgot_password.php">Forgot Password?</a>
    </div>
      </form>
</body>
</html>
<?php include 'php/footer.php'; ?>
