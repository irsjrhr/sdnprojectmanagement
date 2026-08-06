<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Arxino Project Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #eef2ff 0%, #f0f9ff 50%, #fafafa 100%);
            color: #1e293b;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        /* Glowing background blobs for light theme */
        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(120px);
            z-index: 1;
            opacity: 0.15;
            pointer-events: none;
        }
        .blob-1 {
            background-color: #0891b2;
            top: -100px;
            left: -100px;
        }
        .blob-2 {
            background-color: #2563eb;
            bottom: -150px;
            right: -100px;
        }
        .container {
            width: 100%;
            max-width: 440px;
            padding: 20px;
            z-index: 10;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 44px 36px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05), 0 2px 10px rgba(0, 0, 0, 0.02);
            text-align: center;
        }
        .logo-area {
            margin-bottom: 32px;
        }
        .logo-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #0891b2 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }
        .logo-sub {
            font-size: 0.9rem;
            color: #64748b;
            margin-top: 4px;
            font-weight: 500;
        }
        .form-group {
            margin-bottom: 22px;
            text-align: left;
        }
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-control {
            width: 100%;
            padding: 13px 16px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #1e293b;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }
        .form-control::placeholder {
            color: #94a3b8;
        }
        .form-control:focus {
            outline: none;
            border-color: #0891b2;
            box-shadow: 0 0 0 4px rgba(8, 145, 178, 0.1);
        }
        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 24px;
            text-align: left;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0891b2 0%, #2563eb 100%);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(8, 145, 178, 0.2);
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(8, 145, 178, 0.3);
            opacity: 0.95;
        }
        .btn:active {
            transform: translateY(1px);
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 28px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 500;
        }
        .remember-me input {
            cursor: pointer;
            width: 16px;
            height: 16px;
            accent-color: #0891b2;
        }
    </style>
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="container">
        <div class="card">
            <div class="logo-area">
                <div class="logo-title">ARXINO</div>
                <div class="logo-sub">Project Management System</div>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@arxino.com" required autocomplete="username">
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required autocomplete="current-password">
                </div>

                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>