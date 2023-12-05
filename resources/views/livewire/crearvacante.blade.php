<form class="md:w-6/12 space-y-5" wire:submit.prevent='crearVacante'>

    <div>
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" class="block w-full" type="text" wire:model="titulo" :value="old('titulo')"/>
    </div>
    @error('titulo')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
            <select wire:model="salario" id="salario" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">

            <option>--Seleccione un salario</option>
            @foreach ($salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach

            </select>
    </div>
    @error('salario')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="categoria" :value="__('Tipo de categoria')" />
            <select wire:model="categoria" id="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>--Seleccione una categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
            </select>
    </div>
    @error('categoria')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block w-full" type="text" wire:model="empresa" :value="old('empresa')"/>
    </div>
    @error('empresa')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
    </div>
    @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la vacante')" />
        <textarea wire:model="descripcion" id="descripcion" cols="1" rows="5" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        </textarea>
    </div>
    @error('descripcion')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block w-full" type="file" wire:model="imagen" accept="image/*"/>
    </div>
    <div class="my-5 w-50">
        @if($imagen)
            Imagen:
            <img src="{{$imagen->temporaryUrl()}}" alt="">
        @endif
    </div>

    @error('imagen')
        <livewire:mostrar-alerta :message="$message" />   
    @enderror

    <x-primary-button class="w-6/12 justify-center items-center">
        Crear vacante
    </x-primary-button>   
</form>