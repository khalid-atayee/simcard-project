{{-- <div class="container">
<form id="revoke-form"> --}}
@if ($role->permissions)
@foreach ($role->permissions as $role_permissions)
<tr>
    <td>{{ $loop->index+1 }}</td>
     <td>
        {{ $role_permissions->name }}
        {{-- <input type="text"  id="hidden-Permission-id"class=" btn btn-outline-danger" value="{{ $role_permissions->id }}">
        <input type="text"  id="hidden-role-id"class=" btn btn-outline-danger" value="{{ $role->id }}">
     --}}
    </td>
     <td>  <button id="deletePermission-btn" name="{{ $role_permissions->id }}" class=" btn btn-outline-danger" value="{{ $role->id }}" >حذف صلاحیت</button> </td>
       


</tr>
      
@endforeach
            
@endif 
{{-- </form>
</div> --}}



