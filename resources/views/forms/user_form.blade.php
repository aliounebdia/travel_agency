<div class="card-body">
    <div class="row form-group">
        <div class="col-md-6">
            <label for="prenom">Prénom(s)</label>
            <input type="text" class="form-control edit_prenom" id="prenom" name="prenom" placeholder="Prénom(s)" autocomplete="off" required>
        </div>
        <div class="col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control edit_nom" id="nom" name="nom" placeholder="Nom" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="email">Adresse email</label>
            <input type="email" class="form-control edit_email" id="email" name="email" placeholder="Adresse email" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" autocomplete="off">
        </div>
        <div class="col-md-6">
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Mot de passe" autocomplete="off">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="role_id">Rôle de l'utilisateur</label>
            <select name="role_id" class="form-control select2 edit_role"
                    data-placeholder="Selectionner le rôle de l'utilisateur" style="width: 100%;" required>
                <option value="">-- Choisir le rôle --</option>
                @foreach($roles as $id => $role)
                    <option value="{{ $id }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@push('styles')

<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #006fe6;
        color: #fff;
        padding: 0 10px;
        margin-top: 0.31rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: rgba(255,255,255,.7);
        float: right;
        margin-left: 5px;
        margin-right: -2px;
    }
    .select2-container .select2-selection--single {
        height: auto !important;
    }
</style>
@endpush

@push('scripts')

<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function () {
        $('.select2').select2();

        $('#modal-edit').on('hidden.bs.modal', function() {
            $('.edit_role').val('').trigger('change');
        });

        @can('Modifier '.$permission)
        edit = function (item_id, route) {
            axios.get('{{ $route }}' + '/' + item_id)
                    .then(function (response) {
                        $.each( response.data, function( key, value ) {
                            $('.edit_' + key).val(value);
                        });
                        $('.edit_role').val(response.data.role_id).trigger('change');

                        $('#edit_form').attr('action', route);

                        $('#modal-edit').modal();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        };
        @endcan
    });

</script>

@endpush