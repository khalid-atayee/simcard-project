@foreach ($users as  $user)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td><button type="button" value="" id="userRole" class="btn btn-success  m-btn m-btn--icon m-btn--wide">رول</button></td>
</tr>
    
@endforeach