<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
<<<<<<< HEAD
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/login', // exclude login POST requests
    ];
=======
  /**
   * The URIs that should be excluded from CSRF verification.
   *
   * @var array<int, string>
   */
  protected $except = [
    '/login', // exclude login POST requests
  ];
>>>>>>> 8dad89438ae279f6eefdcd05390c7e5022befee6
}
