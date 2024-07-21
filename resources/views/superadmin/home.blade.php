<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <h1>Welcome, superadmin</h1>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="nav-link" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        Logout
    </a>
</body>
</html>
