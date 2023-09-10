<dl>
    <dt>Nom</dt>
    <dd class="show_nom"></dd>
    <dt>Leader</dt>
    <dd class="show_leader"></dd>
    <dt>Membres</dt>
    <dd class="show_techniciens"></dd>
</dl>

@push('scripts')
<script>
    $(function () {
        $('.select2').select2();

        show = function(item_id) {
            axios.get('{{ $route }}'+'/' + item_id)
                    .then(function (response) {
                        $('.show_nom').text(response.data.nom);
                        $('.show_leader').text(response.data.nom_contact_leader);

                        $('.show_techniciens').text('');
                        $.each( response.data.techniciens, function( key, value ) {
                            $('.show_techniciens').append(key+1 + " - " + value.nom_contact + "<br/>");
                        });

                        $('#modal-show').modal();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        };

        @can('Supprimer '.$permission)
        destroy = function (item_id, route) {
            axios.get('{{ $route }}'+'/' + item_id)
                    .then(function (response) {
                        $('.show_nom').text(response.data.nom);
                        $('.show_leader').text(response.data.nom_contact_leader);

                        $('.show_techniciens').text('');
                        $.each( response.data.techniciens, function( key, value ) {
                            $('.show_techniciens').append(key+1 + " - " + value.nom_contact + "<br/>");
                        });

                        $('#delete_form').attr('action', route);

                        $('#modal-delete').modal();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        };
        @endcan
    });
</script>
@endpush