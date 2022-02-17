

    <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">Add role </h5>
                    <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">

                            <form  action="{{route('role.store')}}"  method="POST" >
                                @csrf
                                <div class="form-row">
                                    <div class="row w-100 p-2">
                                        <div class="col-md-12 mb-4 pl-0 ">
                                            <label for="role">Name</label>
                                            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role"
                                                   placeholder="Name" value="{{ old('role') }}" >

                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                            @enderror
                                        </div>


                                        <div class="card-body">
                                            <div class="row">
                                                @if (isset($role))

                                                    @php

                                                        $name = permission_name($role->permissions);
                                                    @endphp

                                                @endif
                                                @foreach ($permissions as $permission)

                                                    <div class="col-md-2 col-sm-2 col-4">
                                                        <label class="switch checkbox-inline">
                                                            <input type="checkbox" name="permission[{{$permission->name}}]"   @if(isset($role) && in_array($permission->name,$name)) checked @endif>
                                                            <span class="slider round"></span>

                                                        </label>
                                                        <p>{{$permission->name}}</p>
                                                    </div>


                                                @endforeach

                                            </div>

                                        </div>




                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">Save</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                                </div>
                            </form>
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