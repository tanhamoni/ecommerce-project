<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function showOrders($status)
    {
        if (isset($request->search)) {
            if ($status == 'all') {
                $orders = Order::where('invoice_number', $request->search)->orWhere('phone', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->with('orderDetails')->paginate(50);
            } else {
                $orders = Order::where('invoice_number', $request->search)->orWhere('phone', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->with('orderDetails')->where('status', $status)->paginate(50);
            }
        } else {
            if ($status == 'all') {
                $orders = Order::orderBy('id', 'desc')->with('orderDetails')->paginate(50);
            } else {
                $orders = Order::orderBy('id', 'desc')->with('orderDetails')->where('status', $status)->paginate(50);
            }
        }
        return view('admin.order.list', compact('orders', 'status'));
    }

    public function detailOrder($id)
    {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        return view('admin.order.edit', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->charge = $request->charge;
        $order->address = $request->address;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();

        toastr()->success('Order updated successfully');
        return redirect()->back();
    }

    public function updateOrderDetails(Request $request, $id)
    {
        $orderDetails = OrderDetails::find($id);

        $orderDetails->qty = $request->qty;
        $orderDetails->color = $request->color;
        $orderDetails->size = $request->size;

        $orderDetails->save();
        // return redirect()->back();
        return response()->json('Updated successfully');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;

        $order->save();
        return redirect()->back();
    }

    public function couriarEntry($order_id)
    {
        $order = Order::findOrFail($order_id);

        if ($order->courier_name != 'steadfast') {
            toastr()->error('Please select Steadfast courier.');
            return back();
        }

        if (empty(trim($order->name))) {
            toastr()->error('Recipient name is required.');
            return back();
        }

        if (!preg_match('/^01[3-9]\d{8}$/', trim($order->phone))) {
            toastr()->error('Please enter a valid Bangladeshi mobile number.');
            return back();
        }

        if (empty(trim($order->address))) {
            toastr()->error('Recipient address is required.');
            return back();
        }

        if (strlen(trim($order->address)) > 250) {
            toastr()->error('Recipient address cannot be more than 250 characters.');
            return back();
        }

        if ($order->price <= 0) {
            toastr()->error('Invalid COD amount.');
            return back();
        }

        $response = Http::withoutVerifying()
            ->withHeaders([
                'Api-Key' => "dqkv4qjckrwohgm8einj1zkswyjjzhz3",
                'Secret-Key' => "qqogob5hdgfy5zdvbznyth7g",
                'Content-Type' => "application/json"

            ])
            ->post('https://portal.packzy.com/api/v1/create_order', [
                'invoice'           => $order->invoice_number,
                'recipient_name'    => trim($order->name),
                'recipient_phone'   => trim($order->phone),
                'recipient_address' => trim($order->address),
                'cod_amount'        => $order->price,
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['consignment'])) {

            $order->status = 'processing';
            $order->consignment_id = $data['consignment']['consignment_id'];
            $order->tracking_code = $data['consignment']['tracking_link'];
            $order->save();

            toastr()->success('Courier entry successful.');
        } else {

            if (isset($data['errors'])) {
                $message = '';

                foreach ($data['errors'] as $errors) {
                    $message .= implode('<br>', $errors) . '<br>';
                }

                toastr()->error($message);
            } else {
                toastr()->error($data['message'] ?? 'Courier entry failed.');
            }
        }

        return back();
    }

    public function printBulkInvoice(Request $request)
    {
        $orders = Order::with('orderDetails')->whereIn('id', $request->order_id)->get();

        foreach ($orders as $order) {
            $order->is_printed = true;
            $order->save();
        }
        return view('admin.order.invoice', compact('orders'));
    }
}
