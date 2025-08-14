<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use App\Models\SubscriptionMail;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Banner;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(Request $request)
    {
        $categories = Category::where('status',1)->get();
        $featuredProducts = Product::where('is_feature',1)
            ->inRandomOrder()
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $latestEvents = Event::with('eventImage')
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->take(3)
        ->get();
        return view('front.index',compact('categories','featuredProducts','latestEvents'));
    }
    
    // public function index(Request $request)
    // {
    //     // $category = Category::latest('id')->get();
    //     // $collections = Collection::latest('id')->get();
    //     $products = Product::where('is_trending', 1)->latest('view_count', 'id')->where('status', 1)->limit(14)->get();
    //     $hot_deals = Product::where('status', 1)->orderBy('position', 'ASC')->get();

    //     foreach ($hot_deals as $product) {
    //         $availableColors[$product->id] = $this->productRepository->getAvailableColorByProductId($product->id);
    //     }
    //     $demo_product = Product::where('is_feature', 1)->take(5)->get();
    //     $mobile_product = Product::where('cat_id', 17)->get();

    //     // dd($mobile_product);
    //     $deal_of_the_day_products = Product::where('is_deal_of_the_day', 1)->latest('view_count', 'id')->where('status', 1)->limit(14)->get();
    //     // dd($demo_product[2]);  
    //     // $products = Product::latest('view_count', 'id')->limit(16)->get();
    //     $galleries = Gallery::latest('id')->get();
    //     $banner = Banner::where('status', 1)->latest('id')->first();
    //     return view('front.welcome', compact('products', 'galleries', 'banner', 'hot_deals', 'demo_product', 'deal_of_the_day_products', 'mobile_product', 'availableColors'));
    // }

    public function mailSubscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            $mailExists = SubscriptionMail::where('email', $request->email)->first();
            if (empty($mailExists)) {
                $mail = new SubscriptionMail();
                $mail->email = $request->email;
                $mail->save();

                return response()->json(['resp' => 200, 'message' => 'Mail subscribed successfully']);
            } else {
                $mailExists->count += 1;
                $mailExists->save();

                return response()->json(['resp' => 200, 'message' => 'Thank you for showing your interest']);
            }
        } else {
            return response()->json(['resp' => 400, 'message' => $validator->errors()->first()]);
        }
    }


    public function declare(Request $request)
    {
        return view('front.declaration');
    }


    public function one(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function two(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function three(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function four(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function five(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function six(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function seven(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function eight(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function nine(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function ten(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function eleven(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twelve(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function thirteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function fourteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }


    public function fifteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function sixteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function seventeen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
    public function eightteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function nineteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twenty(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twentyone(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }


    public function twentytwo(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twentythree(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twentyfour(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }

    public function twentyfive(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
    public function privacy(Request $request)
    {
        return view('front.privacyPolicy');
    }
    public function TremsAndConditions(Request $request)
    {
        return view('front.terms_conditions');
    }
    public function CustomerCare(Request $request)
    {
        return view('front.customer_care');
    }
}
