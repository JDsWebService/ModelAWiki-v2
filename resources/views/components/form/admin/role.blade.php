<div class="row justify-content-center">
	<div class="col-sm-10">
		{!! Form::model($role, ['route' => ['admin.role.' . $route, $role_id], 'method' => $method]) !!}
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}
			
			<h4 class="mt-3">Permissions</h4>
			<hr>

			<div class="row">
				<div class="col-sm-12">
					
					<div class="accordion" id="accordionPermissions">
						@foreach($permissionsByCategory as $category => $permissions)
							
							  <div class="card">
							    <div class="card-header" id="heading{{ \Str::slug($category) }}">
							      <h5 class="mb-0">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{ \Str::slug($category) }}" aria-expanded="true" aria-controls="{{ $category }}">
							          {{ $category }}
							        </button>
							      </h5>
							    </div>
								
								@if ($loop->first)
									<div id="{{ \Str::slug($category) }}" class="collapse show" aria-labelledby="heading{{ \Str::slug($category) }}" data-parent="#accordionPermissions">
								@else
									<div id="{{ \Str::slug($category) }}" class="collapse" aria-labelledby="heading{{ \Str::slug($category) }}" data-parent="#accordionPermissions">
								@endif
							    
							      <div class="card-body">
							      	<ul class="list-inline">
								        @foreach($permissions as $permission)
								        	<li class="list-inline-item" data-toggle="tooltip" title="{{ $permission->description }}" style="padding: 5px">
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
							  </div>
							  
							
						@endforeach
					</div>

				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>

