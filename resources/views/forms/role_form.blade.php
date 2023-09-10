<div class="card-body">
    <div class="row form-group">
        <div class="col-md-6">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ $role->name ?? old('name') }}"
                   placeholder="Nom" autocomplete="off" required>
        </div>
    </div>

    <hr class="mt-4 mb-3">

    <h4 class="mb-3">Permissions</h4>

    @foreach($categories as $categorie)
        <h5 class="text-capitalize">
            <span class="icheck-default d-inline">
                <input type="checkbox" id="checkbox_{{ $categorie->categorie }}">
                <label for="checkbox_{{ $categorie->categorie }}">
                    {{ $categorie->categorie }}
                </label>
            </span>
        </h5>
        <div class="row form-group">
            @foreach($liste_permissions->where('categorie', $categorie->categorie) as $key => $permission)
                <div class="col-md-3">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                               id="perm_{{ str_slug($permission->name) }}" class="{{ $permission->categorie }}"
                               @if(isset($role) && $role->permissions->contains($permission->id)) checked @endif>
                        <label for="perm_{{ str_slug($permission->name) }}" class="font-weight-normal">
                            {{ $permission->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

@push('styles')

<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

@endpush

@push('scripts')

<script>
    $(function () {
        @foreach($categories as $categorie)
        $('#checkbox_'+'{{ $categorie->categorie }}').click(function () {
            var clicks = $(this).data('clicks');
            if (!$(this).prop('checked')) {
                //Uncheck all checkboxes
                $('.'+'{{ $categorie->categorie }}').prop('checked', false);
            } else {
                //Check all checkboxes
                $('.'+'{{ $categorie->categorie }}').prop('checked', true);
            }
            $(this).data('clicks', !clicks);
        });
        @endforeach

        @foreach($liste_permissions as $key => $permission)
        $('#perm_'+'{{ str_slug($permission->name) }}').click(function () {
            var clicks_perm = $(this).data('clicks');
            let str = '{{ $permission->name }}';

            if ($(this).prop('checked') && str.indexOf('Supprimer') >= 0) {
                $('#checkbox_'+'{{ $permission->categorie }}').prop('checked', true);
                $('#perm_afficher_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
                $('#perm_ajouter_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
                $('#perm_modifier_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
            }
            else if ($(this).prop('checked') && str.indexOf('Modifier') >= 0) {
                $('#perm_afficher_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
                $('#perm_ajouter_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
            }
            else if ($(this).prop('checked') && str.indexOf('Ajouter') >= 0) {
                $('#perm_afficher_'+'{{ str_slug($permission->categorie) }}').prop('checked', true);
            }

            if (!$(this).prop('checked') && str.indexOf('Afficher') >= 0) {
                $('#checkbox_'+'{{ $permission->categorie }}').prop('checked', false);
                $('#perm_ajouter_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
                $('#perm_modifier_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
                $('#perm_supprimer_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
            }
            else if (!$(this).prop('checked') && str.indexOf('Ajouter') >= 0) {
                $('#checkbox_'+'{{ $permission->categorie }}').prop('checked', false);
                $('#perm_modifier_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
                $('#perm_supprimer_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
            }
            else if (!$(this).prop('checked') && str.indexOf('Modifier') >= 0) {
                $('#checkbox_'+'{{ $permission->categorie }}').prop('checked', false);
                $('#perm_supprimer_'+'{{ str_slug($permission->categorie) }}').prop('checked', false);
            }
            else if (!$(this).prop('checked') && str.indexOf('Supprimer') >= 0) {
                $('#checkbox_'+'{{ $permission->categorie }}').prop('checked', false);
            }
            $(this).data('clicks', !clicks_perm);
        });
        @endforeach
    });
</script>

@endpush