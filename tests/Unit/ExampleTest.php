<?php

namespace Tests\Unit;
use App\Posts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	//given
        $first = factory(Posts::class)->create();
        $second = factory(Posts::class)->create([
        	'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
        //action
        $posts = Posts::archives();
        //recive
        $this->assertCount(2, $posts);
    }
}
