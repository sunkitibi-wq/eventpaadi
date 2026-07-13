<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Reaction;
use Livewire\Component;

class PostReaction extends Component
{
    public Post $post;
    public $likesCount;
    public $dislikesCount;
    public $userReaction = null;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->updateCounts();
        $this->loadUserReaction();
    }

    public function updateCounts()
    {
        $this->likesCount = $this->post->likes()->count();
        $this->dislikesCount = $this->post->dislikes()->count();
    }

    public function loadUserReaction()
    {
        if (auth()->check()) {
            $reaction = Reaction::where('post_id', $this->post->id)
                ->where('user_id', auth()->id())
                ->first();
        } else {
            $reaction = Reaction::where('post_id', $this->post->id)
                ->where('ip_address', request()->ip())
                ->first();
        }

        $this->userReaction = $reaction ? $reaction->is_like : null;
    }

    public function toggleReaction(bool $isLike)
    {
        $userId = auth()->id();
        $ipAddress = request()->ip();

        if ($userId) {
            $reaction = Reaction::where('post_id', $this->post->id)->where('user_id', $userId)->first();
        } else {
            $reaction = Reaction::where('post_id', $this->post->id)->where('ip_address', $ipAddress)->first();
        }

        if ($reaction) {
            if ($reaction->is_like === $isLike) {
                // Remove reaction if clicking the same button
                $reaction->delete();
                $this->userReaction = null;
            } else {
                // Switch reaction
                $reaction->update(['is_like' => $isLike]);
                $this->userReaction = $isLike;
            }
        } else {
            // Create new reaction
            Reaction::create([
                'post_id' => $this->post->id,
                'user_id' => $userId,
                'ip_address' => $userId ? null : $ipAddress,
                'is_like' => $isLike,
            ]);
            $this->userReaction = $isLike;
        }

        $this->updateCounts();
    }

    public function render()
    {
        return view('livewire.post-reaction');
    }
}
