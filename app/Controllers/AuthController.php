<?php
declare(strict_types=1);

final class AuthController
{
    public function showLogin(): void
    {
        require __DIR__ . '/../../resources/views/auth/login.php';
    }

    public function login(): void
    {
        // TODO: validate CSRF token, validate input, fetch user with PDO,
        // verify password using password_verify(), regenerate session ID,
        // then redirect based on role.
        http_response_code(501);
        echo 'Login handler belum diimplementasikan.';
    }

    public function logout(): void
    {
        // TODO: clear session data, destroy session and redirect to login.
        session_unset();
        session_destroy();
        header('Location: /arga-dahana/public/login');
        exit;
    }
}
