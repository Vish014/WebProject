<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>GO SRILANKA - Welcome!</title>
    <style>
    
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&family=Poppins:wght@400;500&display=swap");

        :root {
            --title-color: hsl(0, 0%, 95%);
            --text-color: hsl(0, 0%, 70%);
            --text-color-light: hsl(0, 0%, 60%);
            --body-color: hsl(0, 0%, 0%);
            --container-color: hsl(0, 0%, 8%);
            --body-font: "Poppins", sans-serif;
            --second-font: "Montserrat", sans-serif;
            --biggest-font-size: 2.75rem;
            --h1-font-size: 1.5rem;
            --h2-font-size: 1.25rem;
            --h3-font-size: 1rem;
            --normal-font-size: .938rem;
            --small-font-size: .813rem;
            --smaller-font-size: .75rem;
            --font-regular: 400;
            --font-medium: 500;
            --font-semi-bold: 600;
            --z-tooltip: 10;
            --z-fixed: 100;
        }

        @media screen and (min-width: 1152px) {
            :root {
                --biggest-font-size: 5.5rem;
                --h1-font-size: 2.5rem;
                --h2-font-size: 1.5rem;
                --h3-font-size: 1.25rem;
                --normal-font-size: 1rem;
                --small-font-size: .875rem;
                --smaller-font-size: .813rem;
            }
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body,
        button,
        input {
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            color: var(--text-color);
        }

        body {
            background-color: var(--body-color);
            color: #f0f0f0;
        }

        button,
        input {
            outline: none;
            border: none;
        }

        h1, h2, h3, h4 {
            color: var(--title-color);
            font-family: var(--second-font);
            font-weight: var(--font-semi-bold);
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 1120px;
            margin-inline: 1.5rem;
        }

        .grid {
            display: grid;
            gap: 1.5rem;
        }

        .section {
            padding-block: 5rem 1rem;
        }

        .section__title {
            text-align: center;
            font-size: var(--h1-font-size);
            margin-bottom: 1.5rem;
        }

        .main {
            overflow: hidden; 
        }

        .header {
            position: fixed;
            width: 100%;
            background-color: transparent;
            top: 0;
            left: 0;
            z-index: var(--z-fixed);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .nav-items-wrapper {
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .nav-links-list {
            list-style: none;
            display: flex;
            align-items: center;
            margin-right: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-links-list li {
            margin-left: 25px;
        }

        .nav-links-list li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .nav-links-list li a:hover {
            color: #ffd700;
        }

        .book-now-btn-nav {
            background-color: #ffd700;
            color: #2a2c3a;
            border: none;
            padding: 10px 18px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 15px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            white-space: nowrap;
            font-weight: 500;
        }

        .book-now-btn-nav:hover {
            background-color: #e6c200;
            transform: translateY(-1px);
        }

        .burger {
            display: none;
            cursor: pointer;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 25px;
            margin-left: auto;
        }

        .burger div {
            width: 100%;
            height: 3px;
            background-color: #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .start {
            position: relative;
        }
        .start_bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 750px;
            object-fit: cover;
            object-position: center;
            background-image: url('start5.jpg'); 
            background-size: cover;
            background-position: center;
        }
        .start_shadow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 800px;
            background: linear-gradient(180deg,
                                         hsla(0,0%,0%,0) 30%,
                                         hsla(0,0%,0%) 78%);
        }
        .start_container {
            position: relative;
            padding-top: 48px;
            row-gap: 4px;
        }

        .start_data {
            text-align: center;
        }

        .start_subtitle {
            font-size: var(--h3-font-size);
            margin-bottom: 8px;
        }

        .start_title {
            font-size: var(--biggest-font-size);
            margin-bottom: 16px;
        }

        .start_description {
            margin-bottom: 32px;
            color: var(--title-color);
        }

        .button {
            background-color: hsla(0,0%,100%,.2);
            padding: 20px 24px;
            color: var(--title-color);
            display: inline-flex;
            align-items: center;
            column-gap: 8px;
            font-family: var(--second-font);
            font-weight: var(--font-semi-bold);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button i {
            font-size: 20px;
            transition: transform .4s;
            font-weight: initial;
        }

        .button:hover {
            background-color: hsla(0,0%,100%,.3);
            transform: translateY(-2px);
        }

        .button:hover i {
            transform: translateX(4px);
        }

        @media screen and (max-width: 1023px) {
            .nav-links-list {
                display: none;
            }
            .nav-items-wrapper {
                justify-content: flex-end;
            }
            .burger {
                display: flex;
            }
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .logo {
                margin-bottom: 15px;
            }
            .nav-items-wrapper {
                width: 100%;
                flex-direction: column;
                justify-content: center;
                margin-right: 0;
                order: 2;
            }
            .nav-links-list.nav-active {
                display: flex;
                flex-direction: column;
                width: 100%;
                margin-right: 0;
                margin-bottom: 15px;
            }
            .nav-links-list li {
                margin: 10px 0;
            }
            
            .burger {
                display: flex;
                order: 1;
                margin-left: auto;
            }
        }

        @media screen and (max-width: 480px) {
            .navbar .container {
                padding: 0 15px;
            }
            .logo a {
                font-size: 20px;
            }
            .start_title {
                font-size: 2rem;
            }
            .start_description {
                font-size: 0.9rem;
            }
            .button {
                padding: 15px 20px;
            }
        }

     
        .modal {
            display: none; 
            position: fixed;
            z-index: 200;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: var(--container-color);
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease-out;
            position: relative;
        }

        .close-button {
            color: var(--text-color);
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-button:hover,
        .close-button:focus {
            color: #ffd700;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content h2 {
            text-align: center;
            color: var(--title-color);
            margin-bottom: 25px;
            font-size: var(--h2-font-size);
        }

        
        .login-form label,
        .registration-form label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-color-light);
            font-weight: var(--font-medium);
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid hsla(0,0%,100%,.1);
            border-radius: 5px;
            background-color: hsla(0,0%,100%,.05);
            color: var(--title-color);
            font-size: var(--normal-font-size);
            transition: border-color 0.3s ease;
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus,
        .registration-form input[type="text"]:focus,
        .registration-form input[type="email"]:focus,
        .registration-form input[type="password"]:focus {
            border-color: #ffd700;
        }

        .login-form button[type="submit"],
        .registration-form button[type="submit"] {
            background-color: #ffd700;
            color: var(--body-color);
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: var(--normal-font-size);
            font-weight: var(--font-semi-bold);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-form button[type="submit"]:hover,
        .registration-form button[type="submit"]:hover {
            background-color: #e6c200;
            transform: translateY(-1px);
        }

        .login-form .forgot-password,
        .login-form .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: var(--small-font-size);
        }

        .login-form .forgot-password a,
        .login-form .register-link a {
            color: #ffd700;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-form .forgot-password a:hover,
        .login-form .register-link a:hover {
            color: #e6c200;
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .modal.show-modal {
            display: flex;
        }
        
        .error-message {
            color: #ff4d4d; 
            text-align: center;
            margin-bottom: 15px;
            font-size: var(--small-font-size);
        }
        
        .success-message {
            color: #4CAF50; 
            text-align: center;
            margin-bottom: 15px;
            font-size: var(--small-font-size);
        }

        
        .modal-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            border-bottom: 1px solid hsla(0,0%,100%,.1);
        }

        .tab-button {
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: var(--normal-font-size);
            color: var(--text-color);
            transition: color 0.3s ease, border-bottom 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        .tab-button.active {
            color: #ffd700;
            border-bottom-color: #ffd700;
        }

        
        .tab-content {
            display: none; 
        }

        .tab-content.active {
            display: block; 
        }

        .footer {
            background-color: #2a2c3a;
            color: #fff;
            text-align: center;
            padding: 30px 20px;
            margin-top: 61.5px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .footer p {
            font-size: 14px;
            opacity: 0.8;
        }

    </style>
</head>
<body>
    <header class="header" id="header">
        <nav class="navbar">
            <div class="logo">
                <a href="start.php">GO SRILANKA</a>
            </div>
            <div class="nav-items-wrapper">
                <ul class="nav-links-list">
                    <li><a href="start.php">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="destination.php">Destinations</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    <?php else: ?>
                        <li><a href="#" class="protected-link-js" data-target="destination.php">Destinations</a></li>
                        <li><a href="#" class="protected-link-js" data-target="contact.php">Contact Us</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="#" id="login-link">Login</a></li>
                    <?php endif; ?>
                </ul>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <button class="book-now-btn-nav"><a href="booknow.html">Book Now</a></button>
                <?php else: ?>
                    <button class="book-now-btn-nav"><a href="#" class="protected-link-js" data-target="booknow.html">Book Now</a></button>
                <?php endif; ?>
            </div>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="start section" id="start">
            <div class="start_bg"></div>
            <div class="start_shadow"></div>
            <div class="start_container container grid">
                <div class="start_data">
                    <h3 class="start_subtitle">
                        Welcome to GO SRILANKA
                    </h3>
                    <h1 class="start_title">
                        Explore the Beauty of <br/>Sri Lanka
                    </h1>
                    <p class="start_description">
                        Welcome to our travel website! We specialize in creating unforgettable journeys across the globe,<br> with a special focus on the tropical paradise of Sri Lanka.<br> From pristine beaches and lush forests to ancient heritage and vibrant cities,<br> discover the magic of travel with us.
                    </p>
                    <a href="#" class="button" id="start-journey-btn">
                        Start Your Journey<i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="modal-tabs">
                <button class="tab-button active" data-tab="login">Login</button>
                <button class="tab-button" data-tab="register">Register</button>
            </div>

            <div id="login-tab-content" class="tab-content active">
                <h2>Login to Your Account</h2>
                <?php
                
                if (isset($_SESSION['login_error'])) {
                    echo '<p class="error-message">' . htmlspecialchars($_SESSION['login_error']) . '</p>';
                    unset($_SESSION['login_error']); 
                }
                
                if (isset($_SESSION['registration_success'])) {
                    echo '<p class="success-message">' . htmlspecialchars($_SESSION['registration_success']) . '</p>';
                    unset($_SESSION['registration_success']); 
                }
                ?>
                <form class="login-form" action="process_login.php" method="POST">
                    <label for="username">Username/Email</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Login</button>

                    <p class="forgot-password"><a href="#">Forgot Password?</a></p>
                    <p class="register-link">Don't have an account? <a href="#" id="show-register-tab">Register here</a></p>
                </form>
            </div>

            <div id="register-tab-content" class="tab-content">
                <h2>Register New Account</h2>
                <?php
                
                if (isset($_SESSION['registration_error'])) {
                    echo '<p class="error-message">' . htmlspecialchars($_SESSION['registration_error']) . '</p>';
                    unset($_SESSION['registration_error']); 
                }
                ?>
                <form class="registration-form" action="register.php" method="POST">
                    <label for="reg_username">Username</label>
                    <input type="text" id="reg_username" name="reg_username" required>

                    <label for="reg_email">Email</label>
                    <input type="email" id="reg_email" name="reg_email" required>

                    <label for="reg_password">Password</label>
                    <input type="password" id="reg_password" name="reg_password" required>

                    <label for="reg_confirm_password">Confirm Password</label>
                    <input type="password" id="reg_confirm_password" name="reg_confirm_password" required>

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        const burger = document.querySelector('.burger');
        const navLinksList = document.querySelector('.nav-links-list');

        burger.addEventListener('click', () => {
            navLinksList.classList.toggle('nav-active');
            burger.classList.toggle('toggle');
        });

     
        const loginLink = document.getElementById('login-link');
        const loginModal = document.getElementById('loginModal');
        const closeButton = document.querySelector('.close-button');
        const startJourneyBtn = document.getElementById('start-journey-btn');
        const protectedLinksJs = document.querySelectorAll('.protected-link-js');


        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        const showRegisterTabLink = document.getElementById('show-register-tab');

        function showLoginModal() {
            loginModal.classList.add('show-modal');
        }

        function hideLoginModal() {
            loginModal.classList.remove('show-modal');
        }

        function showTab(tabId) {
            
            tabButtons.forEach(button => button.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            
            document.querySelector(`.tab-button[data-tab="${tabId}"]`).classList.add('active');
            document.getElementById(`${tabId}-tab-content`).classList.add('active');
        }

        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.dataset.tab;
                showTab(tabId);
            });
        });

        
        if (showRegisterTabLink) {
            showRegisterTabLink.addEventListener('click', (e) => {
                e.preventDefault();
                showTab('register'); 
            });
        }

        
        if (loginLink) {
            loginLink.addEventListener('click', (e) => {
                e.preventDefault();
                showLoginModal();
                showTab('login'); 
            });
        }

        
        if (startJourneyBtn) {
            startJourneyBtn.addEventListener('click', (e) => {
                e.preventDefault();
                showLoginModal();
                showTab('login');
            });
        }

        
        protectedLinksJs.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); 
                const targetPage = link.dataset.target; 
                showLoginModal();
                showTab('login'); 
            });
        });

      
        closeButton.addEventListener('click', () => {
            hideLoginModal();
        });

        
        window.addEventListener('click', (event) => {
            if (event.target == loginModal) {
                hideLoginModal();
            }
        });

        
        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('login_required') && urlParams.get('login_required') === 'true') {
                showLoginModal();
                showTab('login'); 
                history.replaceState(null, '', window.location.pathname); 
            }
            if (urlParams.has('login_failed') && urlParams.get('login_failed') === 'true') {
                showLoginModal();
                showTab('login'); 
                history.replaceState(null, '', window.location.pathname); 
            }
            if (urlParams.has('registration_success') && urlParams.get('registration_success') === 'true') {
                showLoginModal();
                showTab('login'); 
                history.replaceState(null, '', window.location.pathname); 
            }
            if (urlParams.has('register_failed') && urlParams.get('register_failed') === 'true') {
                showLoginModal();
                showTab('register'); 
                history.replaceState(null, '', window.location.pathname); 
            }
        });

        
        const mediaQuery = window.matchMedia('(max-width: 768px)');

        function handleTabletChange(e) {
            if (e.matches) {
                navLinksList.style.transition = 'transform 0.3s ease-out';
                if (!navLinksList.classList.contains('nav-active')) {
                    navLinksList.style.transform = 'translateX(100%)';
                }
            } else {
                navLinksList.style.transition = 'none';
                navLinksList.style.transform = 'translateX(0)';
                navLinksList.classList.remove('nav-active');
                burger.classList.remove('toggle');
            }
        }
        handleTabletChange(mediaQuery);
        mediaQuery.addListener(handleTabletChange);

        burger.addEventListener('click', () => {
            if (mediaQuery.matches) {
                if (navLinksList.classList.contains('nav-active')) {
                    navLinksList.style.transform = 'translateX(0%)';
                } else {
                    navLinksList.style.transform = 'translateX(100%)';
                }
            }
        });
    </script>

    <footer class="footer">
        <p>&copy; 2025 GO SRILANKA. All rights reserved.</p>
    </footer>

</body>
</html>