<x-jet-action-section>
    <x-slot name="title">
        Sesiones Activas
    </x-slot>

    <x-slot name="description">
        Administre sus sesiones activas en otros navegadores. 
    </x-slot>

    <x-slot name="content" class="bg-cool-800">
        <div class="max-w-xl text-sm text-white">
            Si es necesario, puede cerrar las sesiones en otros navegadores o dispositivos, a continuación se muestra una lista de los dispositivos en los que se ha iniciado sesión. 
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <i class='bx bx-laptop bx-lg'></i>
                            @else
                                <i class='bx bxs-devices bx-lg'></i>
                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-sm text-white">
                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-100">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">Este dispositivo</span>
                                    @else
                                        Ultima Sesión Activa {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button type="submit" wire:click="confirmLogout" wire:loading.attr="disabled">
                Cerrar otras sesiónes
            </x-button>

            <x-jet-action-message class="ml-3 text-white" on="loggedOut">
                Realizado.
            </x-jet-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                Cerrar otras sesiones
            </x-slot>

            <x-slot name="content">
                Por favor ingrese su contraseña para confirmar que quiere cerrar las sesiones en otros dispositivos.

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-full"
                                placeholder="Contraseña"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-button-danger wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled" class="px-1">
                    Cancelar
                </x-button-danger>

                <x-button type="submit" class="ml-2"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    Cerrar Otras Sesiones
                </x-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
