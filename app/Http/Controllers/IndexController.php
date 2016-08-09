<?php
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use DB,Mail,Cart,Request;

class IndexController extends Controller {

    public function index() {
        $product_FE = DB::table('products')->select('name', 'image', 'alias', 'price', 'id')->orderBy('id', 'desc')->skip(0)->take(4)->get();
        $product_LS = DB::table('products')->select('name', 'image', 'alias', 'price', 'id')->orderBy('id', 'desc')->skip(4)->take(4)->get();
        return view('user.page.index', compact('product_FE', 'product_LS'));
    }

    public function productCate($id) {
        if ($id) {
            $product = DB::table('products')->select('name', 'image', 'alias', 'price', 'id', 'cate_id')->where('cate_id', $id)->orderBy('id', 'desc')->paginate(2);
            $cate = DB::table('cates')->select('parent_id')->where('id', $id)->first();
            if ($cate) {
                $menuCate = DB::table('cates')->select('name', 'alias', 'id', 'parent_id')->where('parent_id', $cate->parent_id)->get();
                //var_dump($cate);exit;
            } else {
                $menuCate = null;
            }
        }
        $lastedProduct = DB::table('products')
                        ->join('cates', 'cates.id', '=', 'products.cate_id')
                        ->select('products.*', 'cates.name as cateName')
                        ->orderBy('products.id', 'desc')->skip(0)->take(3)->get();
        return view('user.page.category', compact('product', 'menuCate', 'lastedProduct'));
    }

    public function productDetail($id) {
        if ($id) {
            $product = DB::table('products')->where('id', $id)->first();
            $image = DB::table('product_images')->select('id', 'image')->where('product_id', $id)->orderBy('id', 'desc')->skip(0)->take(3)->get();
            $productRelated = DB::table('products')
                            ->select('name', 'image', 'alias', 'price', 'id', 'cate_id')
                            ->where('cate_id', $product->cate_id)->where('id', '<>', $id)
                            ->orderBy('id', 'desc')->skip(0)->take(4)->get();
        }

        return view('user.page.product', compact('product', 'image', 'productRelated'));
    }

    public function getContact() {

        return view('user.page.contact');
    }

    public function postContact() {
        $data = ['hoten' => 'hai'];
        $mail = Mail::send('emails.mail', $data, function ($message) {

                    $message->from('tdduytan@gmail.com', 'tan tan');

                    $message->to('tdduytan@gmail.com', 'John Doe');
                    $message->subject('mail mail');

                    //var_dump($message);exit;
                });
    }

    public function order($id) {
        $product = DB::table('products')->where('id', $id)->first();
        Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => array('image' => $product->image)));
        return redirect()->route('listCart');
        
        //gọi ajax và popup modal
        /*if(Request::ajax()) {
        $id = (int)Request::get('id');
        $qty = (int)Request::get('qty');
        $product = DB::table('products')->where('id', $id)->first();
        Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'options' => array('image' => $product->image)));
        return 'ok';
        }*/
    }

    public function listCart() {
        $content = Cart::content();
        $total = Cart::total();
        return view ('user.page.shopping-cart',compact('content','total'));
    }

    public function delProduct($id) {
        Cart::remove($id);
        return redirect()->route('listCart');
    }

    public function updateCart($id,$qty) {
        if(Request::ajax()) {
             $id = Request::get('id');
             $qty = (int)Request::get('qty');
             $token = Request::get('_token');
             if ($id && $qty) {
                Cart::update($id,$qty);
                return 'ok';   
             }
             
        }
    }


}
