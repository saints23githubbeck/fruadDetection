
    <div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">Add Account </h5>
                    <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">


                            <form action="{{ route('account.store') }}" method="post" >
                                @csrf
                                <div class="form-row">
                                    <div class="row w-100 p-2">
                                        <div class="col-md-6 mb-4 pl-0 ">
                                            <label for="accountType_id">Account Type</label>
                                            <select name="accountType_id" class="form-control @error('accountType_id') is-invalid @enderror" id="accountType_id" required>
                                                <option value="">--Select Acountt Type--</option>
                                                @foreach($accountTypes as $cat)
                                                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('accountType_id')
                                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-4 pl-0 ">
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount"
                                                   placeholder="Amount" value="{{ old('amount') }}" required>
                                            @error('amount')
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