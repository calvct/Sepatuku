@section("title", "JUDUL")
@extends("template.main")
@section("body")
	<!--================Registration Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
            @include("Template.alert")
				<div class="col-lg-12">
					<div class="login_form_inner">
						<h3>Create Account</h3>
						<form class="row login_form" action="{{route('PostRegister')}}" method="post" id="contactForm">
                            @csrf
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

@endsection
