<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">Add user </h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <p class="login-box-msg text-capitalize">Sign up here</p>

                        <form method="POST" action="{{route('user.store')}}" >
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name"  placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <select id="country"  class="form-control @error('country') is-invalid @enderror" name="country">

                                        <option value=""><--country --></option>
                                        <option value="ghana">ghana</option>
                                        <option value="usa">usa</option>
                                        <option value="canada">canada</option>


                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-store"></span>
                                        </div>
                                    </div>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <input id="number" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                           value="{{ old('number') }}" placeholder="Your Contact" required autocomplete="number">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group ">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" placeholder="Enter Password" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Your Password" name="password_confirmation" required
                                           autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>

                                </div>

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    @foreach (App\Models\Role::all() as $role)

                                        <div class="col-md-2 col-sm-2 col-4">
                                            <label class="switch checkbox-inline">
                                                <input type="checkbox" name="roles[{{$role->id}}]" @if(isset($user) && in_array($role->id,role_name($user))) checked @endif>
                                                <span class="slider round"></span>

                                            </label>
                                            <p>{{$role->name}}</p>
                                        </div>


                                    @endforeach
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>



                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-primary">Save</button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                                    </div>



                        </form>
                        <p class="mb-0 offset-2">
                            <a href="{{ route('login')}}" class="text-center">Already Have An Accounts Sign-In</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection