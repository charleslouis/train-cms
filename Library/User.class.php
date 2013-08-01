<?php
namespace Library;
// Pensez à modifier votre classe Application afin d'ajouter un attribut $user et à créer l'objet User dans le constructeur que vous stockerez dans l'attribut créé.

// Avant de commencer à coder la classe, il faut que vous ajoutiez l'instruction invoquant session_start() au début du fichier, en dehors de la classe. Ainsi, dès l'inclusion du fichier par l'autoload, la session démarrera et l'objet créé sera fonctionnel.
session_start();
 
class User extends ApplicationComponent
{
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }
   
  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
     
    return $flash;
  }
   
  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }
   
  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }
   
  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }
   
  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
    }
     
    $_SESSION['auth'] = $authenticated;
  }
   
  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }
}