<div class="row justify-content-center">
	<div class="col-sm-10">
		{!! Form::model($role, ['route' => ['admin.role.' . $route, $role_id], 'method' => $method]) !!}
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}
			
			<h4 class="mt-3">Permissions</h4>
			<hr>
			<div class="row">
				
				@foreach($permissionsByCategory as $category => $permissions)
					<div class="col-sm-6 text-center mt-2">
						<div class="card" style="width: 18rem;">
							<div class="card-header">
								{{ $category }}
							</div>
							<ul class="list-group list-group-flush">
								@foreach($permissions as $permission)
									<li class="list-group-item" style="padding: 5px">
										<input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
											@if(Route::is('admin.role.edit'))
												@foreach($role->permissions as $role_permission)
													@if($role_permission->id == $permission->id)
														checked
													@endif
												@endforeach
											@endif
										>&nbsp;&nbsp;{{ $permission->name }}
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endforeach

			</div>

			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
