<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        
        /* Navigation */
        nav { 
            background: white; 
            padding: 1rem 2rem; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #8b5cf6;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }
        
        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }
        
        .nav-links a:hover {
            color: #8b5cf6;
        }
        
        .nav-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-brand">
            <svg viewBox="0 0 24 24" style="width: 32px; height: 32px; fill: #8b5cf6;">
                <rect x="2" y="6" width="20" height="12" rx="2"/>
                <circle cx="7" cy="19" r="2"/>
                <circle cx="17" cy="19" r="2"/>
            </svg>
            Rentlee
        </div>
        
        <ul class="nav-links">
            <li><a href="#">Bus Booking</a></li>
            <li><a href="#">My Trips</a></li>
            <li><a href="#">Support</a></li>
        </ul>
        
        <div class="nav-buttons">
            <button onclick="openLoginModal()" style="background: transparent; border: 2px solid #8b5cf6; color: #8b5cf6; padding: 0.6rem 1.5rem; border-radius: 8px; cursor: pointer; font-weight: 600;">
                Login
            </button>
            <button onclick="openLoginModal()" style="background: #8b5cf6; border: none; color: white; padding: 0.6rem 1.5rem; border-radius: 8px; cursor: pointer; font-weight: 600;">
                Sign Up
            </button>
        </div>
    </nav>

    @yield('content')

    @include('components.footer')
    @include('components.login-modal')

</body>
</html>