<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Cookie;


class SessionService
{
  /**
   * @var SessionInterface
   */
  private $session;




  public function __construct(SessionInterface $session)
    {
      $this->session =$session;

    }


  public function newSession($uuid){
    if(empty($this->session->get($this->getIdSession($uuid)))){
      $this->session->set($this->getIdSession($uuid), json_encode([]));

    }
  }


  /**
   * create one Uuid in cookie
   * @param  Request $request
   * @param  string  $nameForm
   * @return string
   */
  public function setUuidCookie(Request $request){
    $response = new Response();

    if(!empty($request->cookies->get('Uuid'))){
      $uuid = $request->cookies->get('Uuid');
      if(empty($this->session->get($this->getIdSession($uuid)))){
          $response->headers->clearCookie('Uuid');
          $request->cookies->remove('Uuid');



      }
    }

    if(empty($request->cookies->get('Uuid'))){
      $uuid = uniqid();

      $response->headers->setCookie(new Cookie('Uuid', $uuid,time() + (1*24*60*60)));
      $response->send();
      return $uuid;

    }

      return null;
  }



  public function delUuidCookie(Request $request){
    $response = new Response();
    $response->headers->clearCookie('Uuid');
    $response->send();
  }



  /**
   * Get Id Session with Uuid
   * @param  $uuid
   * @return string
   */
  public function getIdSession($uuid) :string
  {
    $prefix = "resultForm_";

    return "{$prefix}{$uuid}";
  }

  /**
   * Array In Session is'nt Empty
   * @param  $uuid
   * @return bool
   */
  public function ArrayInSessionEmpty($uuid) :bool
  {
    if($this->session->get( $this->getIdSession($uuid)) !== json_encode([])){
      return true;
    }else{
      return false;
    }
  }


  /**
   * add one booking in session
   * @param  string $sessionName
   * @param  array    $value
   */
  public function addEntityInSession(string $sessionName,array $value):void
    {
      $resultInSession= json_decode($this->session->get($sessionName),true);

      $resultRequest= $value;
      $resultInSession[] =$resultRequest;
      $this->session->set($sessionName, json_encode($resultInSession));

    }


    /**
     * delete one booking in session
     * @param  string $sessionName
     * @param  int    $idDelete
     */
    public function delEntityInSession(string $sessionName,int $idDelete) :void
    {
      $arrayResut =json_decode($this->session->get($sessionName),true);
      unset($arrayResut[$idDelete]);
      $arrayResut = array_values($arrayResut);
      $this->session->set($sessionName, json_encode($arrayResut));
    }


}
