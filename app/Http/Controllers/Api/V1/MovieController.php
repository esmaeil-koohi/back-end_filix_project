<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\MovieItem;

class MovieController extends Controller
{
    public function createNew(Request $request)
    {

        if(auth()->user()->is_admin){

            $movie = Movie::create([
                'name' => $request->name,
                'description' => $request->description,
                'short_description' => $request->description,
                'genre_id' => $request->genre_id,
                'country_id' => $request->country_id,
                'imdb' => 10,
                'privilege' => 0,
                'icon' => "icon",
                'is_serial' => 0,
                'season' => 1,
                'banner' => "banner",
            ]);


           MovieItem::create([
                'movie_id' => $movie->id,
                'name'=> $request->name,
                'description' => $request->description,
                'payment_type' => 0,
                'url'  => $request->url,
                'triler' => "triler",
                'banner'=> "banner",
            ]);


            return "با موفقیت ایجاد شد.";
        }else{

            return response()->json(['message' => "شما باید مدیر باشید."]);
        }

    }

    public function createMovieItems(Request $request)
    {
        MovieItem::create([
            'movie_id' => $request->movie_id,
            'name'=> $request->name,
            'description' => $request->description,
            'payment_type' => 0,
            'url'  => $request->url,
            'triler' => "triler",
            'banner'=> "banner",
        ]);
    }

    public function homeList()
    {
        return Genre::with(['movies' => function($query){
             $query->groupLimit(10,'genre_id');
        }])->whereHas('movies')->get();
    }

    public function getByGenre($genre_id)
    {
        $mvoies = Movie::where('genre_id',$genre_id)->paginate(1);
        return response()->json($mvoies);
    }

    public function getByCountry($country_id)
    {
        $mvoies = Movie::where('country_id',$country_id)->paginate(1);
        return response()->json($mvoies);
    }

    public function movieDetails($movie_id)
    {
        $movie = Movie::with('movieItems')->where('id',$movie_id)->first();
        return response()->json($movie);
    }

    public function moviegetSe($item_id)
    {
        $movie = MovieItem::with('comments.user')->with('movie')->where('id',$item_id)->first();
        return response()->json($movie);
    }


}
