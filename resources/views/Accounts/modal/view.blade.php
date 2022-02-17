<div class="modal fade" id="viewAccount-{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Account  details</h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body text-capitalize">
                      <p><span class="text-bold">Current balance :</span> {{$account->amount}}</p>
                      <p><span class="text-bold">Description :</span> {{$account->accountType_id}}</p>
                      <p><span class="text-bold">Added By :</span> {{$account->user->first_name.' '.$account->user->last_name}}</p>
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