 @can('projects.create')
     {{-- Botón para avanzar fase rediseñado --}}
     <div class="flex justify-between items-center">
         <a href="{{ route('projects.index') }}"
             class="px-6 py-3 bg-muted hover:bg-muted/80 text-muted-foreground rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 border border-border">
             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
             </svg>
             <span>Volver a Proyectos</span>
         </a>

         <button
             class="px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md"
             onclick="document.getElementById('faseModal').classList.remove('hidden')">
             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
             </svg>
             <span>Avanzar Fase</span>
         </button>
     </div>
     </div>

     {{-- =================== Modal (formulario) para avanzar fase =================== --}}
     <div id="faseModal"
         class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
         <div
             class="bg-card rounded-lg shadow-xl border border-border w-full max-w-md transform transition-all duration-300">
             <div class="px-6 py-4 border-b border-border">
                 <div class="flex items-center justify-between">
                     <div class="flex items-center space-x-3">
                         <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                             <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M13 7l5 5m0 0l-5 5m5-5H6" />
                             </svg>
                         </div>
                         <h2 class="text-lg font-semibold text-foreground">Avanzar Fase</h2>
                     </div>
                     <button type="button"
                         class="text-muted-foreground hover:text-foreground transition-colors duration-200"
                         onclick="document.getElementById('faseModal').classList.add('hidden')">
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M6 18L18 6M6 6l12 12" />
                         </svg>
                     </button>
                 </div>
             </div>


             <form action="{{ route('projects.advance', $project->id) }}" method="POST" class="p-6">
                 @csrf
                 <div class="mb-6">
                     <label for="fecha_fin" class="block text-sm font-medium text-foreground mb-2">
                         <div class="flex items-center space-x-2">
                             <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                             <span>Fecha fin de la fase actual</span>
                         </div>
                     </label>
                     <input type="date" id="fecha_fin" name="fecha_fin"
                         class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background"
                         required>
                     <p class="mt-2 text-sm text-muted-foreground">Selecciona la fecha en que se completó la fase actual
                     </p>
                 </div>
                 <div class="mb-6">
                     <label for="descripcion" class="block text-sm font-medium text-foreground mb-2">
                         <div class="flex items-center space-x-2">
                             <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                             </svg>
                             <span>Descripción de la fase actual</span>
                         </div>
                     </label>
                     <textarea id="descripcion" name="descripcion" rows="3"
                         class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 
               focus:border-primary transition-colors duration-200 bg-background resize-none"></textarea>
                 </div>

                 <div class="flex justify-end space-x-3">
                     <button type="button"
                         class="px-4 py-2 bg-muted hover:bg-muted/80 text-muted-foreground rounded-lg font-medium transition-all duration-200 border border-border"
                         onclick="document.getElementById('faseModal').classList.add('hidden')">
                         Cancelar
                     </button>
                     <button type="submit"
                         class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                         Guardar
                     </button>
                 </div>
             </form>
         </div>
     @endcan
