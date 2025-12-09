<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.add_Service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Service.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="status" value="1">

                    <label for="name_ar">{{__('dashboard.Name')}}(AR)</label>
                    <input type="text" name="name[ar]" id="name[ar]" class="form-control"><br>
                    <label for="name_en">{{__('dashboard.Name')}}(EN)</label>
                    <input type="text" name="name[en]" id="name[en]" class="form-control"><br>

                    <label for="price">{{__('dashboard.Price')}}</label>
                    <input type="number" name="price" id="price" class="form-control"><br>

                    <label for="description_ar">{{__('dashboard.Description')}}(AR)</label>
                    <textarea class="form-control" name="description[ar]" id="description[ar]" rows="5"></textarea>
                    <label for="description_en">{{__('dashboard.Description')}}(EN)</label>
                    <textarea class="form-control" name="description[en]" id="description[en]" rows="5"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('dashboard.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
