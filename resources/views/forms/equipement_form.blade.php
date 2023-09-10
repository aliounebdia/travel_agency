<div class="card-body">
    <div class="row form-group">
        <div class="col-md-12">
            <label for="nom_equipement">Nom de l'équipement</label>
            <input type="text" class="form-control nom_equipement" id="nom_equipement" name="nom_equipement" placeholder="Nom equipement" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="type_equipement">Type de l'équipement</label>
            <input type="text" class="form-control type_equipement" id="type_equipement" name="type_equipement" placeholder="Type equipement" autocomplete="off" required>
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

       

        @can('Modifier '.$permission)
        edit = function (item_id, route) {
            axios.get('{{ $route }}' + '/' + item_id)
                    .then(function (response) {
                        let techs = [];

                        $('.nom_equipement').val(response.data.nom_equipement);
                        $('.type_equipement').val(response.data.type_equipement);


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