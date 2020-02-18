<div class="modal about-modal w3-agileits fade" id="myModal3" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-page "><!-- login-page -->
                <div class="login-top sign-top">
                  <div class="agileits-login">
                  <h5>Register</h5>
                  <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus/>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required=""/>

                                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                  @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="password" type="password" name="password" placeholder="Password" required=""/>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>


                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required=""/>
                    <div class="wthree-text">
                      <ul>
                        <li>
                          <label class="anim">
                            <input type="checkbox" class="checkbox">
                            <span> I accept the terms of use</span>
                          </label>
                        </li>
                      </ul>
                      <div class="clearfix"> </div>
                    </div>
                    <div class="w3ls-submit">
                      <input type="submit" value="Register">
                    </div>
                  </form>

                  </div>
                </div>
          </div>
      </div> <!-- //login-page -->
    </div>
  </div>
