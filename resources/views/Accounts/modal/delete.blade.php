<div class="modal fade " id="deleteAccount-{{$account->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog success-modal-content modal-dialog-centered" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title text-center text-capitalize" id="exampleModalLabel">Delete Account</h5>
                <button type="button" class="btn-close rounded-circle bg-warning text-white" data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="success-message flex">
                    <p class="item-title"><i class="fas fa-exclamation-triangle rounded-circle p-3 text-white" style="background-color: red"></i>
                        <span class="text-capitalize text-xl-center ml-xl-5 font-weight-bolder text-dark">Are Sure You want to delete this Record ?</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <form  action="{{route('account.destroy',$account)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn text-light  btn-outline-primary">Delete</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
