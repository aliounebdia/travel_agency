<x-app-layout>
    @can('Ajouter '.$permission)
    <x-slot name="btn_create">
        <a href="{{ route($route.'.create') }}" type="button" class="btn btn-primary bg-gradient-primary">
            <i class="fa fa-plus"></i> Ajouter un rôle
        </a>
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
                                <td>{{ $value->name }}</td>
                                {{--<td>--}}
                                    {{--@foreach($value->permissions as $key => $permission)--}}
                                        {{--{{ $key > 0 ? '|' : ''; }}--}}
                                        {{--{{ $permission->name }}--}}
                                    {{--@endforeach--}}
                                {{--</td>--}}
                                <td width="196">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm" onclick="show('{{ $value->id }}')">
                                            <i class="fas fa-eye"></i>&nbsp; Afficher
                                        </button>
                                        @can('Modifier '.$permission)
                                        <a href="{{ route($route.'.edit', [$value]) }}"
                                           type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-pen"></i>&nbsp; Modifier
                                        </a>
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
        <div class="modal-dialog modal-lg">
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
        <div class="modal-dialog modal-lg">
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

    @push('styles')

    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .td_perm {
            padding: 6px 5px !important;
        }
    </style>

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
                $('input').val('');
            });
        });

        function show(item_id) {
            axios.get('{{ $route }}'+'/' + item_id)
                .then(function (response) {
                    $('.show_name').text(response.data.name);

                    $('.show_permissions').text('');
                    let categ = "";
                    let table = "";
                    $.each( response.data.permissions, function( key, value ) {
                        if (categ != value.categorie && categ == "") {
                            table += "<tr><td class='td_perm'>" + value.name + "</td>";
                        }
                        else if(categ != value.categorie) {
                            table += "</tr><tr><td class='td_perm'>" + value.name + "</td>";
                        }
                        else {
                            table += "<td class='td_perm'>" + value.name + "</td>";
                        }

                        if (response.data.permissions.length == key+1) {
                            table += "</tr>";
                        }
                        categ = value.categorie;
                    });
                    $('.show_permissions').append(table);

                    $('#modal-show').modal();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        @can('Supprimer '.$permission)
        function destroy(item_id, route) {
            axios.get('{{ $route }}'+'/' + item_id)
                .then(function (response) {
                    $('.show_name').text(response.data.name);

                    $('.show_permissions').text('');
                    let categ = "";
                    let table = "";
                    $.each( response.data.permissions, function( key, value ) {
                        if (categ != value.categorie && categ == "") {
                            table += "<tr><td class='td_perm'>" + value.name + "</td>";
                        }
                        else if(categ != value.categorie) {
                            table += "</tr><tr><td class='td_perm'>" + value.name + "</td>";
                        }
                        else {
                            table += "<td class='td_perm'>" + value.name + "</td>";
                        }

                        if (response.data.permissions.length == key+1) {
                            table += "</tr>";
                        }
                        categ = value.categorie;
                    });
                    $('.show_permissions').append(table);

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

