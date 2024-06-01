@section("title", "JUDUL")
@extends("template.main")
@section("body")
	<!--================Registration Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">

				<div class="col-lg-12">
					<div class="login_form_inner">
						<h3>Forgot Password</h3>
                        <p>Input your email that have been registred</p>
                        @include("Template.alert")
						<form class="row login_form" action="{{route('forgotpasswordact')}}" method="post" id="contactForm">
                            @csrf
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn" href = "/">Continue</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@endsection
