@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Create Customer Detail</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br>
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('customerDetali.store') }}">

										@csrf


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="firstName" class="form-control @error('firstName') is-danger @enderror" value="{{ old('firstName') }}">

												@error('firstName')
													<p class="help is-danger">{{ $errors->first('firstName') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Last Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="lastName" class="form-control @error('lastName') is-danger @enderror" value="{{ old('lastName') }}">

												@error('lastName')
													<p class="help is-danger">{{ $errors->first('lastName') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Company Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="companyName" class="form-control" value="{{ old('companyName') }}">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="phone" class="form-control @error('phone') is-danger @enderror" value="{{ old('phone') }}">

												@error('phone')
													<p class="help is-danger">{{ $errors->first('phone') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" name="email" class="form-control @error('email') is-danger @enderror" value="{{ old('email') }}">

												@error('email')
													<p class="help is-danger">{{ $errors->first('email') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="country" class="form-control" value="{{ old('country') }}">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('address1') is-danger @enderror" name="address1" id="address1" rows="3">{{ old('address1') }}</textarea>

											    @error('address1')
												<p class="help is-danger">{{ $errors->first('address1') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 2
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('address2') is-danger @enderror" name="address2" id="address2" rows="3">{{ old('address2') }}</textarea>

											    @error('address2')
												<p class="help is-danger">{{ $errors->first('address2') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Town
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="town" class="form-control @error('town') is-danger @enderror" value="{{ old('town') }}">

												@error('town')
													<p class="help is-danger">{{ $errors->first('town') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">District
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="district" class="form-control @error('district') is-danger @enderror" value="{{ old('district') }}">

												@error('district')
													<p class="help is-danger">{{ $errors->first('district') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Post Code
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="postCode" class="form-control @error('postCode') is-danger @enderror" value="{{ old('postCode') }}">

												@error('postCode')
													<p class="help is-danger">{{ $errors->first('postCode') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Other Notes
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('otherNotes') is-danger @enderror" name="otherNotes" id="otherNotes" rows="3">{{ old('otherNotes') }}</textarea>

											    @error('otherNotes')
												<p class="help is-danger">{{ $errors->first('otherNotes') }}</p>
												@enderror
											</div>
										</div>
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>


@endsection