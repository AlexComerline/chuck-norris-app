<?php
class ChuckNorrisAPI {
    private string $baseUrl = "https://api.chucknorris.io";

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['jokes'])) {
            $_SESSION['jokes'] = [];
        }
    }

    public function getCategories(): array {
        $url = $this->baseUrl . "/jokes/categories";
        $response = file_get_contents($url);
        return json_decode($response, true) ?? [];
    }

    public function getRandomJokeByCategory(string $category): ?string {
        $url = $this->baseUrl . "/jokes/random?category=" . urlencode($category);
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (!empty($data['value'])) {
            $this->storeJoke($data['value']);
            return $data['value'];
        }

        return null;
    }

    private function storeJoke(string $joke): void {
        $_SESSION['jokes'][] = $joke;
    }

    public function getStoredJokes(): array {
        return $_SESSION['jokes'];
    }

    public function resetJokes(): void {
        $_SESSION['jokes'] = [];
    }
}
