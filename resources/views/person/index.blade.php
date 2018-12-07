@extends('layouts.master')

@section('content')


	<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Contact Person List</h3>
			</div>

			<div class="box-body">

			<table class="detail">
				<tr>
					<td rowspan="5"><img height="200px" src="{{ url('/') }}/images/logos/{{$organizations[0]->logo}}"></td>
					<td>Organization Name</td>
					<td>:</td>
					<td>{{$organizations[0]->name}}</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td>{{$organizations[0]->phone}}</td>
				</tr>
				<tr>
					<td>e-Mail</td>
					<td>:</td>
					<td>{{$organizations[0]->email}}</td>
				</tr>
				<tr>
					<td>Website</td>
					<td>:</td>
					<td>{{$organizations[0]->website}}</td>
				</tr>
			</table>

			<!-- <form action="/person" method="get">
					<div class="row">
						<div class="col-md-8">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" width="200px" name="search" id="search" required>
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-primary">search</button>
						</div>
					</div>
      </form> -->
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
							<th>e-Mail</th>
							<th>Website</th>
						</tr>
						
					</thead>

					<tbody>

						@foreach($people as $ppl)
							<tr>
								<td>{{$ppl->name}}</td>
								<td>{{$ppl->phone}}</td>
								<td>{{$ppl->email}}</td>
								<td>
									<button class="btn btn-info" data-ppl_name="{{$ppl->name}}" data-ppl_phone="{{$ppl->phone}}" data-ppl_email="{{$ppl->email}}" data-ppl_avatar="{{$ppl->avatar}}" data-ppl_id="{{$ppl->id}}" data-toggle="modal" data-target="#edit">Edit</button>
									<button class="btn btn-danger" data-ppl_id="{{$ppl->id}}" data-toggle="modal" data-target="#delete">Delete</button>
									<button class="btn btn-primary" data-ppl_name="{{$ppl->name}}" data-ppl_phone="{{$ppl->phone}}" data-ppl_email="{{$ppl->email}}" data-ppl_avatar="{{$ppl->avatar}}" data-ppl_id="{{$ppl->id}}" data-toggle="modal" data-target="#detail">Detail</button>
								</td>
							</tr>

						@endforeach
					</tbody>


				</table>	
				{{ $people->links() }}			
			</div>
		</div>
	</div>



<!-- Button trigger modal -->
<button class="btn btn-warning" onclick="history.back(-1);">Go Back</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Add New
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Contact Person</h4>
      </div>
      <form action="{{route('person.store')}}" method="post" enctype="multipart/form-data">
      		{{csrf_field()}}
	      <div class="modal-body">
				<input type="hidden" class="form-control" name="organization_id" id="organization_id" value="{{$organizations[0]->id}}" required>
				@include('person.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Contact Person</h4>
      </div>
      <form action="{{route('person.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="person_id" id="person_id" value="">
				@include('person.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('person.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="person_id" id="person_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-primary fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Contact Person Detail</h4>
      </div>
      		{{csrf_field()}}
	      <div class="modal-body">
				
				@include('person.detail')

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
	      </div>
    </div>
  </div>
</div>


@endsection