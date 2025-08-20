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
use App\Models\BannerTitle;
use App\Models\Event;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        $banner = BannerTitle::latest()->first();

        //about us
        $about = Settings::where('page_heading', 'About Our Guru Dham')->first();

        $short_description = null;
        $page_heading = null;

        if ($about) {
            $page_heading = $about->page_heading;
            $short_description = Str::words($about->content, 50, '...');
        }


        //babamoni
        $babamoni = Settings::where('page_heading', 'LIKE', '%Sri Srimat Swami Swarupananda Paramhansa Dev%')->first();
        $babamoni_heading = $babamoni?->page_heading;
        $babamoni_short_description = $babamoni ? Str::words($babamoni->content, 50, '...') : null;
        
        return view('front.index',compact('categories','featuredProducts','latestEvents','banner','page_heading',
        'short_description','babamoni_heading','babamoni_short_description'));
    }

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
