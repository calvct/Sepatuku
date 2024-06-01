@section("title", "JUDUL")
@extends("template.main")
@section("body")
	<section class="login_box_area section_gap">
		<div class="container">
            @include("Template.alert")
				<div class="col-lg-12">
					<div class="login_form_inner">
						<h3>Forgot Password</h3>
                        <p>Change your password and remember it!</p>
						<form class="row login_form" action="{{route('PostValidateForgotPass')}}" method="post" id="contactForm">
                            @csrf
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="New password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn" href = "/">Change</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
