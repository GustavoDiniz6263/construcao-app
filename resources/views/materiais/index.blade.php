<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiais') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="w-full px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 mb-6">
                        <a href="{{ route('materiais.create') }}">😍 Adicione um novo Material</a>
                    </button>
                    
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Fabricante</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Unidade de Medida</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Textura</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Cor</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Material de Fabricação</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Peso</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Data de Validade</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Quantidade em Estoque</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Categoria</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Imagem</th>
                                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Editar</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materiais as $material)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->fabricante }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->unidade_de_medida }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->textura }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->cor }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->material_de_fabricacao }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->peso }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->data_de_validade }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $material->quantidade_em_estoque }}</td>
                                    <td class="border border-gray-300 px-6 py-3">@foreach ($categorias as $categoria)
            @if     ($categoria->id == $material->categorias_id)
                    {{ $categoria->tipo }}
        @endif
    @endforeach</td>                <td class="border border-gray-300 px-6 py-3">
                                        @if($material->image)
                            <img src="{{ asset('storage/' . $material->image) }}" alt="{{ $material->fabricante }}" class="w-full max-h-96 object-cover rounded-lg mb-4">
                        @else
                            <div class="w-full h-64 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                                <span class="text-gray-500">Sem imagem</span>
                            </div>
                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <a href="{{ route('materiais.edit', $material) }}" class="text-green-600 hover:text-green-900 hover:underline">Edit</a>
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <form method="POST" action="{{ route('materiais.destroy', $material) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza?')" class="text-red-600 hover:text-red-900">
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach($materiais as $material)
    @if($material->quantidade_em_estoque < 5)
        <div class="mt-2 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
            ⚠️ Atenção: o material "{{ $material->fabricante }}" está com estoque baixo ({{ $material->quantidade_em_estoque }} unidades)
        </div>
    @endif
@endforeach
                </div>
            </div>
        </div>
    </div>

    </x-app-layout>