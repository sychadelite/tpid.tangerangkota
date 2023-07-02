<?php
require_once APPPATH . '/libraries/JWT/JWT.php';
require_once APPPATH . '/libraries/JWT/Key.php';
require_once APPPATH . '/libraries/JWT/Exception/ExpiredException.php';
require_once APPPATH . '/libraries/JWT/Exception/SignatureInvalidException.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use \Firebase\JWT\ExpiredException;
use \Firebase\JWT\SignatureInvalidException;

function secretKey() {
  $key = "apl_opd_tpid_secret_key_live";
  return $key;
}

function decodeJwtToken($jwtToken, $key)
{
  try {
    $decodedToken = JWT::decode($jwtToken, new Key($key, 'HS256'));
    return $decodedToken;
  } catch (SignatureInvalidException $e) {
    // Handle expired token exception
    return null;
  } catch (ExpiredException $e) {
    // Handle expired token exception
    return null;
  } catch (\Exception $e) {
    // Handle other exceptions
    return null;
  }
}
