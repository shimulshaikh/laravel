@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Update Form</h2>
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
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('contactForm.update',$contactForm->id) }}">

										@csrf
										@method('PUT')


										<input type="hidden" name="id" value="{{ $contactForm->id }}">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="name" id="name" class="form-control @error('name') is-danger @enderror" value="{{$contactForm->name}}">

												@error('name')
													<p class="help is-danger">{{ $errors->first('name') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" name="email" id="email" class="form-control @error('email') is-danger @enderror" value="{{ $contactForm->email }}">

												@error('email')
													<p class="help is-danger">{{ $errors->first('email') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Subject
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="subject" name="subject" id="subject" class="form-control @error('subject') is-danger @enderror" value="{{ $contactForm->subject }}">

												@error('subject')
													<p class="help is-danger">{{ $errors->first('subject') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="messageForm">Message Form
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('messageForm') is-danger @enderror" name="messageForm" id="messageForm" rows="3">{{ $contactForm->messageForm }}</textarea>

											    @error('messageForm')
												<p class="help is-danger">{{ $errors->first('messageForm') }}</p>
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