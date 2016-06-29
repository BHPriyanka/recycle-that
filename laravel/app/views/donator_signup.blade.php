@include('header')
		<div id="fh5co-services-section" class="border-bottom">
			<div class="container">
                <h1 class="text-center">Sign up as a Donator!</h1>
                <form action="<?php echo URL::Route('dashboard');?>" class="form-vertical">
                <input type="hidden" name="usertype" value="donator">
				<div class="col-md-8 col-lg-offset-3">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                    <div class="input-address col-sm-6 input-group">
					<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>  
                      <input type="text" class="form-control" id="inputStreet" placeholder="Street">
                      <input type="text" class="form-control" id="inputCity" placeholder="City">
                      <input type="text" class="form-control" id="inputState" placeholder="State">
                      <input type="text" class="form-control" id="inputZipcode" placeholder="Zip Code">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                  </div>
				  </div>
                </form>
            </div>
@include('footer')

