<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ```
    <title>Login Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #756ab6 0%, #5a4fa0 100%);
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 40px 36px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .logo-circle {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #756ab6, #a29bde);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-circle svg {
            width: 28px;
            height: 28px;
            fill: #ffffff;
        }

        h2 {
            text-align: center;
            margin: 0 0 6px;
            color: #2d2a4a;
            font-size: 24px;
        }

        .subtitle {
            text-align: center;
            color: #8a86a8;
            font-size: 14px;
            margin-bottom: 28px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #4a4667;
        }

        .field {
            margin-bottom: 18px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e3e1f5;
            border-radius: 8px;
            font-size: 14px;
            background: #f9f9ff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            outline: none;
            border-color: #756ab6;
            box-shadow: 0 0 0 3px rgba(117, 106, 182, 0.15);
            background: #ffffff;
        }

        input::placeholder {
            color: #b3b0cc;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 6px;
            border: none;
            background: #756ab6;
            color: white;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover {
            background: #63589d;
        }

        button:active {
            transform: scale(0.98);
        }

        /* Tombol kembali ke beranda */
        .home-button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: 1.5px solid #756ab6;
            background: #ffffff;
            color: #756ab6;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .home-button:hover {
            background: #756ab6;
            color: #ffffff;
        }

        .error {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #b3261e;
            background: #fdecea;
            border: 1px solid #f5c6c3;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13.5px;
        }
    </style>
    ```

</head>

<body>

    ```
    <div class="container">

        <div class="logo-circle">
            <svg viewBox="0 0 24 24">
                <path
                    d="M12 2a5 5 0 0 1 5 5v3h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h1V7a5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3v3h6V7a3 3 0 0 0-3-3z" />
            </svg>
        </div>

        <h2>Login Admin</h2>
        <p class="subtitle">Masuk untuk mengelola dashboard Anda</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required autofocus>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <a href="{{ url('/') }}" class="home-button">
            ← Kembali ke Beranda
        </a>

    </div>
    ```

</body>

</html>
