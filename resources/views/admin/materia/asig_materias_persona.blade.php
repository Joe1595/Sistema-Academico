@extends("layouts.template_admin")

@section("contenido")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Nombre Completo</label>
                    <input type="text" value="{{$persona->paterno}} {{$persona->materno}} {{$persona->nombres}}" readonly class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Telefono</label>
                    <input type="text" value="{{$persona->telefono}}" readonly class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Dirección</label>
                    <input type="text" value="{{$persona->direccion}}" readonly class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">CI</label>
                    <input type="text" value="{{$persona->ci}}" readonly class="form-control">    
                
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>Asignar Materias</h5>
                <form action="{{ route('asignar', $persona->id) }}" method="post">
                    @csrf
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>SIGLA</th>
                            <th>ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curso->materias as $materia )
                        <tr>
                            <td>{{$materia->id}}</td>
                            <td>{{$materia->nombre}}</td>
                            <td>{{$materia->sigla}}</td>
                            <td>
                                <input type="checkbox" name="materias[]" value="{{ $materia->id }}">
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <input type="submit" value="Asignar Materias" class="btn btn-info">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection