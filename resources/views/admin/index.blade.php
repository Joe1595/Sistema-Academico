@extends("layouts.template_admin")
@section('titulo', 'Adm Unidad Educativa')
@section("contenido")
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h1>admnistrador</h1>
                @include("admin.prueba")
            </div>
        </div><!-- /.card -->
    </div>
</div>
@endsection