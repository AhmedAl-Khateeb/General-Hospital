<!-- Modal -->
<div class="modal fade" id="delete_select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('dashboard.Doctors Delete Select') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5>{{ __('dashboard.Are you sure you want to delete the selected doctors?') }}</h5>
                    <input type="hidden" id="delete_select_id" name="ids" value=''>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('dashboard.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('dashboard.Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
