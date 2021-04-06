@extends('plantilla')

@section('content')
<div class="bg-gray-100" style="padding: 1rem;">
	<div class="row">
		<div class="col-3 offset-md-9">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<div class="form-group">
					<label>
						Ordenar por
						<select id="order_by" class="form-control">
							<option value="nombre"{{ request('order_by', 'nombre') == 'nombre' ? ' selected' : '' }}>Nombre</option>
							<option value="cedula"{{ request('order_by') == 'cedula' ? ' selected' : '' }}>Cedula</option>
							<option value="created_at"{{ request('order_by') == 'created_at' ? ' selected' : '' }}>Agregado</option>
						</select>
					</label>
				</div>
				
				<a href="{{ route('cliente.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					Nuevo cliente
				</a>
			</div>	
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h3 class="text-center">Lista de clientes</h3>
			<br>

			@if(session()->has('mensaje'))
				<div class="alert alert-primary" role="alert">
					{{ session('mensaje') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
			<table class="table table-striped">
				<thead>
					<th class="text-left">Nombre</th>
					<th class="text-left">Apellido</th>
					<th class="text-left">Cedula</th>
					<th class="text-left">Opciones</th>
				</thead>
				<tbody>
					@if(count($clientes) > 0)
						@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->nombre }}</td>
							<td>{{ $cliente->apellido }}</td>
							<td>{{ $cliente->cedula }}</td>
							<td>
								<form action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="POST">
									@method('DELETE')
									@csrf
									<a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}" class="btn btn-sm btn-primary">Ver</a>
									<a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}" class="btn btn-sm btn-primary">Editar</a>
									<button type="submit" class="btn btn-sm btn-danger">
										Borrar
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					@else
						<td colspan="4" class="text-center">
							<b>No hay clientes registrados</b>
						</td>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
	const select 	= document.querySelector('#order_by');
	const times 	= document.querySelector('button.close');

	times.addEventListener('click', e => {
		e.target.parentElement.parentElement.remove();
	})
	select.addEventListener('change', e => {
		e.preventDefault();

		document.location = '{{ request()->fullUrlWithQuery(['order_by' => '']) }}' + e.target.value
	});
</script>
@endpush