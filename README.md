# movile-messaging-php 📲

### Não oficial PHP helper para [Movile's SMS Messaging API](http://doc-messaging.movile.com/sms-v1.html).

** Leia atentamente a documentação oficial do Movile Messaging (link acima) antes de usar este módulo. * NÃO * tentará validar ou higienizar seus parâmetros antes de enviar solicitações, portanto, certifique-se de enviar o que eles esperam receber. **

Você precisará do seu próprio `UserName` e` AuthenticationToken` para fazer chamadas de API.

Note que a maioria dos parâmetros opcionais estão faltando neste módulo, estou trabalhando nisso. feedback são bem-vindos também 😉

## Exemplo de uso:

## Metodos:
### send_sms(destino, mensagemTexto)
Envie uma mensagem SMS para um único endpoint.
* `destination`: número de telefone com o código do país e o código de área. Exemplo: '' 5519998765432'`
* `messageText`: A string de mensagem a ser enviada. Se for muito longo, será dividido em várias mensagens.
```php

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
* Instaciando a classe para utililização da classe de disparos.
* Passando username e o token de acesso a api movile.com
*/
$sms = new SMS('username','token');
// Diparando sms unico.
$sms->send_sms($contact['name'],$contact['phone'],$contact['message']);

Esperado resposta body:
```json
{
  "id":"9cb87d36-79af-11e5-89f3-1b0591cdf807"
}
``````

### sendBulk(contatos, messageText,mensagemDefault)
Envie a mesma mensagem SMS para muitos endpoints de uma só vez.
* `numbers`: Matriz de números de telefone, assim como` destination` no método `send`.
* `messageText`: A string de mensagem a ser enviada. Se for muito longo, será dividido em várias mensagens.

Exemplo:
```php

/*
* Instaciando a classe para utililização da classe de disparos.
* Passando username e o token de acesso a api movile.com
*/
$sms = new SMS('username','token');

// Diparando sms em massa.
$sms->send_bulk_sms(([[name => 'Fulano', 'phone' => '5519988887777'],[name => 'Siglano', 'phone' => '5519988887777']], 'Sua mensagem aqui')

```

Esperado resposta body:
```json
{
  "id":"317b925a-79b0-11e5-82d3-9fb06ba220b3",
  "messages":[
    {
      "id":"715773da-79b0-11e5-afc8-dfdd0dedf87a"
    },
    {
      "id":"717fb4bc-79b0-11e5-819e-57198aac792e"
    }
  ]
}
```


### search(id)
Verifique o status de entrega de uma única mensagem ou de uma lista.
* `id`: ID de uma mensagem, obtida quando é enviada.

Example:
```php

/*
* Informações de exemplo mais seria carregadas atraves de tabela de contatos
* Com contato especifico.
*/
$contacts_search = [
 $obj = (object) [
    'id' => "DF5BE495-C5A4-11E8-9E1E-000C293AFF23",
  ],
 $obj = (object) [
    'id' => "665C2371-C59A-11E8-BB1E-000C2946C556",
  ],
];


/*
* Instaciando a classe para utililização da classe de disparos.
* Passando username e o token de acesso a api movile.com
*/
$sms = new SMS('username','token');


// buscar e listar todos os disparos sms ou somente um passando dentro de um array.
 $sms->search($contacts_search);

 $sms->search($contacts_search);
```
Esperado resposta body:
```json
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}
```
ou  Esperado resposta body:
```json
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}
{
  "id":"8f5af680-973e-11e4-ad43-4ee58e9a13a6",
  "carrierId":5,
  "carrierName":"TIM",
  "destination":"5519900001111",
  "sentStatusCode":2,
  "sentStatus":"SENT_SUCCESS",
  "sentStatusAt":1420732929252,
  "sentStatusDate":"2015-01-08T16:02:09Z",
  "deliveredStatusCode":4,
  "deliveredStatus":"DELIVERED_SUCCESS",
  "deliveredAt":1420732954000,
  "deliveredDate":"2015-01-08T16:02:34Z",
  "campaignId":1234
}

```

### listReceived()
Recuperar mensagens enviadas para o seu LA (ou seja, um cliente respondeu ao seu SMS).

Example:
```php

/*
* Instaciando a classe para utililização da classe de disparos.
* Passando username e o token de acesso a api movile.com
*/
$sms = new SMS('username','token');

// buscar e listarReceived todos os disparos sms.
   $sms->listReceived();
```

Esperado resposta body:
```json
{
  "total": 1,
  "start": "2016-09-04T11:12:41Z",
  "end": "2016-09-08T11:17:39.113Z",
  "messages": [
    {
      "id": "25950050-7362-11e6-be62-001b7843e7d4",
      "subAccount": "iFoodMarketing",
      "campaignAlias": "iFoodPromo",
      "carrierId": 1,
      "carrierName": "VIVO",
      "source": "5516981562820",
      "shortCode": "28128",
      "messageText": "Eu quero pizza",
      "receivedAt": 1473088405588,
      "receivedDate": "2016-09-05T12:13:25Z",
      "mt": {
        "id": "8be584fd-2554-439b-9ba9-aab507278992",
        "correlationId": "1876",
        "username": "iFoodCS",
        "email": "customer.support@ifood.com"
      }
    },
    {
      "id": "d3afc42a-1fd9-49ff-8b8b-34299c070ef3",
      "subAccount": "iFoodMarketing",
      "campaignAlias": "iFoodPromo",
      "carrierId": 5,
      "carrierName": "TIM",
      "source": "5519987565020",
      "shortCode": "28128",
      "messageText": "Meu hamburguer está chegando?",
      "receivedAt": 1473088405588,
      "receivedDate": "2016-09-05T12:13:25Z",
      "mt": {
        "id": "302db832-3527-4e3c-b57b-6a481644d88b",
        "correlationId": "1893",
        "username": "iFoodCS",
        "email": "customer.support@ifood.com"
      }
    }
  ]
}
```

### searchReceived(array)
Procure por mensagens recebidas em um intervalo de tempo (entre `start` e` end`, como seria de se esperar, `subaccount` subcontas de acesso a api).
* `start`: string formatada em ISO8601. O padrão é 5 dias atrás a partir da data atual.
* `end`: string com formatação ISO8601. Padrões para a data atual.
* `subaccount`: subconta de acessoa api.

Example:
```php

// buscar e searchReceived todos os disparos sms, construir um array conforme a necessidade.

// $array = [
//   'start' => '2016-09-12T00:00:00',
//   'end' => '2016-09-12T00:00:00',
//   'subaccont' => '2016-09-12T00:00:00',
// ];
//
$sms->searchReceived($array);


```

body resposta esperado: * mesmo formato que listReceived () *


* Note que os números de telefone das operadoras `OI` e` Sercomtel` não retornarão o status `DELIVERED_SUCCESS`, mesmo que o SMS tenha sido recebido com sucesso.
* Os dados só são retidos no final do Movile por alguns dias, então você pode querer armazenar esses dados em outro lugar.

Agradecimentos especiais por [@alephjunio](https://github.com/alephjunio/)
