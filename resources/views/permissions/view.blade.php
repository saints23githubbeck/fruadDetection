<div class="modal fade" id="viewPermission-{{$permission->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">product details</h5>
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
                                <p class="text-capitalize"><span class="text-bold"> name : </span> {{$permission->name}}
                                    <br><span class="text-bold"> description :
                          </span> {{$permission->description}}</p>
                            </div>
                            <div class="col-md-6">

                                <p class="text-capitalize"><span class="text-bold">Added By :</span> {{$permission->user->first_name.' '.$permission->user->last_name}}
                                    <span class="text-bold">Added date :</span> {{$permission->created_at->format('D-d-M-Y')}}</p>

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