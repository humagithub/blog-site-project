<!-- resources/views/send-otp.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Send OTP</title>
</head>
<body>
    <h1>Send OTP to Your Email</h1>
    
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('send.otp') }}" method="POST">
        @csrf
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
