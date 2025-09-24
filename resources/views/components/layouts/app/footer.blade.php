<div class="container mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-8">
        <div>
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center">
                    <img src="{{ asset('img/logoTipo.png') }}" alt="Logotipo" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-bold">SIA</h3>
                    <p class="text-sm opacity-80">Centro de Formación Agroindustrial</p>
                </div>
            </div>
            <p class="text-sm opacity-80 leading-relaxed">
                Sistema de información especializado en la gestión y seguimiento de grupos de semilleros de
                investigación la Angosutra.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Enlaces Útiles</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Documentación</a></li>
                <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Soporte
                        Técnico</a></li>
                <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Términos de
                        Uso</a></li>
                <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Política de
                        Privacidad</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Contacto</h4>
            <div class="space-y-2 text-sm opacity-80">
                <p>Centro de Formación Agroindustrial</p>
                <p>Email: info@cefa.edu.co</p>
                <p>Teléfono: +57 (1) 234-5678</p>
            </div>
        </div>
    </div>

    <div class="border-t border-secondary-foreground/20 mt-8 pt-8 text-center">
        <p class="text-sm opacity-80">
            © {{ date('Y') }} Centro de Formación Agroindustrial CEFA. Todos los derechos reservados.
        </p>
    </div>
</div>
