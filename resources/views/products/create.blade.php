@extends('Layouts.main')
@section('contenido')
    <div class="container"> <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Crear productos
                    </div>
                    <div class="card-body">
                        <form action="/products" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="/products" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection