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

        if($ticketNow) {
            $nextTickets = Ticket::where('id', '>', $ticketNow->id)->limit(3)->get();
        } else {
            $ticketNow = NULL;
            $nextTickets = Ticket::whereDate('created_at', today())->where('status', 'waiting')->get() ?? collect();
        }

        return view('ticket', [
            'ticketNow' => $ticketNow,
            'nextTickets' => $nextTickets,
        ]);
    }

    public function getTicketNumber(Request $request) {

        $lastNumber = null;

        if ($request->number_id != NULL) {
            $lastNumber = Ticket::find($request->number_id);
        }

        if (!$lastNumber || !$lastNumber->created_at->isSameDay(today())) {
            $lastNumber = Ticket::whereDate('created_at', today())->latest()->first();
        }

        if (!$lastNumber) {
            $newNumber = 1001;
        } else {
            $newNumber = $lastNumber->number + 1;
        }

        Ticket::create([
            'user_id' => Auth::id(),
            'number' => $newNumber,
            'status' => 'waiting',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('ticket.view');
    }

    public function updateTicketNumber(Request $request) {
        
        if ($request->number_id != NULL) {
            $currentTicket = Ticket::findOrFail($request->number_id);
            $nextTicket = Ticket::where('number', '>', $currentTicket->number)->first();
    
            $currentTicket->update(['status' => 'done']);
            
            if ($nextTicket) {
                $nextTicket->update(['status' => 'now']);
            }
        } else {
            $currentTicket = Ticket::where('status', 'waiting')->first();

            if($currentTicket->status != 'done') {
                $currentTicket->update(['status' => 'now']);
            }
        }

        return redirect()->route('ticket.view');
    }
}
