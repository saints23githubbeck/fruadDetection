
    <div class="modal fade" id="addAccType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">Add Account Type </h5>
                    <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">


                            <form action="{{ route('account.type.store') }}" method="post" >
                                @csrf
                                <div class="form-row">
                                    <div class="row w-100 p-2">
                                        <div class="col-md-6 mb-4 pl-0 ">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                                   placeholder="Name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-4 pl-0">
                                            <label for="description">Description</label>
                                            <textarea name="description" maxlength="50" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror"
                                                      id="description">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                            @enderror
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