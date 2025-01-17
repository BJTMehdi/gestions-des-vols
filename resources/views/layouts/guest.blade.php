<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary: #FF2D20;
                --primary-hover: #ef233c;
                --bg-light: #F9FAFB;
                --bg-dark: #111827;
                --card-light: #ffffff;
                --card-dark: #1F2937;
                --text-primary: #111827;
                --text-secondary: #6B7280;
                --transition: all 0.3s ease;
            }

            body {
                min-height: 100vh;
                background: var(--bg-light);
                font-family: 'Figtree', sans-serif;
            }

            .dark body {
                background-color: var(--bg-dark);
            }

            .auth-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            @media (min-width: 640px) {
                .auth-container {
                    justify-content: center;
                    padding-top: 0;
                    padding-bottom: 0;
                }
            }

            .logo-container {
                margin-bottom: 2rem;
                transition: var(--transition);
            }

            .logo-container svg {
                width: 50px;
                height: 50px;
                transition: var(--transition);
            }

            .logo-link {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                text-decoration: none;
                color: var(--text-primary);
            }

            .logo-text {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--text-primary);
            }

            .dark .logo-text {
                color: #E5E7EB;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 1rem;
                width: 100%;
                max-width: 1280px;
                margin: 0 auto;
            }

            .nav-links {
                display: flex;
                gap: 1.5rem;
                align-items: center;
            }

            .nav-link {
                color: var(--text-secondary);
                text-decoration: none;
                font-weight: 500;
                transition: var(--transition);
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
            }

            .nav-link:hover {
                color: var(--primary);
                background: rgba(255, 45, 32, 0.1);
                text-decoration: none;
            }

            .hamburger {
                display: none;
                padding: 0.5rem;
                cursor: pointer;
                background: transparent;
                border: none;
            }

            .hamburger svg {
                width: 24px;
                height: 24px;
                color: var(--text-secondary);
            }

            @media (max-width: 640px) {
                .nav-links {
                    display: none;
                }

                .hamburger {
                    display: block;
                }
            }

            .auth-card {
                width: 100%;
                max-width: 28rem;
                margin-top: 1.5rem;
                padding: 2rem;
                background: var(--card-light);
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1),
                            0 1px 2px rgba(0, 0, 0, 0.06);
            }

            .dark .auth-card {
                background: var(--card-dark);
            }

            input, select, textarea {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 1px solid #E5E7EB;
                border-radius: 0.375rem;
                background: transparent;
                transition: var(--transition);
            }

            input:focus, select:focus, textarea:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(255, 45, 32, 0.1);
            }

            .dark input, .dark select, .dark textarea {
                border-color: #374151;
                color: #E5E7EB;
            }

            button {
                width: 100%;
                padding: 0.75rem 1.5rem;
                background: var(--primary);
                color: white;
                border: none;
                border-radius: 0.375rem;
                font-weight: 500;
                transition: var(--transition);
            }

            button:hover {
                background: var(--primary-hover);
            }

            a {
                color: var(--primary);
                text-decoration: none;
                transition: var(--transition);
            }

            a:hover {
                color: var(--primary-hover);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="navbar">
            <div class="logo-container">
                <a href="/" class="logo-link">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                        <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5059 63.8215 24.4546 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0196L48.4147 7.12386C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12386L61.3899 14.0196C61.4323 14.0433 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4553L25.953 49.7667L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 49.7667L7.69057 40.4553L1.99677 37.1768V9.83281ZM49.9118 8.78088L37.9334 15.6736L49.9118 22.5631L61.8867 15.6736L49.9118 8.78088ZM25.953 22.5631L37.9334 15.6736L25.953 8.78088L13.9727 15.6736L25.953 22.5631ZM1.99677 8.78088L13.9727 15.6736L25.953 8.78088L13.9727 1.89019L1.99677 8.78088Z" fill="#FF2D20"/>
                    </svg>
                    <span class="logo-text">Laravel</span>
                </a>
            </div>
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </div>
            <button class="hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </nav>

        <div class="auth-container">
            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>