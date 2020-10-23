@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Update Contact</h2>
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
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('contact.update',$contact->id) }}">

										@csrf
										@method('PUT')

										<input type="hidden" name="id" value="{{ $contact->id }}">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="location">Location
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="location" id="location" class="form-control @error('location') is-danger @enderror" value=" {{$contact->location}}">

												@error('location')
													<p class="help is-danger">{{ $errors->first('location') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" name="email" id="email" class="form-control @error('email') is-danger @enderror" value="{{$contact->email}}">

												@error('email')
													<p class="help is-danger">{{ $errors->first('email') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('address') is-danger @enderror" name="address" id="address" rows="3">{{$contact->address}}</textarea>

											    @error('address')
												<p class="help is-danger">{{ $errors->first('address') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="phone" id="phone" class="form-control @error('phone') is-danger @enderror" value="{{$contact->phone}}">

												@error('phone')
													<p class="help is-danger">{{ $errors->first('phone') }}</p>
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