<?php

namespace App\Helpers;

class ReturnBackHelper
{
  public function __invoke(array $messages) 
  {
    return back()
      ->withInput()
      ->withErrors($messages);
  }
}