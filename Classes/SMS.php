<?php

/**
* Classe de disparo de sms dinâmico
*/
class SMS
{

  /**
  * username de acesso api-messaging.movile.com
  */
  protected $username;
  /**
  * token de acesso api-messaging.movile.com
  */
  protected $token;

  public function __construct($username, $token){
    $this->username = $username;
    $this->token = $token;
  }

  /**
  * Função para obter apenas os status ainda não consultados
  */
  public function listStatus()
  {

    $curl = curl_init('https://api-messaging.movile.com/v1/sms/status/list');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      "authenticationtoken:$this->token",
      "username: $this->username",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  /**
  * Função para obter respostas de sms disparados.
  */
  public function listMo(String $subaccount = null)
  {

    if ($subaccount) {
      $curl = curl_init(
        "https://api-messaging.movile.com/v1/sms/receive/list?subAccount={$subaccount}"
      );
    }else {
      $curl = curl_init(
        'https://api-messaging.movile.com/v1/sms/receive/list'
      );
    }
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      "authenticationtoken:$this->token",
      "username: $this->username",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }
  }



  /**
  * Função para buscar disparo especifico ou em massa.
  * @param Array $array de ids para buscar disparo especifico ou em massa.
  */
  public function search($array)
  {
    $array = [
     $obj = (object) [
        'id' => "DF5BE495-C5A4-11E8-9E1E-000C293AFF23",
      ],
    ];


    $contacts_search = [
      'ids' => [],
    ];

    foreach ($array as $row) {
      array_push($contacts_search['ids'],$row->id);
    }

    $json =  json_encode($contacts_search);

    $curl = curl_init('https://api-messaging.movile.com/v1/sms/status/search');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      "authenticationtoken:$this->token",
      "username: $this->username",
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json)
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }


  }

  /**
  * Função para buscar disparo especifico.
  * @param Int $id buscar disparo especifico.
  */
  public function findById($id)
  {

    $contacts_search = [
      'ids' => [$id],
    ];

    $json =  json_encode($contacts_search);

    $curl = curl_init('https://api-messaging.movile.com/v1/sms/status/search');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      "authenticationtoken:$this->token",
      "username: $this->username",
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json)
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }


  }


  /**
  *
  * Função para buscar respostas de disparo especifico ou em massa.
  * Como um usuário regular, para recuperar todas MOs de uma subconta use:
  * Como usuário administrador, para recuperar TODAS as MOs de TODAS subcontas use:
  * Como usuário administrador. para recuperar as MOs de uma subconta com a referencia “referencia_subconta”, use:
  * @param Array $array de $params[] .
  * Como usuário administrador. para recuperar as MOs de uma subconta com a referencia “referencia_subconta”, use:
  * GET https://api-messaging.movile.com/v1/sms/receive/search?subAccount=$params['subaccount']
  *
  * Busca com START e END definidos:
  * GET https://api-messaging.movile.com/v1/sms/receive/search?$params['start']&end=$params['end']
  *
  * Somente com START especificado (utilizando END padrão, data atual)
  * GET https://api-messaging.movile.com/v1/sms/receive/search?start=$params['start']
  *
  * Somente com END especificado (utilizando START padrão, 5 dias antes da data atual)
  * GET https://api-messaging.movile.com/v1/sms/receive/search?end=$params['end']
  *
  */
  public function searchMo(Array $params = [])
  {
    if ($params['subaccount']) {
      $url = "https://api-messaging.movile.com/v1/sms/receive/search?subAccount={$params['subaccount']}";
    }else if($params['start'] && $params['end']) {
      $url = "https://api-messaging.movile.com/v1/sms/receive/search?start={$params['start']}&end={$params['end']}";
    }else if($params['start']) {
      $url = "https://api-messaging.movile.com/v1/sms/receive/search?start={$params['start']}";
    }else if($params['end']) {
      $url = "https://api-messaging.movile.com/v1/sms/receive/search?end={$params['end']}";
    }else {
      $url = 'https://api-messaging.movile.com/v1/sms/receive/search';
    }

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      "authenticationtoken:$this->token",
      "username: $this->username",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  /**
  * Função para disparo de sms único
  * @param String $name nome do contato para disparo
  * @param String $phone telefone do contato para disparo
  * @param String $message mensagem para disparo
  */
  public function send_sms(String $name, String $phone, String $message)
  {
    $curl = curl_init('https://api-messaging.movile.com/v1/send-sms');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($curl, CURLOPT_ENCODING,"");
    curl_setopt($curl, CURLOPT_MAXREDIRS,10 );
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS,"
    {\"destination\": \"{$phone}\" ,  \"messageText\": \"{$name}\\n {$message}\"}
    ");
    curl_setopt($curl, CURLOPT_HTTPHEADER,[
      "authenticationtoken:$this->token",
      "username: $this->username",
      "content-type: application/json"
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }

  }

  /**
  * Função para disparo de sms em massa com dependencia da function set_send_messages().
  * @param Array $array lista de contatos para disparo em massa.
  * @param String $message mensagem para disparo.
  * @param String $messageDefault mensagem padrão para disparo.
  *
  */
  public function send_bulk_sms(Array $array, string $message,string $messageDefault = NULL)
  {

    $json = $this->set_send_messages($array, $message, $messageDefault);

    $curl = curl_init('https://api-messaging.movile.com/v1/send-bulk-sms');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "authenticationtoken:$this->token",
      "username: $this->username",
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json))
    );

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "CURL Error #:" . $err;
    } else {
      return $response;
    }


  }


  /**
  * Função para setar valor e construir object json para disparo em massa
  * @param Array $array lista de contatos para disparo em massa.
  * @param String $message mensagem para disparo
  * @param String $messageDefault mensagem padrão para disparo
  */
  public function set_send_messages(Array $array, string $message,string $messageDefault = NULL)
  {

    $contacts_send_bulk = [
      'messages' => [],
      'defaultValues' => ['messageText' => $messageDefault],
    ];


    foreach ($array as $value) {
      $array = [
        'destination'   => "{$value->phone}",
        'messageText' => "{$value->name}, $message",
      ];

      array_push($contacts_send_bulk['messages'],$array);
    }

    $json = json_encode($contatos_send_bulk);

    return $json;

  }

}
