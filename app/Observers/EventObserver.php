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
        // Hora real de creación del registro
        $start = $event->created_at->copy()->timezone(config('app.timezone'));
        $end = $start;

        // Crear en Google Calendar
        $googleEvent = GoogleEvent::create([
            'name' => $event->titulo,
            'description' => $event->descripcion,
            'startDateTime' => $start,
            'endDateTime' => $end,
        ]);

        // Guardar ID en BD
        $event->google_event_id = $googleEvent->id;
        $event->saveQuietly();
    }


    public function deleting(Event $event)
    {
        if ($event->google_event_id) {
            try {
                $googleEvent = \Spatie\GoogleCalendar\Event::find($event->google_event_id);
                if ($googleEvent) {
                    $googleEvent->delete();
                }
            } catch (\Exception $e) {
                \Log::error("Error eliminando en Google Calendar: " . $e->getMessage());
            }
        }
    }
}
