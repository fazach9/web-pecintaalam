<?php

final class Router
{
    /**
     * Menyimpan semua route GET dan POST.
     */
    private array $routes = [];

    /**
     * Mendaftarkan route GET.
     */
    public function get(string $path, callable|array $handler): void
    {
        $path = $this->normalizeRoute($path);

        $this->routes['GET'][$path] = $handler;
    }

    /**
     * Mendaftarkan route POST.
     */
    public function post(string $path, callable|array $handler): void
    {
        $path = $this->normalizeRoute($path);

        $this->routes['POST'][$path] = $handler;
    }

    /**
     * Menjalankan route berdasarkan HTTP method dan URL.
     */
    public function dispatch(string $method, string $uri): void
    {
        // Ambil path tanpa query string.
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        // Ambil nama folder dasar aplikasi.
        // Contoh: /arga_dahana_starter/public
        $basePath = rtrim(
            str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')),
            '/'
        );

        // Hilangkan base path dari URL agar route cocok.
        if (
            $basePath !== '' &&
            $basePath !== '/' &&
            (
                $path === $basePath ||
                str_starts_with($path, $basePath . '/')
            )
        ) {
            $path = substr($path, strlen($basePath));
        }

        // Normalisasi path.
        $path = $this->normalizeRoute($path);

        // Normalisasi HTTP method.
        $method = strtoupper($method);

        // Cari handler route.
        $handler = $this->routes[$method][$path] ?? null;

        // Jika route tidak ditemukan.
        if ($handler === null) {
            $this->notFound();
            return;
        }

        // Jika handler berupa Controller dan method.
        if (is_array($handler)) {
            [$class, $action] = $handler;

            if (!class_exists($class)) {
                throw new RuntimeException(
                    "Controller {$class} tidak ditemukan."
                );
            }

            $controller = new $class();

            if (!method_exists($controller, $action)) {
                throw new RuntimeException(
                    "Method {$action} tidak ditemukan pada {$class}."
                );
            }

            $controller->$action();
            return;
        }

        // Jika handler berupa closure atau callable.
        call_user_func($handler);
    }

    /**
     * Menormalisasi URL route.
     */
    private function normalizeRoute(string $path): string
    {
        $path = '/' . trim($path, '/');

        return $path === '' ? '/' : $path;
    }

    /**
     * Menampilkan halaman 404.
     */
    private function notFound(): void
    {
        http_response_code(404);

        $errorPage = __DIR__ .
            '/../../resources/views/errors/404.php';

        if (file_exists($errorPage)) {
            require $errorPage;
            return;
        }

        echo '404 - Halaman tidak ditemukan.';
    }
}
