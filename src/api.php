<?php
class Api {
  private string $baseUrl = 'https://api.chucknorris.io';

  public function getCategories(): array {
    $ch = curl_init("{$this->baseUrl}/jokes/categories");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    curl_close($ch);
    return $resp ? json_decode($resp, true) : [];
  }

  public function getJokeByCategory(string $category): string {
    $ch = curl_init("{$this->baseUrl}/jokes/random?category=" . urlencode($category));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    curl_close($ch);
    $data = $resp ? json_decode($resp, true) : [];
    return $data['value'] ?? 'Sin frase disponible.';
  }
}