<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; }
        .login-box h2 { margin-bottom: 20px; text-align: center; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc; }
        .btn { width: 100%; padding: 10px; background: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Parol</label>
                <input type="password" name="password" required>
            </div>
            <button class="btn" type="submit">Kirish</button>
        </form>
    </div>
</body>
</html>
