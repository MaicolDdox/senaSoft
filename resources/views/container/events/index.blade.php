@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1 class="text-xl font-bold mb-4">Calendario de Eventos</h1>

        <div class="shadow-lg rounded-lg overflow-hidden">
            <iframe
                src="https://calendar.google.com/calendar/embed?src=maicolduvangascarodas%40gmail.com&ctz=America%2FBogota"
                style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
@endsection
