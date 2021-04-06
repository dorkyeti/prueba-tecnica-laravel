<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearCliente;
use App\Http\Requests\EditarCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orden(request('order_by', 'nombre'))->get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CrearCliente  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearCliente $request)
    {
        DB::transaction(function () use ($request) {
            $cliente = Cliente::create(
                $request->only('nombre', 'apellido', 'cedula', 'descripcion', 'telefono', 'correo')
            );

            if ($request->has('direccion')) {
                $cliente->direccion()->create($request->direccion);
            }

            return $cliente;
        });

        return redirect()->route('clientes.index')
                ->with('mensaje', 'Cliente creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::with('direccion')->findOrFail($id);

        return view('clientes.ver', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::with('direccion')->findOrFail($id);

        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditarCliente  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarCliente $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $cliente = Cliente::findOrFail($id);
            $cliente->update(
                $request->only('nombre', 'apellido', 'cedula', 'descripcion', 'telefono', 'correo')
            );

            if ($request->has('direccion')) {
                $cliente->direccion()->update($request->direccion);
            }

            return $cliente;
        });

        return redirect()->route('clientes.index')
                ->with('mensaje', 'Cliente actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->delete()) {
            return back()->with('mensaje', 'Cliente eliminado con exito');
        }

        return redirect()->route('clientes.index')
            ->with('mensaje', 'No se pudo eliminar al cliente');
    }
}
