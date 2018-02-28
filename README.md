# tripsorter

Api can sort different boarding cards (bus, train, flight ...)
you can add new transport type by implementing BoardingCardInterface and adding that class in configuration file like :
`'transport' => [
             'bus' => 'BubBoardingCard',
             'train' => 'TrainBoardingCord',
             'flight' => 'FlightBordingCard',
         ]`
         
- to start the api you must define `version` and `base_url` like : 
__`'version' => 'v1',
           'app' => [
               'url' => 'loacalhost',
               'base_url' => 'tripsorter/api',
           ],`__
           
- to use api you can refer the example in public/callApi.php

- data format to post :
`$data[] = [
     'from' => 'Gerona Airport',
     'to' => 'Stockholm',
     'transport' => 'flight',
     'code' => 'SK455',
     'name' => '',
     'gate' => '45B',
     'seat' => '3A',
     'baggage' => 'drop at ticket counter 344'
 ];
 $bcs['BoardingCards'] = json_encode($data);
 $bcs['departure'] = json_encode('Madrid');
 `
 
 - documentation uri : {base_url}/public/_docs