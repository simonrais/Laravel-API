<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class NewsController extends Controller
// REST-API
{
    public function getData(){
        $client= new Client();
        $request =$client->get ('https://newsapi.org/v2/top-headlines?country=us&apiKey=af4476a3ad99403387dc32066b05857e');
        $response = $request->getBody();
        $result = json_decode($response);
        return view('home',['artikel'=>$result->articles]);
        }
        // Search Data
        public function searchData(Request $request){
            $client = new Client();
            $query = $request->keyword;
            $req = $client->get('https://newsapi.org/v2/topheadlines?country=id&apiKey=YOURAPIKEY&q='.$query);
            $response = $req->getBody();
            $result = json_decode($response);
            return view('home',['artikel'=>$result->articles]);
            }
    }

