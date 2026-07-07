<?php

use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->publishedPost = Post::factory()->published()->create(['user_id' => $this->user->id]);
    $this->draftPost = Post::factory()->create(['user_id' => $this->user->id]);
});

test('blog index displays published posts', function () {
    $response = $this->get(route('blog.index'));

    $response->assertOk();
    $response->assertSee($this->publishedPost->title);
    $response->assertDontSee($this->draftPost->title);
});

test('published post show page is accessible', function () {
    $response = $this->get(route('blog.show', $this->publishedPost));

    $response->assertOk();
    $response->assertSee($this->publishedPost->title);
    $response->assertSeeText($this->publishedPost->content);
});

test('draft post show page returns 404', function () {
    $response = $this->get(route('blog.show', $this->draftPost));

    $response->assertStatus(404);
});
