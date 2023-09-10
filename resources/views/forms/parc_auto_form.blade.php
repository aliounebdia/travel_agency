<div class="card-body">
    <div class="row form-group">
        <div class="col-md-6">
            <label for="marque">Marque</label>
            <input type="text" class="form-control edit_marque" id="marque" name="marque" placeholder="Marque" autocomplete="off" required>
        </div>
        <div class="col-md-6">
            <label for="modele">Modèle</label>
            <input type="text" class="form-control edit_modele" id="modele" name="modele" placeholder="Modèle" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="immatriculation">Immatriculation</label>
            <input type="text" class="form-control edit_immatriculation" id="immatriculation" name="immatriculation" placeholder="Immatriculation" autocomplete="off">
        </div>
        <div class="col-md-6">
            <label for="numchassis">Numéro de chassis</label>
            <input type="text" class="form-control edit_numchassi" id="numchassi" name="numchassi" placeholder="Numero de chassis" autocomplete="off" required>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control edit_couleur my-colorpicker" id="couleur" name="couleur" placeholder="Couleur" autocomplete="off">
        </div>
        <div class="col-md-6">
            <label for="kilometrage">Kilométrage</label>
            <input type="text" class="form-control edit_kilometrage" id="kilometrage" name="kilometrage" placeholder="Kilometrage" autocomplete="off">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="dateimmat">Date d'immatriculation</label>
            <input type="date" class="form-control edit_dateimmat" id="dateimmat" name="dateimmat" placeholder="Date d'immatriculation" autocomplete="off">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="equipement_id">Equipement(s) du véhicule</label>
            <select name="equipement_id[]" class="form-control select2 edit_equipement" multiple="multiple"
                    data-placeholder="Selectionner les équipements du véhicule" style="width: 100%;" required>
                    @foreach($equipements as $id => $equipement)
                    <option value="{{ $id }}">{{ $equipement }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label>Photo de la carte nationale d'identité</label>
            <input id="photo" name="photo" type="file" class="dropify"
                   data-height="150" data-allowed-file-extensions="jpg jpeg png" />
        </div>
    </div>
</div>

@push('styles')
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

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
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('js/dropify/dist/js/dropify.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

<script>
    $('.select2').select2();
    $('.my-colorpicker').colorpicker()
    // Translated
    $('.dropify').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove:  'Supprimer',
            error:   'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var photoEvent = $('#photo').dropify();

    photoEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Êtes-vous sûr de vouloir supprimer la photo ?");
    });

    photoEvent.on('dropify.afterClear', function(event, element){
        $('#photo_delete').val(1);
    });

    $('.my-colorpicker').colorpicker();

    $('.my-colorpicker').on('colorpickerChange', function(event) {
        $('.my-colorpicker').css('background-color', event.color.toString());
    });

</script>

@endpush

@push('styles')

<link rel="stylesheet" href="{{ asset('js/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

<style>
    .dropify-wrapper .dropify-message span.file-icon {
        font-size: 22px;
        color: #CCC;
    }
</style>

{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />--}}
@endpush