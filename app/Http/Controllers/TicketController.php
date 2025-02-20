<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //
    public function viewTicket() {
        $ticketNow = Ticket::where('status', 'now')->first();
        $nextTickets = Ticket::where('id', '>', $ticketNow->id)->orderBy('id', 'asc')->limit(3)->get();

        return view('ticket', [
            'ticketNow' => $ticketNow,
            'nextTickets' => $nextTickets,
        ]);
    }

    public function getTicketNumber(Request $request) {
        $lastNumber = Ticket::findOrFail($request->number_id);

        if (!$lastNumber || !$lastNumber->created_at->isSameDay(today())) {
            $newNumber = 1001;
        } else {
            $newNumber = $lastNumber->number + 1;
        }

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'number' => $newNumber,
            'status' => 'waiting',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('ticket.view');
    }

    public function updateTicketNumber(Request $request) {
        $currentTicket = Ticket::findOrFail($request->number_id);
        $nextTicket = Ticket::where('number', '>', $currentTicket->number)->first();

        dd($currentTicket, $nextTicket);

        // $currentTicket->update(['status' => 'done']);
        
        // if ($nextTicket) {
        //     $nextTicket->update(['status' => 'now']);
        // }
        // return redirect()->route('ticket.view');
    }
}
