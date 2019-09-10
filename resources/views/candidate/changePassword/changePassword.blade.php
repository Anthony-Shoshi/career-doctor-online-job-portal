@extends('dashboard.layouts.master')

@section('content')

<div class="col-lg-6 col-xl-6">
					<div class="password_change_form">
						<h4>Change Password</h4>
						<form action={{route('candidateUpdatePassword')}} method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{auth::user()->id}}">       
							<div class="form-group">
						    	<label>Old Password</label>
                                <input type="password" name="oldPassword" value="{{old('oldPassword')}}" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="*******">
                                @error('oldPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
							</div>
							<div class="form-group">
						    	<label>New Password</label>
						    	<input type="password" name="newPassword" value="{{old('newPassword')}}" class="form-control @error('newPassword') is-invalid @enderror" placeholder="*******">
                                @error('newPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
							<div class="form-group">
						    	<label>Confirm Password</label>
						    	<input type="password" name="confirmPassword" value="{{old('confirmPassword')}}" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="*******">
                                @error('confirmPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
							<button type="submit" class="btn btn-thm">Save Changes</button>
						</form>
					</div>
				</div>

@endsection