<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
    
        body {
            font-family: 'Comic Sans MS', sans-serif;
            background-image: url("image4.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Comic Sans MS', sans-serif;
        }

        button {
            width: 100%;
            padding: 12px 20px;
            background-color: #FF4081;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Comic Sans MS', sans-serif;
            font-weight: bold;
            font-size: 16px;
        }

        button:hover {
            background-color: #E91E63;
        }

        h2 {
            background-color: #3F51B5;
            color: #fff;
            padding: 10px;
            margin-top: 0;
            border-radius: 5px;
            font-family: 'Comic Sans MS', sans-serif;
        }

        .toggle-link {
            text-align: center;
            margin-top: 10px;
            color: #000;
        }

        .toggle-link a {
            color: #FF4081;
            text-decoration: underline;
            cursor: pointer;
            font-family: 'Comic Sans MS', sans-serif;
        }
 
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form" id="signin-form">
            <h1 style="color: #3F51B5; font-size: 28px;">Login Page</h1>

            <!-- Sign In Form -->
        <form action="signin.php" method="post" onsubmit="return checkSubmit('signin')">
                <h2>Sign In</h2>
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" class="button" name="sign_in" value="Sign In">
            </form>

            <!-- Toggle Link for Login -->
            <div class="toggle-link">
                Already have an account? <a onclick="toggleForm('login')">Login</a>
            </div>
        </div>

        <div class="login-form" id="login-form" style="display: none;">
            <!-- Login Form -->
            <form action="login.php" method="post" onsubmit="return checkSubmit('login')">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" class="button" name="log_in" value="Login">
            </form>

            <!-- Toggle Link for Sign In -->
            <div class="toggle-link">
                New here? <a onclick="toggleForm('signin')">Sign In</a>
            </div>
        </div>
    </div>

    <script>
        function toggleForm(formType) {
            if (formType === 'signin') {
                document.getElementById('signin-form').style.display = 'block';
                document.getElementById('login-form').style.display = 'none';
            } else if (formType === 'login') {
                document.getElementById('signin-form').style.display = 'none';
                document.getElementById('login-form').style.display = 'block';
            }
        }

        function checkSubmit(formType) {
    if (formType === 'signin' || formType === 'login') {
        
        window.location.href = 's2.html';
        
        // Submit the form 
        return true;
    }

    return true; // Continue with form submission
}

    </script>
</body>

</html>
