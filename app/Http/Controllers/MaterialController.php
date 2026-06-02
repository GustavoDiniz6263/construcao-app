<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $materiais = Material::All();
    $categorias = Categoria::All();
    return view('materiais.index', compact('materiais', 'categorias'));
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    //Busca as categorias para que a View as use
    $categorias = Categoria::All();

    return view('materiais.create', compact('categorias'));
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{

    // Validar dados
        $validated = $request->validate([
            'fabricante' => 'required|string|max:255',
            'unidade_de_medida' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'textura' => 'required|string|max:255',
            'material_de_fabricacao' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'data_de_validade' => 'required|date',
            'quantidade_em_estoque' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('materiais', 'public');
            $validated['image'] = $imagePath;
        }

        // Criar post
        Material::create($validated);

        return redirect()->route('materiais.index')->with('success', 'Material criado com sucesso!');
}

/**
 * Display the specified resource.
 */
public function show(Material $material)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(Material $material)
{   
    //Busca as categorias para que a View as use
    $categorias = Categoria::All();

    return view('materiais.edit', compact('material', 'categorias'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Material $material)
{
    // Validar dados
        $validated = $request->validate([
            'fabricante' => 'required|string|max:255',
            'unidade_de_medida' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'textura' => 'required|string|max:255',
            'material_de_fabricacao' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'data_de_validade' => 'required|date',
            'quantidade_em_estoque' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorias_id' => 'required|exists:categorias,id',
        ], [
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da nova imagem
        if ($request->hasFile('image')) {
            // Deletar imagem anterior se existir
            if ($material->image && Storage::disk('public')->exists($material->image)) {
                Storage::disk('public')->delete($material->image);
            }

            // Armazenar nova imagem
            $imagePath = $request->file('image')->store('materiais', 'public');
            $validated['image'] = $imagePath;
        }

        // Atualizar material
        $material->update($validated);

        return redirect()->route('materiais.index')->with('success', 'Material atualizado com sucesso!');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Material $material)
{
    // Deletar imagem se existir
        if ($material->image && Storage::disk('public')->exists($material->image)) {
            Storage::disk('public')->delete($material->image);
        }

        // Deletar material
        $material->delete();

        return redirect()->route('materiais.index')->with('success', 'Material deletado com sucesso!');
    }
}

