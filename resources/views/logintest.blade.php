<!DOCTYPE html>
<html>
<body>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="email-username" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>