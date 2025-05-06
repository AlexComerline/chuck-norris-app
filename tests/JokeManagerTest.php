<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/JokeManager.php';

class JokeManagerTest extends TestCase {
    protected function setUp(): void {
        $_SESSION = [];
    }

    public function testAddAndGetJokes() {
        $mgr = new JokeManager();
        $mgr->addJoke('Test');
        $this->assertCount(1, $mgr->getJokes());
    }

    public function testResetJokes() {
        $mgr = new JokeManager();
        $mgr->addJoke('X');
        $mgr->resetJokes();
        $this->assertEmpty($mgr->getJokes());
    }
}
