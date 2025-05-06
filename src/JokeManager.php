<?php
class JokeManager {
  public function __construct() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (!isset($_SESSION['jokes'])) $_SESSION['jokes'] = [];
  }
  public function addJoke(string $joke): void {
    $_SESSION['jokes'][] = $joke;
  }
  public function getJokes(): array {
    return $_SESSION['jokes'];
  }
  public function resetJokes(): void {
    $_SESSION['jokes'] = [];
  }
}