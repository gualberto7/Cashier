@extends('layouts.app')

@section('content')

	<div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-body box-profile">

            <h3 class="profile-username text-center">{{ $boxDetail->name }} <br> {{ $boxDetail->ammount }} Bs.</h3>
            
            <p class="text-muted text-center">(antes) {{ $boxDetail->ammount_before }} Bs. | {{ $boxDetail->porcentage }} %</p>
            <a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-default"><b>Ingreso</b></a>
            <a href="#" class="btn btn-xs btn-danger pull-right" data-toggle="modal" data-target="#modal-default1"><b>Gasto</b></a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
       <div class="nav-tabs-custom">
	    <ul class="nav nav-tabs">
	      <li class="active"><a href="#tab_1" data-toggle="tab">Todo</a></li>
	      <li><a href="#tab_2" data-toggle="tab">Gastos</a></li>
	      <li><a href="#tab_3" data-toggle="tab">Ingresos</a></li>
	     </ul>
	    </div>

	    <div class="tab-content">
	    	<div class="tab-pane active" id="tab_1">
	    		<div class="box box-warning">
	    			<div class="container">
	    			@foreach($boxDetail->accounts as $gasto)
		    			<strong><i class="fa fa-money margin-r-5"></i> {{ $gasto->ammount }} bs. | {{ $gasto->type }}</strong>
		    			<p>{{ $gasto->description }}</p>
		    			<span class="text-muted"> {{ $gasto->created_at->diffForHumans() }} </span>
              @unless($loop->last)
		    			 <hr>
              @endunless
	    			@endforeach
	    			</div>
	    		</div>
	    	</div>
	    	<div class="tab-pane" id="tab_2">
	    		<div class="box box-danger">
	    			<div class="container">
	    			@foreach($boxDetail->accounts as $gasto)
	    				@if($gasto->type == "gasto")
		    			<strong><i class="fa fa-money margin-r-5"></i> {{ $gasto->ammount }} bs.</strong>
		    			<p>{{ $gasto->description }}</p>
		    			<span class="text-muted"> {{ $gasto->created_at->diffForHumans() }} </span>
		    			  @unless($loop->last)
                 <hr>
                @endunless
		    			@endif
	    			@endforeach
	    			</div>
	    		</div>
	    	</div>
	    	<div class="tab-pane" id="tab_3">
	    		<div class="box box-success">
	    			<div class="container">
	    			@foreach($boxDetail->accounts as $gasto)
	    				@if($gasto->type != "gasto")
		    			<strong><i class="fa fa-money margin-r-5"></i> {{ $gasto->ammount }} bs. </strong>
		    			<p>{{ $gasto->description }}</p>
		    			<span class="text-muted"> {{ $gasto->created_at->diffForHumans() }} </span>
		    			  @unless($loop->last)
                 <hr>
                @endunless
		    			@endif
	    			@endforeach
	    			</div>
	    		</div>
	    	</div>
	    </div>
    </div>

  <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registrar un ingreso</h4>
      </div>
      <form method="POST" action="{{ route('account.store') }}">
        @csrf
        <div class="modal-body">       
            <div class="form-group">
              <input type="int" class="form-control" name="ammount" placeholder="monto" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="description" placeholder="descripción" required>
            </div>
            <input type="hidden" name="box_id" value="{{ $boxDetail->id }}">
            <input type="hidden" name="type" value="ingreso">
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
        <h4 class="modal-title">Registrar un gasto</h4>
      </div>
      <form method="POST" action="{{ route('account.store') }}">
        @csrf
        <div class="modal-body">       
            <div class="form-group">
              <input type="int" class="form-control" name="ammount" placeholder="monto" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="description" placeholder="descripción" required>
            </div>
            <input type="hidden" name="box_id" value="{{ $boxDetail->id }}">
            <input type="hidden" name="type" value="gasto">
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