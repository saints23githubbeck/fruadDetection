<div class="modal fade" id="viewUser-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">user details</h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-capitalize"><span class="text-bold"> name : </span> {{$user->first_name.' '.$user->$user}}
                                    <br><span class="text-bold"> email :
                          </span> {{$user->email}}   <br><span class="text-bold"> phone : </span> {{$user->contact}}</p>
                                <p class="text-capitalize">
                                    <span class="text-bold">Added date :</span> {{$user->created_at->format('D-d-M-Y')}}</p>


                            </div>
                            <div class="col-md-6">
                                <p class="text-capitalize">
                                    <span class="text-bold"> image : </span> <img class="img-fluid" alt="customer image" src="/images/logo.png"  width="100">
                                    <br><span class="text-bold"> Operate From  : </span> {{$user->storeUser->store->location ?? 'Belong To No store'}}
                                </p>

                            </div>
                        </div>


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