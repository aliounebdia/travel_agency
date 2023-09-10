<x-app-layout>

    <x-slot name="title">{{ $titre_page }}</x-slot>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Attention !</h5>
            @foreach($errors->all() as $error)
                - {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route($route.'.update', [$role]) }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')

                    @include('forms.role_form')

                    <div class="card-footer">
                        <button type="button" class="btn btn-default" onclick="window.location='{{ route($route.'.index') }}'">Annuler</button>
                        <button type="submit" class="btn btn-success float-right">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')

            <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">

    @endpush

    @push('scripts')

            <!-- Toastr -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('js/axios.min.js') }}"></script>

    <script>
        $(function () {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-center"
            };

            @if (\Session::has('success_msg'))
                toastr.success('{{ \Session::get('success_msg') }}');
            @endif

            @if(\Session::has('error_msg'))
                toastr.success('{{ \Session::get('error_msg') }}');
            @endif
        });

    </script>

    @endpush

</x-app-layout>

