<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\admin;
use App\shuttle;
use App\bus;
use App\Route;
use App\order;

class adminController extends Controller
{
    public function login () {
        return view('admin.login');
    }

    public function loginProses (Request $request) {
        $email = $request->email;
        $password = $request->password;

        $admin = admin::where('admin_email', $email)->where('admin_password', $password)->first();

        if (isset($admin)) {
            session()->put('admin_name', $admin->admin_full_name);
            session()->put('admin_id', $admin->admin_id);      
            return redirect()->route('index-admin');
        } else {
            return redirect()->route('login-admin')->with('login-status', 'failed');
        }
    }

    public function register () {
        return view('admin.register');
    }

    public function registerProses (Request $request) {
        if ($request->password1 == $request->password2) {
            $admin = new admin();
            $admin->admin_full_name = $request->admin_name;
            $admin->admin_email = $request->admin_email;
            $admin->admin_password = $request->password1;
            $admin->save();

            return redirect()->route('login-admin')->with('register-status', 'success');
        } else {
            return redirect()->route('login-admin')->with('register-status', 'failed');
        }
    }

    public function index () {
        return $this->shuttle();
    }

    public function shuttle () {
        $data = shuttle::all();
        $route = route::all();

        return view('admin.shuttle', ['data' => $data, 'route' => $route]);
    }

    public function shuttleInsert (Request $request) {

        $data = new shuttle();
        $data->shuttle_name = $request->shuttle_name;
        $data->shuttle_type = $request->shuttle_type;
        $data->shuttle_time_departure = $request->shuttle_time;
        $data->shuttle_date_departure = $request->shuttle_date;
        $data->shuttle_price = $request->shuttle_price;
        $data->shuttle_total_seat = $request->shuttle_seat;
        $data->route_id = $request->shuttle_route;
        $success = $data->save();

        if ($success) {
            return redirect()->route('shuttle-admin')->with('status', 'success');
        } else {
            return redirect()->route('shuttle-admin')->with('status', 'failed');
        }
    }

    public function shuttleUpdate (Request $request) {

        $data = shuttle::where('shuttle_id',$request->shuttle_id)->first();
        $data->shuttle_name = $request->shuttle_name;
        $data->shuttle_type = $request->shuttle_type;
        $data->shuttle_time_departure = $request->shuttle_time;
        $data->shuttle_date_departure = $request->shuttle_date;
        $data->shuttle_price = $request->shuttle_price;
        $data->shuttle_total_seat = $request->shuttle_seat;
        $data->route_id = $request->shuttle_route;
        $success = $data->save();

        if ($success) {
            return redirect()->route('shuttle-admin')->with('status', 'success');
        } else {
            return redirect()->route('shuttle-admin')->with('status', 'failed');
        }
    }

    function shuttleDelete ($id) {
        shuttle::destroy($id);

        return redirect()->route('shuttle-admin')->with('status', 'success');
    }

    public function bus () {
        $data = bus::all();
        $route = route::all();

        return view('admin.bus', ['data' => $data, 'route' => $route]);
    }

    public function busInsert (Request $request) {

        $data = new bus();
        $data->bus_name = $request->bus_name;
        $data->bus_type = $request->bus_type;
        $data->bus_time_departure = $request->bus_time;
        $data->bus_date_departure = $request->bus_date;
        $data->bus_price = $request->bus_price;
        $data->bus_total_seat = $request->bus_seat;
        $data->route_id = $request->bus_route;
        $success = $data->save();

        if ($success) {
            return redirect()->route('bus-admin')->with('status', 'success');
        } else {
            return redirect()->route('bus-admin')->with('status', 'failed');
        }
    }

    public function busUpdate (Request $request) {

        $data = bus::where('bus_id',$request->bus_id)->first();
        $data->bus_name = $request->bus_name;
        $data->bus_type = $request->bus_type;
        $data->bus_time_departure = $request->bus_time;
        $data->bus_date_departure = $request->bus_date;
        $data->bus_price = $request->bus_price;
        $data->bus_total_seat = $request->bus_seat;
        $data->route_id = $request->bus_route;
        $success = $data->save();

        if ($success) {
            return redirect()->route('bus-admin')->with('status', 'success');
        } else {
            return redirect()->route('bus-admin')->with('status', 'failed');
        }
    }

    function busDelete ($id) {
        bus::destroy($id);

        return redirect()->route('bus-admin')->with('status', 'success');
    }

    function order () {
        $data = order::orderBy('order_id', 'DESC')->get();

        return view('admin.order', ['data' => $data]);
    }

    function setConfrim (Request $request) {
        $data = order::where('order_id', $request->order_id)->first();
        $data->payment_status = 1;
        $data->save();

        return redirect()->route('order-admin')->with('status', 'success');
    }

}
