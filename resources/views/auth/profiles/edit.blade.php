@extends('layouts.admin')

@section('title', 'My Information')
@section('content-header', 'My Information')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row ">

                {{--{{dd(Storage::url(auth()->user()->image))}}--}}
                <div class="col-md-7 offset-2">

                    <p class="login-box-msg text-capitalize">Update Your information</p>

                    <form method="POST" action="{{route('user.profile.update')}}"   enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @if(auth()->user()->image)
                            <div class="col-md-8 offset-md-5 mt-3" style="height: 120px; width: 120px">
                                <div id="blah" class="rounded-circle align-lg-center mx-auto"  style=" background: url('{{Storage::url(auth()->user()->image)}}') center center no-repeat;background-size: cover;height: 120px; width: 120px">

                            </div>
                        @else
                            <div class="col-md-8 offset-md-2 mt-3" style="height: 120px; width: 120px">
                                <div  id="blah" class="rounded-circle align-lg-center mx-auto"  style=" background: url('{{asset('/images/logo.png')}}') center center no-repeat; background-size: cover;height: 120px; width: 120px">

                                </div>
                                @endif
                            </div>
                            <div class="form-group col-md-8 offset-md-2 text-center mt-3">
                                <input type="file" id="selectedFile" name="image" onchange="readURL(this);" style="display: none;"/>
                                <input type="button" class="btn btn-outline-primary" id="update-btn" value="change Image"
                                       onclick="document.getElementById('selectedFile').click();"/>
                            </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name"  placeholder="First Name" value="{{ old('first_name',auth()->user()->first_name) }}" required autocomplete="first_name" autofocus>
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
                                       name="last_name" placeholder="Last Name" value="{{ old('last_name',auth()->user()->last_name) }}" required autocomplete="last_name" autofocus>
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
                                       value="{{ old('email',auth()->user()->email) }}" placeholder="Email Address" required autocomplete="email">
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
                                <input id="number" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                       value="{{ old('contact',auth()->user()->contact) }}" placeholder="Your Contact" required autocomplete="number">
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
                                       name="password" placeholder="Enter Password" value="{{ old('password') }}"  autocomplete="new-password">
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
                                <input id="password-confirm" type="password" value="{{ old('password') }}"  class="form-control" placeholder="Confirm Your Password" name="password_confirmation"
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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>



                    </form>
                </div>
                
            </div>

        </div>
    </div>





@endsection
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