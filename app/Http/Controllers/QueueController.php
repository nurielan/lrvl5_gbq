<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Input;
use DB;
use Carbon\Carbon;

class QueueController extends Controller
{
    //

    public function getMain() {
    	return view('queue.main');
    }

    public function getQueue() {
        $queue = App\Queue::all();

        foreach ($queue as $queues) {
            if ($queues->occupied == 1 || $queues->skipped == 1) {
                $queue_os[] = $queues->number;
                $queuee['os'] = $queue_os;
            } else {
                $queue_e[] = $queues->number;
                $queuee['e'] = $queue_e;
            }
        }

        if (empty($queuee['e']) && empty($queuee['os'])) {
            return response()->json(['number' => 1]);
        } elseif (empty($queuee['e']) && !empty($queuee['os'])) {
            return response()->json(['number' => end($queuee['os'])]);
        } elseif (!empty($queuee['e']) && empty($queuee['os'])) {
            return response()->json(['number' => reset($queuee['e'])]);
        } elseif (!empty($queuee['e']) && !empty($queuee['os'])) {
            return response()->json(['number' => reset($queuee['e'])]);
        }
    }

    public function postCall(Request $request) {
    	$number = str_split($request->number);

    	return response()->json($number);
    }

    public function postOccupied(Request $request) {
        $queue = App\Queue::where('number', '=', $request->number)->where('skipped', '=', 0)->first();
        $queue->occupied = 1;
        $queue->save();

        $queue_copy = App\QueueCopy::where('number', '=', $request->number)->where('skipped', '=', 0)->first();
        $queue_copy->occupied = 1;
        $queue_copy->save();
    }

    public function postSkip(Request $request) {
        $queue = App\Queue::where('number', '=', $request->number)->where('occupied', '=', 0)->first();
        $queue->skipped = 1;
        $queue->save();

        $queue_copy = App\QueueCopy::where('number', '=', $request->number)->where('occupied', '=', 0)->first();
        $queue_copy->skipped = 1;
        $queue_copy->save();
    }

    public function getTicket() {
        return view('queue.ticket');
    }

    public function postPrint(Request $request) {
        $queue = new App\Queue;
        $queue->number = $request->number;
        $queue_copy = new App\QueueCopy;
        $queue_copy->number = $request->number;
        $queue_copy->save();
        $queue->save();
    }

    public function getPrintQueue() {
        $queue = App\Queue::orderBy('number', 'desc')->first();

        if (count($queue) == 0) {
            $num['number'] = 0;
            $ber = (object) $num;

            return response()->json($ber);
        } else {
            return response()->json($queue);
        }
    }

    public function postQueueCopy() {
        $hour = Carbon::now('Asia/Jakarta')->hour;
        // $queue = App\Queue::all();

        // if ($hour == 0 && count($queue) != 0) {
        //     foreach (App\Queue::all() as $queue) {
        //         $queuecopy = new App\QueueCopy;
        //         $queuecopy->number = $queue->number;
        //         $queuecopy->occupied = $queue->occupied;
        //         $queuecopy->skipped = $queue->skipped;
        //         $queuecopy->save();
        //     }

        //     DB::table('queue')->truncate();

        //     return $hour;
        // } else {
        //     return count($queue);
        // }

        /*if ($hour == 15)
        {
            DB::table('queue')->truncate();
        }*/
        DB::table('queue')->truncate();

        return redirect('/');
    }

    // ========== Report ============
    public function getReport() {
        return view('queue.report');
    }

     public function getReportDetails() {
        $data['tanggal1'] = Input::get('date_1');
        $data['tanggal2'] = Input::get('date_2');
        $data['terpanggil'] = App\QueueCopy::where('occupied', '=', '1')->where('created_at', '>=', date('Y-m-d', strtotime(Input::get('date_1'))))->where('created_at', '<=', date('Y-m-d', strtotime(Input::get('date_2'))))->count();
        $data['tidak_terpanggil'] = App\QueueCopy::where('skipped', '=', '1')->where('created_at', '>=', date('Y-m-d', strtotime(Input::get('date_1'))))->where('created_at', '<=', date('Y-m-d', strtotime(Input::get('date_2'))))->count();

        // return print_r($data);
        return view('queue.report_details', $data);
    }
}
