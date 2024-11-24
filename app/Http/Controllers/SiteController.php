<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Advertise;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\AdminNotification;
use App\Models\SupportAttachment;
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function index(){
        $count = Page::where('tempname',$this->activeTemplate)->where('slug','home')->count();
      
        if($count == 0){
            $page = new Page();
            $page->tempname = $this->activeTemplate;
            $page->name = 'HOME';
            $page->slug = 'home';
            $page->save();
        }

        $reference = @$_GET['reference'];
        if ($reference) {
            session()->put('reference', $reference);
        }
        
        $pageTitle = 'Home';
        
        $sections = Page::where('tempname',$this->activeTemplate)->where('slug','home')->first();
        return view($this->activeTemplate . 'home', compact('pageTitle','sections'));
    }

    public function consultation()
    {
         $count = Page::where('tempname',$this->activeTemplate)->where('slug','consultation')->count();
      
        if($count == 0){
            $page = new Page();
            $page->tempname = $this->activeTemplate;
            $page->name = 'CONSULTATION';
            $page->slug = 'consultation';
            $page->save();
        }
       
            
       $reference = @$_GET['reference'];
        if ($reference) {
            session()->put('reference', $reference);
        }
       
        $pageTitle = 'Consultation';

        $sections = Page::where('tempname', $this->activeTemplate)->where('slug', 'home')->first();
        return view($this->activeTemplate . 'consultation', compact('pageTitle', 'sections'));
    }

    public function foundation()
    {
        $pageTitle = 'Foundation';
        return view($this->activeTemplate . 'foundation', compact('pageTitle'));
    }
    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $pageTitle = $page->name;
        $sections = $page->secs;
        return view($this->activeTemplate . 'pages', compact('pageTitle','sections'));
    }


    public function contact()
    {
        $pageTitle = "Contact Us";
        return view($this->activeTemplate . 'contact',compact('pageTitle'));
    }


    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);


        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = 2;

        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->id() ?? 0;
        $adminNotification->title = 'A new support ticket has opened ';
        $adminNotification->click_url = urlPath('admin.ticket.view',$ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();
        
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function blog()
    {
        $pageTitle  = "Blogs";
        $blogs = Frontend::where('data_keys','blog.element')->latest()->paginate(9);
        return view($this->activeTemplate.'blog',compact('pageTitle','blogs'));
    }
    public function blogDetails($id,$slug){
        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
        $pageTitle = $blog->data_values->title;
        $recentblog = Frontend::latest()->where('data_keys','blog.element')->take(10)->get();
        return view($this->activeTemplate.'blog_details',compact('blog','pageTitle','recentblog'));
    }

    public function faq()
    { 
         $pageTitle  = "Frequently Asked Questions";
         $elements = Frontend::where('data_keys','faq.element')->latest()->get();
         $heading = Frontend::where('data_keys','faq.content')->first();
         return view($this->activeTemplate.'faq',compact('pageTitle','elements','heading'));
    }

    public function policyAndTerms($slug,$id)
    {
        $policy = Frontend::findOrFail($id);
        $pageTitle = $policy->data_values->title;
        return view($this->activeTemplate.'policy_terms',compact('policy','pageTitle'));
    }

    public function placeholderImage($size = null){
        $imgWidth = explode('x',$size)[0];
        $imgHeight = explode('x',$size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function categoryCourses($slug)
    {
        $subcategory = SubCategory::where('slug',$slug)->firstOrFail();
        $pageTitle = "Courses of $subcategory->name";
        $courses = Course::active()->where('subcategory_id',$subcategory->id)->paginate(getPaginate());
        return view($this->activeTemplate.'category_courses',compact('pageTitle','courses'));
    }
    public function courses()
    {
        $pageTitle = "All Course";
        $courses = Course::filters()->paginate(getPaginate());
        $levels = Level::get();
        $categories = Category::where('status',1)->get();

        return view($this->activeTemplate.'courses',compact('pageTitle','courses','levels','categories'));
    }

    public function courseDetails($id,$slug)
    {
        $pageTitle = "Course Details";
        $course = Course::eagerLoads()->findOrFail($id);
        return view($this->activeTemplate.'course_details',compact('pageTitle','course'));
    }

    public function adClick(Request $request)
    {
        $advert = Advertise::findOrFail($request->ad_id);
        $advert->total_click += 1;
        $advert->save();
    }


}
