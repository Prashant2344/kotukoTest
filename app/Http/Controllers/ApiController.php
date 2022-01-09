<?php

namespace App\Http\Controllers;

use App\Models\Section;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Traits\SlugCheckTrait;

class ApiController extends Controller
{
    use SlugCheckTrait;

    public function __construct(Section $sections)
    {
        $this->sections = $sections->get();
    }

    public function index(){
        $data = [
            'sections' => $this->sections
        ];
        return view('index',$data);
    }

    public function getData($slug)
    {
        try {
            $section = Section::where('slug',$slug)->first();

            //checking if incoming slug is valid or not
            if(!$this->checkSlugValidation($slug) || !isset($section)){
                return response()->json(array(
                    'error'     =>  'Invalid Request',
                    'code'      =>  400,
                    'message'   =>  'Bad Request'
                ), 400);        
            }

            //caching the data for 10 min
            $apiData = cache()->remember("$slug", 600, function () use ($slug){
                $client = new Client();

                $url = env('API_URL');
                //making api call using client
                $response =  $client->get($url, [
                    'headers' => [
                        'api-key' => env('API_KEY'),
                        'Accepts' => 'application/json',
                    ],
                    'query' => ['q' => $slug]
                ]);

                return json_decode($response->getBody()->getContents());
            });

            $data = [
                'sections' => $this->sections,
                'slug'     => $slug, 
                'apiData'  => collect($apiData->response->results)
            ];

            return view('result', $data);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
