<?php
// https://github.com/firebase/php-jwt

require_once APPPATH . '/libraries/JWT/JWT.php';
require_once APPPATH . '/libraries/JWT/Exception/BeforeValidException.php';
require_once APPPATH . '/libraries/JWT/Exception/ExpiredException.php';
require_once APPPATH . '/libraries/JWT/Exception/SignatureInvalidException.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\BeforeValidException;
use \Firebase\JWT\ExpiredException;
use \Firebase\JWT\SignatureInvalidException;

class Jwt_lib
{
  private $key;

  public function __construct()
  {
    $this->key = 'apl_opd_tpid_secret_key_live'; // Replace with your own secret key
  }

  // Generate bearer token for user
  public function generateBearerToken($userId)
  {
    $payload = array(
      'user_id' => $userId,
      'exp' => time() + 3600 // Expiration time of the token (e.g., 1 hour)
    );

    $bearerToken = JWT::encode($payload, $this->key, 'HS256'); // Specify the desired signing algorithm, e.g., 'HS256'

    return $bearerToken;
  }
}
