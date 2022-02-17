


    <div class="modal fade" id="editUser-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">update user Information </h5>
                    <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card">
                        <div class="card-body">

                            <p class="login-box-msg text-capitalize">Sign up here</p>

                            <form method="POST" action="{{route('user.update',$user->id)}}"   enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name"  placeholder="First Name" value="{{ old('first_name',$user->first_name) }}" required autocomplete="first_name" autofocus>
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
                                               name="last_name" placeholder="Last Name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" autofocus>
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
                                               value="{{ old('email',$user->email) }}" placeholder="Email Address" required autocomplete="email">
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

                                {{--{{$user}}--}}
                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="store_id"  class="form-control @error('store_id') is-invalid @enderror" name="store_id">
                                            <option value="">{{$user->country}}</option>


                                            <option value=""><--country --></option>
                                            <option value=""><--country --></option>
                                            <option value=""><--country --></option>
                                            <option value=""><--country --></option>

                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-store"></span>
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
                                        <input id="number" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                               value="{{ old('contact',$user->contact) }}" placeholder="Your Contact" required autocomplete="number">
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
                                               name="password" placeholder="Enter Password" value="{{ old('password',$user->password) }}"  autocomplete="new-password">
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
                                        <input id="password-confirm" type="password" value="{{ old('password',$user->password) }}"  class="form-control" placeholder="Confirm Your Password" name="password_confirmation"
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
                                        @foreach ($roles as $role)

                                            <div class="col-md-2 col-sm-2 col-4">
                                                <label class="switch checkbox-inline">
                                                    <input type="checkbox" name="roles[{{$role->id}}]" @if(isset($user)) checked @endif>
                                                    <span class="slider round"></span>

                                                </label>
                                                <p>{{$role->name}}</p>
                                            </div>


                                        @endforeach

                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                                </div>



                            </form>
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .css({'background': 'url('+e.target.result+') center center no-repeat','background-size':'cover'});
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection