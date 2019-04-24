<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Categoty;
use App\Models\Customer;
use App\Models\News;
use App\Models\Product;
use App\Models\Slide;
use Session;
use Validator;
use Hash;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('status', 1)->paginate(8);
    	$sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
    	return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
    	$sp_theoloai = Product::where('id_type', $type)->get();
    	$sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
    	$loai = Categoty::all();
    	$loap_sp = Categoty::where('id', $type)->get();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loap_sp'));
    }

    public function getChitiet(Request $req){
    	$sanpham = Product::where('id', $req->id)->first();
    	$sp_tuongtu = Product::where('id_type', $req->id_type)->paginate(3);
    	return view('page.chitiet_sanpham', compact('sanpham', 'sp_tuongtu'));
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart); 
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $cus = new Customer;
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;
        $cus->address = $req->address;
        $cus->phone_number = $req->phone;
        $cus->note = $req->notes;
        $cus->save();

        $bill = new Bill();
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note  = $req->notes;
        $bill->save();

        foreach( $cart->items as $key => $value){
            $bd = new BillDetail;
            $bd->id_bill = $bill->id;
            $bd->id_product = $key;
            $bd->quantity = $value['qty'];
            $bd->unit_price = ($value['price']/$value['qty']);
            $bd->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');

    }

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
            'fullname' => 'required',
            //'re-password' => 'required|same:password'
        ],[
            'email.required' => 'khong duoc de trong',
            'email.email' => 'khong dung dinh dang',
            'password.required' => 'khong duoc de trong',
            'password.min' => 'mat khau tu 5 den 20 ky tu',
            'password.max' => 'mat khau tu 5 den 20 ky tu',
            'fullname.required' => 'khong duoc de trong',
            //'re_password.required' => 'khong duoc de trong',
            //'re_password.same' => 'mat khau nhap lai khong dung'
        ]);

        $user = new User();
        $user->name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with(['thanh cong', 'dang ky thanh cong']);

    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:5|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where('email', '=', $req->email)->first();

        if($user){
            if(Auth::attempt($credentials)){
                return redirect()->route('trang-chu');
            //return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']); 
        }
    }

    public function postLogout(){
    	Auth::logout();
    	return redirect()->route('trang-chu');
    }

}
