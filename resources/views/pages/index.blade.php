<x-app-layout>
    @can('Ajouter '.$permission)
    <x-slot name="btn_create">
        <button type="button" class="btn btn-primary bg-gradient-primary" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus"></i> {{ $btn_ajout }}
        </button>
    </x-slot>
    @endcan

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
                <div class="card-header">
                    <h3 class="card-title">{{ $titre_page }}</h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            @foreach($table_headers as $header)
                                <th>{{ $header }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($liste as $value)
                            <tr>
                                @foreach($table_columns as $column)
                                    <td>{{ $value->$column }}</td>
                                @endforeach

                                <td width="196">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm" onclick="show('{{ $value->id }}')">
                                            <i class="fas fa-eye"></i>&nbsp; Afficher
                                        </button>
                                        @can('Modifier '.$permission)
                                        <button type="button" class="btn btn-default btn-sm"
                                                onclick="edit('{{ $value->id }}', '{{ route($route.'.update', [$value]) }}')">
                                            <i class="fas fa-pen"></i>&nbsp; Modifier
                                        </button>
                                        @endcan
                                        @can('Supprimer '.$permission)
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item btn-sm"
                                                        onclick="destroy('{{ $value->id }}', '{{ route($route.'.destroy', [$value]) }}')">
                                                    <i class="fas fa-trash"></i>&nbsp; Supprimer
                                                </button>
                                            </div>
                                        </div>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-show">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Détails</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('forms.'.$show)
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    @can('Supprimer '.$permission)
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Êtes-vous sûr de vouloir supprimer cet enregistrement ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('forms.'.$show)
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <form id="delete_form" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('Ajouter '.$permission)
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $btn_ajout }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route($route.'.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @include('forms.'.$form)
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('Modifier '.$permission)
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_form" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        @include('forms.'.$form)
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @push('styles')

    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    @endpush

    @push('scripts')

    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('js/axios.min.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#modal-edit').on('hidden.bs.modal', function() {
                $('.modal-body :input').val('');
            });
        });

        function show(item_id) {
            axios.get('{{ $route }}'+'/' + item_id)
                .then(function (response) {
                    $.each( response.data, function( key, value ) {
                        $('.show_' + key).text(value);
                    });

                    $('#modal-show').modal();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        @can('Modifier '.$permission)
        function edit(item_id, route) {
            axios.get('{{ $route }}'+'/' + item_id)
                .then(function (response) {
                    $.each( response.data, function( key, value ) {
                        $('.edit_' + key).val(value);
                    });

                    $('#edit_form').attr('action', route);

                    $('#modal-edit').modal();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        @endcan

        @can('Supprimer '.$permission)
        function destroy(item_id, route) {
            axios.get('{{ $route }}'+'/' + item_id)
                .then(function (response) {
                    $.each( response.data, function( key, value ) {
                        $('.show_' + key).text(value);
                    });

                    $('#delete_form').attr('action', route);

                    $('#modal-delete').modal();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        @endcan

    </script>

    @endpush

</x-app-layout>

