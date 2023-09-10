<dl>
    <dt>Nom de L'Equipement</dt>
    <dd class="show_nom"></dd>
    <dt>Type Equipement</dt>
    <dd class="show_type"></dd>
  
</dl>

@push('scripts')
<script>
    $(function () {
        $('.select2').select2();

        show = function(item_id) {
            axios.get('{{ $route }}'+'/' + item_id)
                    .then(function (response) {
                        $('.show_nom').text(response.data.nom_equipement);
                        $('.show_type').text(response.data.type_equipement);

                    

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
                        $('.show_nom').text(response.data.nom_equipement);
                        $('.show_type').text(response.data.type_equipement);

                     

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