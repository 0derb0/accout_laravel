<?php

namespace App\Actions\Post;
use App\Models\Post;

class EditPostAction
{
  public function __invoke(array $new_data, Post $post)
  {
    $new_post = [
      'title' => ($new_data['title'] ?? $post->title),
      'body' => ($new_data['body'] ?? $post->body)
    ];

    $post->update($new_post);
  }
}