@extends("layouts.template_admin")

@section("titulo", "Gestión Cursos y Materias ")

@section("contenido")
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nuevo Curso
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('curso.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <label for="">Ingrese nombre de curso</label>
          <input type="text" name="nombre" class="form-control">
          <label for="">Ingrese Numero Bimestre</label>
          <input type="text" name="nro_bimestre" class="form-control">
          <label for="">Ingrese Detalles</label>
          <textarea name="detalle" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Curso</button>
        </div>
      </form>
    </div>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th>ID:</th>
      <th>NOMBRE CURSO</th>
      <th>NUMERO BIMESTRE</th>
      <th>MATERIAS</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista_cursos as $curso )
    <tr>
      <td>{{ $curso-> id}}</td>
      <td>{{ $curso-> nombre}}</td>
      <td>{{ $curso-> nro_bimestre}}</td>
      <td>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal{{$curso->id}}">
          Ver Materias
        </button>

        <!-- Modal -->
        <div class="modal dialog-scrollable fade" id="Modal{{$curso->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Materias Curso {{ $curso->nombre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="{{ route('materia.store') }}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Ingrese Nombre Materia</label>
                          <input type="text" name="nombre" id="nombre_mat{{$curso->id}}" class="form-control" >
                        </div>
                        <div class="col-md-2">
                          <label for="">Sigla</label>
                          <input type="text" name="sigla" id="sigla_mat{{$curso->id}}" class="form-control" >
                        </div>
                        <div class="col-md-4">
                          <label for="">Bimestre</label>
                          <select name="bimestre" id="bimestre_mat{{$curso->id}}" class="form-control" >
                            @php
                            for($i=1; $i<=$curso->nro_bimestre;$i++){
                              @endphp
                              <option value="{{$i}}">{{$i}} BIMESTRE</option>
                              @php
                              }
                              @endphp
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label for="">Ingrese Descripción</label>
                          <textarea name="descripcion" id="descripcion_mat{{$curso->id}}" class="form-control"></textarea>
                          <input type="hidden" value="{{ $curso->id }}" name="curso_id">
                        </div>
                        <input type="submit" value="Guardar Materia" class="btn btn-info">
                       <!-- <button type="button" class="btn btn-warning" onclick="guardarMateria('{{ $curso->id}}')"> Guardar Materia</button>-->
                      </div>
                    </form>
                  </div>
                  <div class="col-md-12">
                    <table class="table table-strped table-hover">
                      <tr>
                        <td>NOMBRE</td>
                        <td>SIGLA</td>
                        <td>BIMESTRE</td>
                      </tr>
                                        
                      @foreach ($curso->materias as $mat )
                      <tr>
                        <td>{{$mat->nombre}}</td>
                        <td>{{$mat->sigla}}</td>
                        <td>{{$mat->bimestre}}</td>
                      </tr>
                      @endforeach

                    </table>
                    <span id="cargando"></span>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </td>
      <td>{{ $curso-> id}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="col-md-6">

  </div>
  <div class="col-md-6">

  </div>
</div>

@endsection