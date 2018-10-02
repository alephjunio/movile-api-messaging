<?php

// Carregamento da classe
spl_autoload_register(function($class){
  if (file_exists("Classes/$class.php")) {
    require "Classes/$class.php";
  }
});


/*
* Informações de exemplo mais seria carregadas atraves de tabela de contatos
*/
$contacts = [
  $obj = (object) [
    'name'    => "Fulano de Tal",
    'phone'   => '5511998989898',
  ],
];


/*
* Informações de exemplo mais seria carregadas atraves de tabela de contatos
* Com contato especifico.
*/
$contact = [
  'name'    => "Fulano de Tal",
  'phone'   => '5511998989898',
  'message' => 'Olá Tudo bem ?'
];



/*
* Informações de exemplo mais seria carregadas atraves de tabela de contatos
* Com contato especifico.
*/
$contacts_search = [
 $obj = (object) [
    'id' => "DF5BE495-C5A4-11E8-9E1E-000C293AFF23",
  ],
 $obj = (object) [
    'id' => "665C2371-C59A-11E8-BB1E-000C294623C6",
  ],
];

/*
* Instanciando a classe para utililização da classe de disparos.
* Passando username e o token de acesso a api movile.com
*/
// $sms = new SMS('username','token');
// // Diparando sms unico.
// echo $sms->sendSms($contact['name'],$contact['phone'],$contact['message']);
//
// // Disparando sms em massa.
// echo $sms->sendBulkSms($contacts,'mensagem','mesagem default');
//
// // listar status de todos os disparos sms.
// echo $sms->Statuslist();
//
// // buscar e listar todos os disparos sms.
// echo $sms->search($contacts_search);
//
// // buscar e listarReceived todos os disparos sms.
// echo $sms->listReceived();
//
// // buscar e searchReceived todos os disparos sms.
// $array = [
//   'start' => '2016-09-12T00:00:00',
//   'end' => '2016-09-12T00:00:00',
//   'subaccont' => '2016-09-12T00:00:00',
// ];
//
// echo $sms->searchReceived($array);
