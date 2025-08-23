<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Spatie\GoogleCalendar\Event as GoogleEvent;
use Carbon\Carbon;

class SyncEventsToGoogleCalendar extends Command
{
    protected $signature = 'calendar:sync';
    protected $description = 'Sincroniza los eventos de la base de datos con Google Calendar';

    public function handle()
    {
        $this->info('📌 Sincronizando eventos con Google Calendar...');

        $events = Event::all();

        foreach ($events as $event) {
            try {
                if ($event->google_event_id) {
                    // Intentamos buscar el evento en Google Calendar
                    $googleEvent = GoogleEvent::find($event->google_event_id);

                    if (!$googleEvent) {
                        $this->warn("⚠️ No se encontró el evento con ID {$event->google_event_id}, se creará uno nuevo.");
                        $googleEvent = new GoogleEvent;
                    }
                } else {
                    $googleEvent = new GoogleEvent;
                }

                $googleEvent->name = $event->titulo;
                $googleEvent->description = $event->descripcion;
                $googleEvent->startDateTime = Carbon::parse($event->fecha_inicio)->setTimezone(config('app.timezone'));
                $googleEvent->endDateTime = $event->fecha_fin
                    ? Carbon::parse($event->fecha_fin)->setTimezone(config('app.timezone'))
                    : Carbon::parse($event->fecha_inicio)->addDay()->setTimezone(config('app.timezone'));

                // Guardamos en Google Calendar
                $googleEvent->save();

                // 👀 Forzamos mostrar el ID devuelto
                $this->line("➡️ Google Event ID devuelto: " . ($googleEvent->id ?? 'NULL'));

                // Guardamos el ID en nuestra tabla si aún no existe
                if (!$event->google_event_id && !empty($googleEvent->id)) {
                    $event->google_event_id = $googleEvent->id;
                    $event->save();
                }

                $this->info("✅ Evento sincronizado: {$event->titulo} (Google ID: {$googleEvent->id})");
            } catch (\Exception $e) {
                $this->error("❌ Error al sincronizar '{$event->titulo}': " . $e->getMessage());
            }
        }

        $this->info('🎉 ¡Todos los eventos fueron sincronizados con Google Calendar!');
    }
}
