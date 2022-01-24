<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;
use App\shuttle;
use App\bus;
use App\route;
use App\order;

class userController extends Controller
{
    public function index () { 
        return view("login"); 
    }

    public function login (Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = users::where('user_email', $email)->where('user_password', $password)->first();
        if (isset($user)) {
            session()->put('user', $user->user_full_name);
            session()->put('user_id', $user->user_id);      
            return $this->shuttle();
        } else {
            return view("login", ['message' => 'Fail']);
        }
    }

    public function register () {
        return view('register');
    }

    public function registerProses (Request $request) {
        if ($request->password1 == $request->password2) {
            $user = new users();
            $user->user_full_name = $request->user_name;
            $user->user_email = $request->user_email;
            $user->user_password = $request->password1;
            $user->save();

            return redirect()->route('login')->with('status', 'success');
        } else {
            return redirect()->route('login')->with('status', 'failed');
        }
    }

    public function logout () {
        session()->forget('user');
        session()->forget('user_id');

        return redirect('/');
    }
    
    public function profile () {
        $user = users::where('user_id', session()->get('user_id'))->first();

        return view('profile', ['user' => $user]);
    }

    public function profileUpdate (Request $request) {
        $user_id = $request->user_id;
        $user_name = $request->user_name;
        $user_date = $request->user_date;
        $user_address = $request->user_address;
        $user_phone = $request->user_phone;
        $user_email = $request->user_email;

        $updateUser = users::where('user_id', $user_id)->first();
        $updateUser->user_full_name = $user_name;
        $updateUser->user_born_date = $user_date;
        $updateUser->user_address = $user_address;
        $updateUser->user_phone = $user_phone;
        $updateUser->user_email = $user_email;
        $succesUpdate = $updateUser->save();

        if ($succesUpdate) {
            session()->put('user', $updateUser->user_full_name);
            return redirect()->route('profile')->with('status', 'success');
        } else {
            return redirect()->route('profile')->with('status', 'failed');
        }

    }

    public function shuttle () {
        $shuttle = shuttle::get();
        $user = users::where('user_id', session()->get('user_id'))->first();

        return view("shuttle", ['message' => 'Success', 'shuttle' => $shuttle]);
    }

    public function bus () {
        $shuttle = shuttle::get();

        return view("bus", ['message' => 'Success', 'shuttle' => $shuttle]);
    }

    public function schedule (Request $request) {
        $from = $request->from;
        $to = $request->to;
        $date = $request->date;

        $type = $request->type;

        switch($type) {
            case 'shuttle':
                $schedule = route::where('route_from', $from)->where('route_to', $to)->whereHas('shuttle' ,function($q) use ($date) {
                    $q->where('shuttle_date_departure', $date);
                })->first();
                break;
            case 'bus' :
                $schedule = route::where('route_from', $from)->where('route_to', $to)->whereHas('bus' ,function($q) use ($date) {
                    $q->where('bus_date_departure', $date);
                })->first();
                break;
            default :
            $schedule = [];
        }

        return view('schedule', ['schedule' => $schedule, 'type' => $type, 'date' => $date]);
    }

    public function order (Request $request) {
        $user_id = $request->user_id;
        $bus_id = $request->bus_id;
        $shuttle_id = $request->shuttle_id;
        
        $user = users::where('user_id',$user_id)->first();

        if($request->type == 'shuttle') {
            $dataOrder = shuttle::where('shuttle_id',$shuttle_id)->first();
        } else {
            $dataOrder = bus::where('bus_id',$bus_id)->first();
        }
        
        return view('order', ['user' => $user, 'dataOrder' => $dataOrder, 'route' => $request->route, 'date' => $request->date, 'type' => $request->type]);
    }

    public function pay (Request $request) {
        $user_id = $request->user_id;
        $user_name = $request->user_name;
        $user_phone = $request->user_phone;
        $user_email = $request->user_email;

        if ($request->type == 'shuttle') {
            $shuttle_name = $request->shuttle_name;
            $shuttle_type = $request->shuttle_type;
            $shuttle_price = $request->shuttle_price;
            $shuttle_time = $request->shuttle_time;
            $shuttle_date = $request->shuttle_date;
            $shuttle_seat = $request->shuttle_seat;

            $total_seat = count($shuttle_seat);
            $total_price = $shuttle_price * $total_seat;
            $seat = '';
    
            foreach ($shuttle_seat as $data_seat) {
                $seat .= $data_seat .' ';
            }

            $insertOrder = new order();
            $insertOrder->order_name = $user_name;
            $insertOrder->order_phone = $user_phone;
            $insertOrder->order_email = $user_email;
            $insertOrder->order_bus = $shuttle_name;
            $insertOrder->order_bus_type = $shuttle_type;
            $insertOrder->order_bus_seat = $seat;
            $insertOrder->order_bus_time_departure = $shuttle_time;
            $insertOrder->order_bus_date_departure = $shuttle_date;
            $insertOrder->order_total_price = $total_price;
            $insertOrder->user_id = $user_id;
            $succesOrder = $insertOrder->save();
        } else {
            $bus_name = $request->bus_name;
            $bus_type = $request->bus_type;
            $bus_price = $request->bus_price;
            $bus_time = $request->bus_time;
            $bus_date = $request->bus_date;
            $bus_seat = $request->bus_seat;
            
            $total_seat = count($bus_seat);
            $total_price = $bus_price * $total_seat;
            $seat = '';
    
            foreach ($bus_seat as $data_seat) {
                $seat .= $data_seat .' ';
            }
            $insertOrder = new order();
            $insertOrder->order_name = $user_name;
            $insertOrder->order_phone = $user_phone;
            $insertOrder->order_email = $user_email;
            $insertOrder->order_bus = $bus_name;
            $insertOrder->order_bus_type = $bus_type;
            $insertOrder->order_bus_seat = $seat;
            $insertOrder->order_bus_time_departure = $bus_time;
            $insertOrder->order_bus_date_departure = $bus_date;
            $insertOrder->order_total_price = $total_price;
            $insertOrder->user_id = $user_id;
            $succesOrder = $insertOrder->save();
        }

        if ($succesOrder) {
            return $this->confirmation($user_id, $insertOrder->order_id, $total_price);
        }
    }

    public function listOrder ($id) {
        $orders = order::where('user_id', $id)->get();
        return view('list-order', ['orders' => $orders]);
    }

    public function confirmation ($user_id, $order_id, $total_price) {
        return view('confirmation', ['user_id' => $user_id, 'order_id' => $order_id, 'total_price' => $total_price]);
    }

    public function uploadProcess (Request $request) {
        $this->validate($request, [
            'paymentSlip' => 'required',
        ]);

        $file = $request->file('paymentSlip');
        $tujuan_upload = 'payment_slip';
        $file_name = $file->getClientOriginalName();

        $order = order::where('order_id', $request->order_id)->first();
        $order->order_payment_slip = $file_name;
        $succesSave = $order->save();

        if ($succesSave) {
            $file->move($tujuan_upload,$file_name);
            return $this->processPayment($request->order_id);
        }
    }

    public function processPayment ($id) {
        $data = order::where('order_id', $id)->first();
        return view('process-payment', ['order' => $data]);

    }
}
