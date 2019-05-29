@extends('layouts.app')

@section('content')
<div class="container">
    <label>Total: {{ $total->pluck('total') }}</label>
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default1">
      + nueva caja
    </button>
    <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default">
      + entrada
    </button><br> <br>
    <div class="row">
      @foreach($boxes as $box)
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-body box-profile">

            <h3 class="profile-username text-center">{{ $box->name }} <br> {{ $box->ammount }} Bs.</h3>
            
            <p class="text-muted text-center">(antes) {{ $box->ammount_before }} Bs. | {{ $box->porcentage }} %</p>

            <a href="{{route('box.show', $box->id)}}" class="btn btn-primary btn-block"><b>Ver mas detalles</b></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registrar nueva caja</h4>
      </div>
      <form method="POST" action="{{ route('box.update') }}">
        @csrf @method('PUT')
        <div class="modal-body">       
            <div class="form-group">
              <input type="int" class="form-control" name="ammount" placeholder="monto" required>
            </div>
            <div class="form-group">
              <select class="form-control" name="box">
                @foreach($boxes as $box)
                  <option value="{{$box->id}}">{{ $box->name }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registrar nueva caja</h4>
      </div>
      <form method="POST" action="{{ route('box.store') }}">
        @csrf
        <div class="modal-body">       
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="nombre" required>
            </div>
            <div class="form-group">
              <input type="int" class="form-control" name="ammount" placeholder="monto actual" required>
            </div>
            <div class="form-group">
              <input type="int" class="form-control" name="porcentage" placeholder="porcentaje a ingresar" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
