<div class="card-body">
    <div class="row form-group">
        <div class="col-md-12">
            <label for="nom">Nom de l'équipe</label>
            <input type="text" class="form-control edit_nom" id="nom" name="nom" placeholder="Nom" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="leader_id">Chef de l'équipe</label>
            <select name="leader_id" class="form-control select2 edit_leader"
                    data-placeholder="Selectionner le technicien chef" style="width: 100%;" required>
                <option value="">-- Choisir le chef d'équipe --</option>
                @foreach($techniciens as $id => $technicien)
                    <option value="{{ $id }}">{{ $technicien }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="technicien_id">Membres de l'équipe</label>
            <select name="technicien_id[]" class="form-control select2 edit_techniciens" multiple="multiple"
                    data-placeholder="Selectionner les techniciens" style="width: 100%;" required>
                @foreach($techniciens as $id => $technicien)
                    <option value="{{ $id }}">{{ $technicien }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@push('styles')

<!-- Select2 -->
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
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function () {

        $('#modal-show').on('open.bs.modal', function() {

        });

        $('#modal-edit').on('hidden.bs.modal', function() {
            $('.edit_leader').val('').trigger('change');
            $('.edit_techniciens').val('').trigger('change');
        });

        @can('Modifier '.$permission)
        edit = function (item_id, route) {
            axios.get('{{ $route }}' + '/' + item_id)
                    .then(function (response) {
                        let techs = [];

                        $('.edit_nom').val(response.data.nom);

                        $.each(response.data.techniciens, function( key, value ) {
                            techs.push(value.id);
                        });
                        $('.edit_techniciens').val(techs).trigger('change');
                        $('.edit_leader').val(response.data.leader_id).trigger('change');

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