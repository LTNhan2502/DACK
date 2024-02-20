<?php
    namespace App\Http\Controllers\Api;

    
    use App\Models\Banner;
    use App\Models\Product; 
    use Illuminate\Http\Request; 

    class HomeController extends Controller 
    {
        public function index(){
            
            $topBanner=Banner::getBanner()->first();
            $gallerys=Banner::getBanner('gallery')->get();
            $news_products=Product::orderBy('created_at','DESC')->limit(2)->get();
            return view('home.index', compact('topBanner', 'gallerys', 'news_products'));

        }
        public function about (){
            return view ('home.about');
        }
    }

 ?>