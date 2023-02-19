@extends('web.member.layouts.main')
@section('main.container')
  <section class="team-detail-section">
		<div class="auto-container">
			<div class="row clearfix">
				 @if(session('status'))
                    <div class="alert alert-success text-center">
                    <b>{{ session('status') }} 
                    <?php if(empty($data)){ ?> <a href="{{ url('/member-login') }}">Login</a> <?php } ?></b>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center" style="background: #f94d1c; color: #fff;">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    
                            <form class="row g-3" method="post" action= "{{ url('/create-member')}}" enctype="multipart/form-data">
                                @csrf
                                <?php if(!empty($data)){ ?>
                                    <input type="hidden" value=" <?php if(!empty($data)){echo $data->id; } ?>"  name="id" id="id">
                                <?php } ?>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Pocket Id</label>
                                    <input type="text" class="form-control @error ('pocket_id') is-invalid @enderror" value=" <?php if(!empty($data)){echo $data->pocket_id; } ?>"  name="pocket_id" id="pocket_id">
                                    @error('pocket_id')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Block Department</label>
                                    <select name="block" id="block" class="form-select">
                                        <option value=""> Select </option>
                                        <?php for($i = 0; $i < 10; $i++){ ?>
                                        <option value="<?php echo $i; ?>" <?php if(!empty($data)){if( $data->block == $i){ echo 'selected'; }} ?>> 0<?php echo $i; ?> </option>
                                        <?php } ?>
                                    </select>
                                    @error('block')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Name</label>
                                    <input type="text" class="form-control @error ('name') is-invalid @enderror"  name="name" id="name" value="<?php if(!empty($data)){echo $data->name; } ?>">
                                    @error('name')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Mobile</label>
                                    <input type="text" class="form-control  @error ('mobile') is-invalid @enderror"  id="mobile" name="mobile" value="<?php if(!empty($data)){echo $data->phone; } ?>">
                                     @error('mobile')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control  @error ('email') is-invalid @enderror"  value="<?php if(!empty($data)){echo $data->email; } ?>">
                                     @error('email')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <div id="showEmailError"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    
                                </div>
                                <div class="col-12">
                                    <div class="form-group purple-border">
                                    <label for="exampleFormControlTextarea4">Address</label>
                                    <textarea class="form-control @error ('address') is-invalid @enderror" name="address" rows="3"><?php if(!empty($data)){echo $data->address; } ?></textarea>
                                     @error('address')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">Ownership</label>
                                    <select name="ownership" id="ownership" class="form-select">
                                        <option value=""> Select </option>
                                        <option value="owner" <?php if(!empty($data)){if( $data->ownership == 'owner'){ echo 'selected'; }} ?>> Owner </option>
                                        <option value="rental" <?php if(!empty($data)){if( $data->ownership == 'rental'){ echo 'selected'; }} ?>> Rental </option>
                                    </select>
                                    @error('ownership')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 rental_show">
                                    <label for="inputEmail4" class="form-label">Owner name</label>
                                    <input type="text" class="form-control @error ('owner_name') is-invalid @enderror"  name="owner_name" id="owner_name" value="<?php if(!empty($data)){echo $data->owner_name; } ?>">
                                    @error('owner_name')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 rental_show">
                                    <label for="inputEmail4" class="form-label">Owner mobile no.</label>
                                    <input type="number" class="form-control @error ('owner_phone') is-invalid @enderror"  name="owner_phone" id="owner_phone" value="<?php if(!empty($data)){echo $data->owner_phone; } ?>">
                                    @error('owner_phone')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <h4>Vahical: 1</h4>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label"> Vehicle Name</label>
                                    <input type="text" class="form-control @error ('vahical_1_name') is-invalid @enderror"  name="vahical_1" id="vahical_1" value="<?php if(!empty($data)){echo $data->vahical_1; } ?>">
                                    @error('vahical_1_name')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">Vehicle No.</label>
                                    <input type="text" class="form-control @error ('vahical_1_no') is-invalid @enderror"  name="vahical_1_no" id="vahical_1_no" value="<?php if(!empty($data)){echo $data->vahical_1_no; } ?>">
                                    @error('vahical_1_no')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">RFID</label>
                                    <input type="text" class="form-control @error ('rfid_1') is-invalid @enderror"  name="rfid_1" id="rfid_1" value="<?php if(!empty($data)){echo $data->rfid_1; } ?>">
                                    @error('rfid_1')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                
                                <h4>Vahical: 2</h4>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label"> Vehicle Name</label>
                                    <input type="text" class="form-control @error ('vahical_2_name') is-invalid @enderror"  name="vahical_2_name" id="vahical_2_name" value="<?php if(!empty($data)){echo $data->vahical_2; } ?>">
                                    @error('vahical_2_name')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">Vehicle No.</label>
                                    <input type="text" class="form-control @error ('vahical_2_no') is-invalid @enderror"  name="vahical_2_no" id="vahical_2_no" value="<?php if(!empty($data)){echo $data->vahical_2_no; } ?>">
                                    @error('vahical_2_no')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">RFID</label>
                                    <input type="text" class="form-control @error ('rfid_2') is-invalid @enderror"  name="rfid_2" id="rfid_2" value="<?php if(!empty($data)){echo $data->rfid_2; } ?>">
                                    @error('rfid_2')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                
                                <h4>Vahical: 3</h4>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label"> Vehicle Name</label>
                                    <input type="text" class="form-control @error ('vahical_3_name') is-invalid @enderror"  name="vahical_3_name" id="vahical_3_name" value="<?php if(!empty($data)){echo $data->vahical_3; } ?>">
                                    @error('vahical_3_name')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">Vehicle No.</label>
                                    <input type="text" class="form-control @error ('vahical_3_no') is-invalid @enderror"  name="vahical_3_no" id="vahical_3_no" value="<?php if(!empty($data)){echo $data->vahical_3_no; } ?>">
                                    @error('vahical_3_no')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label"> RFID</label>
                                    <input type="text" class="form-control @error ('rfid_3') is-invalid @enderror"  name="rfid_3" id="rfid_3" value="<?php if(!empty($data)){echo $data->rfid_3; } ?>">
                                    @error('rfid_3')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"><?php if(!empty($data)){echo 'Update';} else{ echo 'Register'; } ?></button>
                                </div>
                            </form>
        				</div>
                    </div>
                </div>
			</div>
		</div>
	</section>
@endsection
