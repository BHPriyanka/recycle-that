@include('header')
		<div id="fh5co-services-section" class="border-bottom">
			<div class="container">
        <h1 class="text-center">Login</h1>
        <form class="form-vertical" action="<?php echo URL::route('login') ?>/mode=simulation">
          <div class="form-group col-lg-9 col-lg-offset-3">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-6 input-group"><span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
          </div>
          <div class="form-group col-lg-9 col-lg-offset-3">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-6 input-group"><span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group col-lg-9 col-lg-offset-3">
            <div class="col-sm-offset-2 col-sm-8">
              <button type="submit" class="btn btn-success">Sign in</button>
            </div>
          </div>
        </form>
      </div>
@include('footer')