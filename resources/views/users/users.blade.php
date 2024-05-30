<x-layouts.front>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="content d-flex flex-column flex-column-fluid" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Users</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.name')}} users listed here.</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-user" ><i class="fas fa-plus"></i> New User</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								{{$users->links('pagination::bootstrap-4')}}
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
									<thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles </th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php 
                                            $count = 1; 
                                        ?>
                                        @foreach($users as $user)
                                        <tr>
                                        <th>{{$count}}</th>
                                        <td>{{$user->last_name}}, {{$user->first_name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        
                                        @foreach($user->roles as $role)
                                            {{$role->name}} <br> 
                                        @endforeach

                                        </td>
                                        <td >
                                            @if($user->status == 'active')   
                                            <span class="label label-inline label-light-success font-weight-bold">
                                            {{$user->status}}
                                            </span>
                                            @elseif($user->status == 'inactive')
                                            <span class="label label-inline label-light-danger font-weight-bold">
                                            {{$user->status}}
                                            </span>
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            
                                            <a href="/panel/admin/settings/users/{{$user->id}}" class="btn btn-primary btn-sm float-left" style="margin-right:3px;">
                                            <i class="fa fa-pen" style="font-size:10px;"></i>
                                            </a>
                                           
                                            @if($user->status == 'active')
                                                <a href="javascript:;" id="modifyuser{{$user->id}}" class="btn btn-sm btn-warning modify-user"
                                                    data-user_id="{{$user->id}}"
                                                    data-user_status="inactive">
                                                    <i class="far fa-eye-slash" style="font-size:10px;"></i>
                                                </a>
                                                @elseif($user->status == 'inactive')
                                                <a href="javascript:;" id="modifyuser{{$user->id}}" class="btn btn-sm btn-info modify-user"
                                                    data-user_id="{{$user->id}}"
                                                    data-user_status="active">
                                                    <i class="far fa-eye" style="font-size:10px;"></i>
                                                </a>
                                                @else
                                            @endif
                                           
                                        </td>
                                        </tr>
                                        <?php 
                                            $count += 1; 
                                        ?>
                                        @endforeach
                                    </tbody>
									</table>
								</div>
								<!--end::Table-->
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 4-->
				</div>
			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
    </div>
</x-layouts.front>
