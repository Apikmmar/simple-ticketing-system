<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticketing Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                @if ($ticketNow == NULL)
                    {{ __("No Customer Has Ticket Yet") }}
                @else
                    {{ __("Current Number:") }} <b>{{ $ticketNow->number }}</b> by {{ $ticketNow->user->name }}
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                @if ($nextTickets->isEmpty())
                    <p class="text-gray-500 text-center py-4">No number for today</p>
                @else
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2 text-center">{{ __("Next Number") }}</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">{{ __("Number Owner") }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($nextTickets as $ticket)  
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $ticket->number }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $ticket->user->name }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif

                </div>
            </div>
        </div>
    </div>

@if (auth()->user()->role == 'guest')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            @if ($ticketNow)
            @if (auth()->id() == $ticketNow->user->id && $ticketNow->status == 'now')
                <p class="text-black-500 text-center py-4"><strong>Your number is on call</strong></p>
            @endif
            @else
                <form action="{{ route('ticket.add') }}" method="post">
                    @csrf

                    <div class="p-4 text-gray-900">
                        <input type="hidden" name="number_id" value="{{ $ticketNow->id ?? null }}">

                        {{ __("Get your Number: ") }}&nbsp;&nbsp;
                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Get!
                        </button>
                    </div>
                </form>
            @endif

            </div>
        </div>
    </div>
@endif

@if (auth()->user()->role == 'staff')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('ticket.update') }}" method="post">
                    @csrf
                    @method('PATCH')
                    
                    <input type="hidden" name="number_id" value="{{ $ticketNow->id ?? NULL }}">

                    <div class="p-4 text-gray-900">
                        {{ __("Update Number: ") }}&nbsp;&nbsp;
                        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
</x-app-layout>