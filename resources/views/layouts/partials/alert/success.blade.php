
<h4 class="shadow-dodger-blue mt-2 shadow-lg">
    @if (Session::has('success'))
        <div class="alert alert-success bg-success alert-dismissible fade show flash-message text-white text-xl-center" id ="flash-message" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</h4>