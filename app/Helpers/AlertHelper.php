<?php

namespace App\Helpers;

class AlertHelper
{
  public function __invoke(string $message): void
  {
    session(['alert' => __($message)]);
  }
}