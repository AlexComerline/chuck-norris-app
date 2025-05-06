<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Api.php';

class ApiTest extends TestCase {
    public function testGetCategoriesReturnsArray() {
        $api = new Api();
        $cats = $api->getCategories();
        $this->assertIsArray($cats);
    }

    public function testGetJokeByCategoryReturnsString() {
        $api = new Api();
        $joke = $api->getJokeByCategory('dev');
        $this->assertIsString($joke);
        $this->assertNotEmpty($joke);
    }
}
