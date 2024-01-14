<?php

namespace App\Actions\Post;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StorePostAction
{
  public function __invoke(array $data, Post $post)
  {
    $new_post = [
      'user_id' => Auth::id(),
      'title' => $data['title'],
      'body' => $data['body']
    ];

    $post->create($new_post);
  }
}