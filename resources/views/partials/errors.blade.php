@push('head')
    @jquery
    @toastr_css
    @toastr_js
@endpush

@toastr_render

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <span class="text-danger">{{ $error }}</span>
    @endforeach
@endif --}}

{{-- @if (Session::has('success'))
    <div class="container pt-3">
        <div class="mb-3 msg-success">
            <p class="alert alert-success alert-dismissible">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        </div>
    </div>
@endif --}}


@if (count($errors->all()))
    @foreach ($errors->all() as $error)
        <div class="mt-5">
            <script>
                toastr.error('{{ $error }}');
            </script>
        </div>
    @endforeach
@endif
