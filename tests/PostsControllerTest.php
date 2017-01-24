<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsControllerTest extends TestCase
{
	use WithoutMiddleware;

	public function testStorePost()
	{
		$data = [
			'title' => 'Random title',
			'body' => 'Lorem ipsum......',
		];

		$response = $this->call('POST', 'post/store', $data);
		$this->assertEquals(4, count(\App\Post::all()));

		$newPost = \App\Post::find(4);
		$this->assertEquals($data['title'], $newPost->title);
		$this->assertEquals($data['body'], $newPost->body);
	}

	public function testDeletePost()
	{
		$postId = 1;
		$this->call('GET', 'post/delete/' . $postId);
		$this->assertEquals(2, count(\App\Post::all()));
	}
}
