<?php

namespace App\Observers;

use App\Models\Event;
use Spatie\GoogleCalendar\Event as GoogleEvent;
use Carbon\Carbon;

class EventObserver
{
    /**
     * Cuando se crea un Event en la BD
     */
    public function created(Event $event)
    {
        // Crear en Google Calendar
        $googleEvent = GoogleEvent::create([
            'name' => $event->titulo,
            'description' => $event->descripcion,
            'startDateTime' => Carbon::parse($event->fecha_inicio)->setTimezone(config('app.timezone')),
            'endDateTime' => Carbon::parse($event->fecha_fin ?? $event->fecha_inicio)
                                ->setTimezone(config('app.timezone'))
                                ->addHour(),
        ]);

        // Guardar el ID en la BD
        $event->google_event_id = $googleEvent->id;
        $event->saveQuietly(); // evitar bucles infinitos
    }
}
