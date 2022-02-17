<div class="modal fade " id="blockUser-{{$transaction->user->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog success-modal-content modal-dialog-centered" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">You Are About To @if($transaction->user->status ==0) Unblock @else Block @endif
                    <span class="text-info status badge-circle"> {{ucwords($transaction->user->first_name.' '.$transaction->user->first_name)}}</span></h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="success-message flex">
                    <p class="item-title"><i class="fas fa-exclamation-triangle rounded-circle p-3 text-white" style="background-color: red"></i>
                        <span class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder text-dark">
                            Are Sure You Want To   @if($transaction->user->status ==0) Unblock @else Block @endif This Client ?
                        </span></p>
                </div>
            </div>
            <div class="modal-footer">
                @if($transaction->user->status ==0)
                <form  action="{{route('user.unblock',$transaction->user->id)}}"   method="post">
                    @method('PATCH')
                    @csrf

                    <button type="submit" class="btn text-danger  btn-outline-primary">UnBlock</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                </form>
                @else
                    <form  action="{{route('user.block',$transaction->user->id)}}"   method="post">
                        @method('PATCH')
                        @csrf

                        <button type="submit" class="btn text-danger  btn-outline-primary">Block</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
