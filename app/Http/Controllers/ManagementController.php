<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\AccountInfoLog;
use App\PromotionConfiguration;
use App\ConfigKhuyenMaiValue;

class ManagementController extends Controller
{
    const MOMO = "momo";
    const ZING = "zing";
    const BANK = "bank";
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct() {
        $this->middleware('auth');
    }

    public function listUser() {        
        $accountName = request('accountName');
        if (request('accountName')) {
            $users = User::whereRaw("name like ?", ["%".request('accountName')."%"])->get();
        } else {
            $users = [];
        }
        return view('admin.list_user', compact(['users', 'accountName']));
    }

    public function userDetail($name) {
        $user = User::where('name', $name)->firstOrFail();
        return view('admin.user.show', compact('user'));
    }

    public function userEdit($name) {
        $user = User::where('name', $name)->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    public function userUpdate(User $user) {
        $this->validate(request(), [
            // 'email' => 'nullable|max:255|email|unique:account_info,email,'.$user->id,
            'email' => 'nullable|max:255|unique:user,name,'.$user->id,
            'full_name' => ['nullable', 'max:255', 'string'],
            'email' => 'nullable|max:255|email',
            'phone' => ['nullable', 'numeric', 'min:11'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $admin = auth()->user();
        
        if (request('full_name')) {
            $user->full_name = request('full_name');
        }

        if (request('email')) {
            $user->email = request('email');
        }

        if (request('phone')) {
            $user->phone = request('phone');
        }

        if (request('password')) {
            $user->password = request('password');            
        }

        try {
            $user->save();

            $accInfoLog = new AccountInfoLog();
            $accInfoLog->adminAccount = $admin->name;
            $accInfoLog->userAccount = $user->name;
            $accInfoLog->dateUpdate = Carbon::Now();
            $accInfoLog->save();

            return redirect()->back()->with('alert', 'success');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'failed');
        }        
    }

    public function chkmList() {
        $chkms = PromotionConfiguration::all();
        return view('admin.chkm.list', compact('chkms'));
    }

    public function chkmEdit($id) {
        $chkm = PromotionConfiguration::where('id', $id)->first();
        $configKhuyenMaiValues = ConfigKhuyenMaiValue::all();

        return view('admin.chkm.edit', compact(['chkm', 'configKhuyenMaiValues']));
    }

    public function chkmUpdate(PromotionConfiguration $chkm) {
        $this->validate(request(), [
            'ngay_bat_dau' => ['required', 'date'],
            'ngay_ket_thuc' => ['required', 'date'],
            'khuyenmai' => ['required']
        ]);
        try {
            $chkm->ngay_bat_dau = request('ngay_bat_dau');
            $chkm->ngay_ket_thuc = request('ngay_ket_thuc');
            $chkm->khuyenmai = request('khuyenmai');
            $chkm->save();

            return redirect()->back()->with('alert', 'success');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'failed');
        }

    }
}