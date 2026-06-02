<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Material') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('materiais.update', $material) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <div class="mt-2 mb-2">
                                <label for="name">Fabricante:</label>
                            </div>
                            <input type="text" name="fabricante" id="fabricante" value="{{ $material->fabricante }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="unidade_de_medida">Unidade de Medida:</label>
                            </div>
                            <input type="text" name="unidade_de_medida" id="unidade_de_medida" value="{{ $material->unidade_de_medida }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="textura">Textura:</label>
                            </div>
                            <input type="text" name="textura" id="textura" value="{{ $material->textura }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="cor">Cor:</label>
                            </div>
                            <input type="text" name="cor" id="cor" value="{{ $material->cor }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="material_de_fabricacao">Material de Fabricação:</label>
                            </div>
                            <input type="text" name="material_de_fabricacao" id="material_de_fabricacao" value="{{ $material->material_de_fabricacao }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="peso">Peso:</label>
                            </div>
                            <input type="text" name="peso" id="peso" value="{{ $material->peso }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="data_de_validade">Data de Validade:</label>
                            </div>
                            <input type="date" name="data_de_validade" id="data_de_validade" value="{{ $material->data_de_validade }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="quantidade_em_estoque">Quantidade em Estoque:</label>
                            </div>
                            <input type="number" name="quantidade_em_estoque" id="quantidade_em_estoque" value="{{ $material->quantidade_em_estoque }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>



                        <div>
                            <div class="mb-2">
                                <label for="categorias_id">Categorias:</label>
                            </div>
                            <select id="categorias_id" name="categorias_id" class="col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}" @selected($categoria->id === $material->categorias_id)
                                    >{{$categoria->tipo}}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>
                        <div class="mt-2 mb-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>