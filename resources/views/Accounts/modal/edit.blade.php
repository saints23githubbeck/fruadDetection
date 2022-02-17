
<div class="modal fade" id="editAccount-{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Account  </h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('account.update',$account) }}" method="POST" >
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <div class="row w-100 p-2">
                                    <div class="col-md-6 mb-4 pl-0 ">
                                        <label for="accountType_id">Account Types</label>
                                        <select name="accountType_id" id="accountType_id" class="form-control" required>
                                            <option value="" selected>{{$account->accountType->name}}</option>
                                            @foreach($accountTypes as $accountType)
                                                <option value="{{ $accountType->id }}">{{ $accountType->name }}</option>
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
                                               placeholder="Amount" value="{{ old('amount',$account->amount) }}">
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                        @enderror
                                    </div>
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
</div>



@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection