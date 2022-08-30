<div>
    <div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" role="dialog"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">
                        {{$modal_title}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @switch($modal_type)
                    @case('create')
                        @include('admin.product_category.partials.create-form')
                        @break
                    @case('edit')
                        @include('admin.product_category.partials.edit-form')
                        @break
                    @case('show')
                        @include('admin.product_category.partials.details-form')
                        @break
                    @default
                        @break
                @endswitch
            </div>
        </div>

    </div>