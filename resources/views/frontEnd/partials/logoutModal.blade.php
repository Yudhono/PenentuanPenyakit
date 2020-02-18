<div class="modal about-modal w3-agileits fade" id="myModal4" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-page "><!-- login-page -->
                <div class="login-top sign-top">
                  <div class="agileits-login">
                  <h5>Are You Sure Want To Logout?</h5>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="w3ls-submit">
                      <input type="submit" value="logout">
                    </div>
                  </form>

                  </div>
                </div>
          </div>
      </div> <!-- //login-page -->
    </div>
  </div>
