<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | South End School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --background: #0f172a;
            --surface: #1e293b;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--background);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-box img {
            height: 60px;
            margin-bottom: 15px;
        }

        .logo-box h2 {
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .form-label {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .input-group {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #64748b;
            padding-left: 15px;
        }

        .form-control {
            background: transparent;
            border: none;
            color: #fff;
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: transparent;
            box-shadow: none;
            color: #fff;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 12px;
            padding: 14px;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(67, 97, 238, 0.4);
            filter: brightness(1.1);
        }

        .footer-links {
            text-align: center;
            margin-top: 25px;
        }

        .footer-links a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        /* Bg Background */
        .bg-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.15) 0%, rgba(67, 97, 238, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .glow-1 { top: -250px; right: -250px; }
        .glow-2 { bottom: -250px; left: -250px; }
    </style>
</head>
<body>
    <div class="bg-glow glow-1"></div>
    <div class="bg-glow glow-2"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-box">
                <img src="{{ asset('frontend-asset/images/logo.png') }}" alt="Logo">
                <h2>Admin Portal</h2>
                <p class="text-secondary small mt-1">Please sign in to continue</p>
            </div>

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger border-0 rounded-3 mb-4" style="background: rgba(239, 68, 68, 0.15); color: #fca5a5;">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
                @endif

                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-secondary small" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="small text-decoration-none" style="color: var(--accent);">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-login">
                    Sign In <i class="fa fa-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="footer-links">
                <a href="{{ route('home') }}"><i class="fa fa-arrow-left me-1"></i> Back to Website</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
