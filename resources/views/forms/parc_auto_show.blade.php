<dl>
    <dd style="text-align: center"><img class="show_photo" src="" height="200"></dd>
    <dt>Marque</dt>
    <dd class="show_marque"></dd>

    <dt>Modèle</dt>
    <dd class="show_modele"></dd>

    <dt>Immatriculation</dt>
    <dd class="show_immatriculation"></dd>

    <dt>Numero de chassis</dt>
    <dd class="show_numchassi"></dd>

    <dt>Couleur</dt>
    <dd class="show_couleur"></dd>

    <dt>Kilométrage</dt>
    <dd class="show_kilometrage"></dd>

    <dt>Date d'immatriculation</dt>
    <dd class="show_dateimmat"></dd>

    <dt>Equipement véhicule</dt>
    <dd class="show_equipement"></dd>
    
</dl>

@push('scripts')
<script>
    $(function () {
        $('.select2').select2();
        show = function(item_id) {
            axios.get('{{ $route }}'+'/' + item_id)
                    .then(function (response) {
                        $.each( response.data, function( key, value ) {
                            $('.show_' + key).text(value);
                        });
                       // $('equipements').text(response.data.equipement)
                     /*     $('.show_equipement').text('');
                        $.each( response.data.equipement, function( value ) {
                            $('.show_equipement').append(value.nom_equipement + "<br/>");
                        }); */ 

                        $('.show_photo').attr('src', response.data.photo);

                        $('#modal-show').modal();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        }
    });
</script>
@endpush