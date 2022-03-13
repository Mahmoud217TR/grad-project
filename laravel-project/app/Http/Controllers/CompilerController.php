<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Illuminate\Http\Request;

class CompilerController extends Controller
{
    private function getClientId(){
        return env('JDOODLE_CLIENT_ID');
    }

    private function getClientSecret(){
        return env('JDOODLE_CLIENT_SECRET');
    }

    private function sendRequest($method,$uri,$headers,$body){
        $client = new Client(['verify' => false]);
        $request = new GuzzleRequest($method,$uri,$headers,$body);
        return $client->send($request);
    }

    public function compile($script, $language, $index){

        $method = 'POST';
        $uri = 'https://api.jdoodle.com/execute';
        $body = json_encode([
            'script' => $script,
            'language' => $language,
            'versionIndex' => $index,
            'clientId' => $this->getClientId(),
            'clientSecret' => $this->getClientSecret()
        ]);
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $response = $this->sendRequest($method,$uri,$headers,$body);
        
        return $response->getBody();
    }

    public function getResult(){
        $data = request()->validate([
            'script' => "required|string",
            'language' => "required|string",
            'index' => "required"
        ]);

        return $this->compile($data['script'],$data['language'],$data['index']);
    }
}
