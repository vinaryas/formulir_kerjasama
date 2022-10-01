<div id="list_permission">
    @php
    $permissionService = new App\Services\Rbac\PermissionService();
    echo $permissionService->showPermission($role_id);
    @endphp
</div>

<script>
    $('#list_permission').jstree({
        "checkbox" : {
            "keep_selected_style" : false
        },
        "plugins" : [ "checkbox" ],
        "core":{
            "themes": {
                "icons": false
            }
        }
    });
</script>