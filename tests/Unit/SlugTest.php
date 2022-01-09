<?php

namespace Tests\Unit;

use App\Http\Traits\SlugCheckTrait;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    use SlugCheckTrait;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_success()
    {
        $result = $this->checkSlugValidation('movies-name');
        $this->assertTrue($result);
    }

    public function test_failure()
    {
        $result = $this->checkSlugValidation('Movies@');
        $this->assertFalse($result);
    }
}
