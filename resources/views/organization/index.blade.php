@extends('layouts.master')

@section('content')


	<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">All Organization</h3>
			</div>

			<div class="box-body">
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

						@foreach($organizations as $org)
							<tr>
								<td>{{$org->name}}</td>
								<td>{{$org->phone}}</td>
								<td>{{$org->email}}</td>
								<td>{{$org->website}}</td>
								<td>
									<button class="btn btn-info" data-org_name="{{$org->name}}" data-org_phone="{{$org->phone}}" data-org_email="{{$org->email}}" data-org_website="{{$org->website}}" data-org_logo="{{$org->logo}}" data-org_id="{{$org->id}}" data-toggle="modal" data-target="#edit">Edit</button>
									<button class="btn btn-danger" data-org_id="{{$org->id}}" data-toggle="modal" data-target="#delete">Delete</button>
									<button class="btn btn-primary" data-org_name="{{$org->name}}" data-org_phone="{{$org->phone}}" data-org_email="{{$org->email}}" data-org_website="{{$org->website}}" data-org_logo="{{$org->logo}}" data-org_id="{{$org->id}}" data-toggle="modal" data-target="#detail">Detail</button>
								</td>
							</tr>

						@endforeach
					</tbody>


				</table>	
				{{ $organizations->links() }}			
			</div>
		</div>
	</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Add New
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Organization</h4>
      </div>
      <form action="{{route('organization.store')}}" method="post" enctype="multipart/form-data">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('organization.form')
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
        <h4 class="modal-title" id="myModalLabel">Edit Organization</h4>
      </div>
      <form action="{{route('organization.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="organization_id" id="org_id" value="">
				@include('organization.form')
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
      <form action="{{route('organization.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="organization_id" id="org_id" value="">

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
        <h4 class="modal-title text-center" id="myModalLabel">Organization Detail</h4>
      </div>
      		{{csrf_field()}}
	      <div class="modal-body">
				
				@include('organization.detail')

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
	      </div>
    </div>
  </div>
</div>


@endsection