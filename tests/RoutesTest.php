<?php

class RoutesTest extends TestCase
{
    public function testIndex()
    {
        $this->visit('/')->assertResponseStatus(200);
    }

    public function testLogin()
    {
        $this->visit('admin/login')->assertResponseStatus(200);
    }
}
