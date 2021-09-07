<div class="text-white bg-cool-800 overflow-hidden shadow rounded-lg">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4 py-12 pl-3 mr-3  rounded-lg">
        <div class="type flex flex-wrap content-center ">
            <h1 class="text-3xl">CDAG - FNA</h1>
            <p class="mb-10">Asistente para control de pruebas físicas en la Federación Nacional de Atletismo</p>
        </div>
        <div class="stats">
            <div class="">
                <span>{{ $atletas }}</span>
                <p class="text-xs md:text-lg">Atletas Registrados</p>
            </div>
            <div class="">
                <span>{{ $pruebas }}</span>
                <p class="text-xs md:text-lg">Pruebas Físicas <br> Aplicadas</p>
            </div>
            <div class="">
                <span>{{ $entrenadores }}</span>
                <p class="text-xs md:text-lg">Entrenadores Registrados</p>
            </div>
            <div class="">
                <span>
                    <center>
                        <i class='bx bx-timer bx-burst' style='color:#0effeb'></i>
                    </center>
                </span>
                <p></p>
            </div>
        </div>
    </div>
</div>