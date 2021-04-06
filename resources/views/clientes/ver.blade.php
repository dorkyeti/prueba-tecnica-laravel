@extends('plantilla')

@section('content')
<div class="row">
	<div class="col-6 offset-md-3">
		<div class="bg-gray-100" style="padding: 1rem;">
			<h5 class="text-center">Ver al cliente {{ $cliente->nombre }}</h5>
			<hr>
				<div class="row">
					<div class="col">
						<label>Cedula</label>
						<input type="text" class="form-control-plaintext" placeholder="Cedula" name="cedula" value="{{ $cliente->cedula }}" readonly>
					</div>
					<div class="col">
						<label>Nombre</label>
						<input type="text" class="form-control-plaintext" placeholder="Nombre" name="nombre" value="{{ $cliente->nombre }}" readonly>
					</div>
					<div class="col">
						<label>Apellido</label>
						<input type="text" class="form-control-plaintext" placeholder="Apellido" name="apellido" value="{{ $cliente->apellido }}" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Descripción</label>
						<textarea name="descripcion" class="form-control-plaintext" placeholder="Descripción" readonly>{{ $cliente->descripcion }}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Correo</label>
						<input type="text" class="form-control-plaintext" placeholder="Correo" name="correo" value="{{ $cliente->correo }}"  readonly/>

					</div>
					<div class="col">
						<label>Teléfono</label>
						<input type="text" class="form-control-plaintext" placeholder="Teléfono" name="telefono" value="{{ $cliente->telefono }}" readonly/>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Ciudad</label>
						<input type="text" class="form-control-plaintext" placeholder="Ciudad" name="direccion[ciudad]" value="{{ $cliente->direccion->ciudad }}" readonly>
					</div>
					<div class="col">
						<label>Parroquia</label>
						<input type="text" class="form-control-plaintext" placeholder="Parroquia" name="direccion[parroquia]" value="{{ $cliente->direccion->parroquia }}" readonly>
					</div>
					<div class="col">
						<label>Municipio</label>
						<input type="text" class="form-control-plaintext" placeholder="Municipio" name="direccion[municipio]" value="{{ $cliente->direccion->municipio }}" readonly>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Calle</label>
						<input type="text" class="form-control-plaintext" placeholder="Calle" name="direccion[calle]" value="{{ $cliente->direccion->calle }}" readonly>
					</div>
					<div class="col">
						<label>N° casa</label>
						<input type="text" class="form-control-plaintext" placeholder="N casa" name="direccion[numero_casa]" value="{{ $cliente->direccion->numero_casa }}" readonly>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection