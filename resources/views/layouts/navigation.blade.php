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
                --primary: #4F46E5;
                --primary-dark: #4338CA;
                --text-primary: #1F2937;
                --text-secondary: #6B7280;
                --bg-light: #ffffff;
                --bg-dark: #111827;
                --transition: all 0.3s ease;
            }

            body {
                min-height: 100vh;
                font-family: 'Figtree', sans-serif;
            }

            .nav {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                position: sticky;
                top: 0;
                z-index: 50;
                backdrop-filter: blur(8px);
                background: var(--bg-light);
            }

            .shrink-0 a {
                transition: var(--transition);
            }

            .shrink-0 a:hover {
                transform: scale(1.05);
            }

            .nav-link {
                position: relative;
                padding: 0.5rem 1rem;
                color: var(--text-secondary);
                font-weight: 500;
                transition: var(--transition);
            }

            .nav-link:hover {
                color: var(--primary);
            }

            .nav-link.active {
                color: var(--primary);
            }

            .nav-link.active::after {
                content: '';
                position: absolute;
                bottom: -1px;
                left: 0;
                width: 100%;
                height: 2px;
                background-color: var(--primary);
                transform: scaleX(1);
                transition: var(--transition);
            }

            .auth-container {
                min-height: calc(100vh - 64px);
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .dropdown button {
                background: transparent;
                border: 1px solid #E5E7EB;
                transition: var(--transition);
            }

            .dropdown button:hover {
                border-color: var(--primary);
                color: var(--primary);
            }

            .dropdown-content {
                background: var(--bg-light);
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                transform-origin: top;
                animation: dropdown 0.2s ease-out;
            }

            @keyframes dropdown {
                from {
                    opacity: 0;
                    transform: scale(0.95) translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            .dropdown-link {
                padding: 0.75rem 1rem;
                color: var(--text-secondary);
                transition: var(--transition);
            }

            .dropdown-link:hover {
                background-color: #F3F4F6;
                color: var(--primary);
            }

            .hamburger {
                width: 40px;
                height: 40px;
                border-radius: 0.375rem;
                transition: var(--transition);
            }

            .hamburger:hover {
                background-color: #F3F4F6;
            }

            .hamburger svg {
                transition: var(--transition);
            }

            .dark .nav {
                background: var(--bg-dark);
                border-color: #374151;
            }

            .dark .dropdown button {
                border-color: #374151;
            }

            .dark .dropdown-content {
                background: var(--bg-dark);
            }

            .dark .dropdown-link:hover {
                background-color: #1F2937;
            }

            .auth-card {
                width: 100%;
                max-width: 28rem;
                margin-top: 1.5rem;
                padding: 2rem;
                background: var(--bg-light);
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .dark .auth-card {
                background: var(--bg-dark);
            }

            @media (max-width: 640px) {
                .responsive-menu {
                    transform-origin: top;
                    animation: mobile-menu 0.3s ease-out;
                }
                
                @keyframes mobile-menu {
                    from {
                        opacity: 0;
                        transform: scaleY(0.95);
                    }
                    to {
                        opacity: 1;
                        transform: scaleY(1);
                    }
                }
            }

            @media (min-width: 640px) {
                .auth-container {
                    justify-content: center;
                    padding-top: 0;
                    padding-bottom: 0;
                }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav x-data="{ open: false }" class="nav dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    @if (Auth::check())
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-400 underline">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-400 underline">Register</a>
                            @endif
                        </div>
                    @endif

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="hamburger inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden responsive-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                @if (Auth::check())
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </nav>

        <div class="auth-container">
            <div class="auth-card">
                
            </div>
        </div>
    </body>
</html>