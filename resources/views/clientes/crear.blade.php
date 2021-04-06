@extends('plantilla')

@section('content')
<div class="row">
	<div class="col-6 offset-md-3">
		<div class="bg-gray-100" style="padding: 1rem;">
			<h5 class="text-center">Registro de clientes</h5>
			<hr>
			<form action="{{ route('clientes.store') }}" method="POST" autocomplete="off">
				@csrf
				<div class="row">
					<div class="col">
						<label>Cedula</label>
						<input type="text" class="form-control @error('cedula') is-invalid @enderror" placeholder="Cedula" name="cedula" required>
						<div class="invalid-feedback">
							@error('cedula')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>Nombre</label>
						<input type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" name="nombre" required>
						<div class="invalid-feedback">
							@error('nombre')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>Apellido</label>
						<input type="text" class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellido" name="apellido" required>
						<div class="invalid-feedback">
							@error('apellido')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Descripción</label>
						<textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripción"></textarea>
						<div class="invalid-feedback">
							@error('descripcion')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Correo</label>
						<input type="text" class="form-control @error('correo') is-invalid @enderror" placeholder="Correo" name="correo" required/>
						<div class="invalid-feedback">
							@error('correo')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>Teléfono</label>
						<input type="text" class="form-control @error('telefono') is-invalid @enderror" placeholder="Teléfono" name="telefono" required/>
						<div class="invalid-feedback">
							@error('telefono')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Ciudad</label>
						<input type="text" class="form-control @error('direccion.ciudad') is-invalid @enderror" placeholder="Ciudad" name="direccion[ciudad]">
						<div class="invalid-feedback">
							@error('direccion.ciudad')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>Parroquia</label>
						<input type="text" class="form-control @error('direccion.parroquia') is-invalid @enderror" placeholder="Parroquia" name="direccion[parroquia]">
						<div class="invalid-feedback">
							@error('direccion.parroquia')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>Municipio</label>
						<input type="text" class="form-control @error('direccion.municipio') is-invalid @enderror" placeholder="Municipio" name="direccion[municipio]">
						<div class="invalid-feedback">
							@error('direccion.municipio')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Calle</label>
						<input type="text" class="form-control @error('direccion.calle') is-invalid @enderror" placeholder="Calle" name="direccion[calle]">
						<div class="invalid-feedback">
							@error('direccion.calle')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
					<div class="col">
						<label>N° casa</label>
						<input type="text" class="form-control @error('direccion.numero_casa') is-invalid @enderror" placeholder="N casa" name="direccion[numero_casa]">
						<div class="invalid-feedback">
							@error('direccion.numero_casa')
					            {{ $message }}
					        @enderror
				        </div>
					</div>
				</div>

				<br>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection