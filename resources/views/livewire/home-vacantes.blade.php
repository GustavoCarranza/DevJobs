    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h1 class="font-extrabold text-4xl text-gray-700 mb-12">
                       Nuestras vacantes disponibles
                    </h1>
                    
                    <div class="md:flex md:justify-between p-5">
                       <ul class="divide-y divide-gray-400 w-full">
                        @forelse ( $vacantes as $vacante )
                            <li class="p-4 flex md:items-center flex-col md:flex-row">
                                <div class="md:flex-1 ">
                                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-3xl text-extrabold text-gray-600">
                                        {{$vacante->titulo}}
                                    </a>
                                    <p class="text-base text-gray-600 mb-3">{{$vacante->empresa}}</p>
                                    <p class="text-sm text-gray-600 mb-3">{{$vacante->created_at->diffForHumans()}}</p>
                                    <p class="text-sm font-bold text-gray-600">Último día para postularse: 
                                        <span>{{$vacante->ultimo_dia}}</span>
                                    </p>
                                </div>

                                <div class="mt-5 md:mt-0 ">
                                    <a href="{{route('vacantes.show', $vacante->id)}}" class="bg-teal-500 p-3 text-sm uppercase font-bold text-white rounded-xl block text-center">
                                        Ver vacante
                                    </a>
                                </div>
                            </li>
                        @empty
                            <p class="text-center p-3 text-sm text-gray-600">No hay candidatos aun</p>
                        @endforelse
                       </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>