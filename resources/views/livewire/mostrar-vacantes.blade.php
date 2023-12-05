<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-400 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{$vacante->titulo}} 
                    </a>
                    <p class="text-sm text-gray-600 font-bold">
                        {{$vacante->empresa}}
                    </p>
                    <p class="text-sm text-gray-500">
                        Último día: {{$vacante->ultimo_dia}}   
                    </p>
                </div>
                
                <div class="flex flex-col md:flex-row items-stretch gap-2 mt-5 md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 py-3 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-blue-800 py-3 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <button wire:click="mostrarAlerta({{$vacante->id}})" class="bg-red-800 py-3 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>

            </div>
        @empty
            <h1 class="p-3 text-center text-sm text-gray-600">No hay vacantes por el momento</h1>
        @endforelse
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('livewire:load', function () {
    Livewire.on('mostrarAlerta', function (){
        Swal.fire({
            title: "Eliminar vacante?",
            text: "Una vacante eliminada no se puede recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar!",
            cancelButtonText: 'Cancelar'
        })
    .then((result) => 
    {
        if(result.isConfirmed) 
        {
            Swal.fire
            ({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
    });
  });
});

</script>
@endpush