<div class="modal about-modal w3-agileits fade" id="myModal2" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-page "><!-- login-page -->
                <div class="login-top sign-top">
                  <div class="agileits-login">
                  <h5>Login</h5>
                  <form action="{{ route('login') }}" method="POST">
                    <input id="email" type="email" class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus/>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required=""/>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    <div class="wthree-text">
                      
                      <div class="clearfix"> </div>
                    </div>
                    <div class="w3ls-submit">
                      <input type="submit" value="LOGIN">
                    </div>
                  </form>

                  </div>
                </div>
          </div>
      </div> <!-- //login-page -->
    </div>
  </div>
