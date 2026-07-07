<?php

use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('authenticated user can view posts index', function () {
    Post::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->actingAs($this->user)->get(route('posts.index'));

    $response->assertOk();
    $response->assertSeeText(__('Posts'));
});

test('authenticated user can create a post', function () {
    $response = $this->actingAs($this->user)->post(route('posts.store'), [
        'title' => 'New Post',
        'slug' => 'new-post',
        'excerpt' => 'Post excerpt.',
        'content' => 'This is the post content.',
        'status' => 'published',
        'published_at' => now()->format('Y-m-d\TH:i'),
    ]);

    $response->assertRedirect(route('posts.index'));

    $this->assertDatabaseHas('posts', [
        'title' => 'New Post',
        'slug' => 'new-post',
        'status' => 'published',
    ]);
});

test('authenticated user can update a post', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $response = $this->actingAs($this->user)->put(route('posts.update', $post), [
        'title' => 'Updated Title',
        'slug' => 'updated-title',
        'excerpt' => 'Updated excerpt.',
        'content' => 'Updated content.',
        'status' => 'draft',
        'published_at' => '',
    ]);

    $response->assertRedirect(route('posts.index'));

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Updated Title',
        'slug' => 'updated-title',
        'status' => 'draft',
    ]);
});

test('authenticated user can delete a post', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $response = $this->actingAs($this->user)->delete(route('posts.destroy', $post));

    $response->assertRedirect(route('posts.index'));

    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});
