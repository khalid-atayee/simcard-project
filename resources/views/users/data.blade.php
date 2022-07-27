@can('create-users')
    

<button id="btn-user" onclick="backtoMain('{{ route('users.inputFields') }}','get','main-container')" class="btn btn-success m-btn m-btn--icon m-btn--wide">
    <span>
        <i class="fa flaticon-profile-1"></i>
        <span>ایجاد یوزر</span>
    </span>
</button>


<br>
@endcan
<table id="main-table" class="table table-bordered m-table">
    <thead>

        <tr>

            <th scope="row">#</th>
            <th scope="row">اسم</th>
            <th scope="row">ایمیل</th>
            <th scope="row">رول</th>
            <th scope="row " >صلاحیت</th>
            @can('remove-user')
                
            <th scope="row">حذف</th>
            @endcan


        </tr>



    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button type="button"
                        onclick="assignRoleToUser('{{ route('user.assignRoleToUser', $user->id) }}','get')"
                        id="userRole" class="btn btn-success  m-btn m-btn--icon m-btn--wide">رول</button>
                </td>
                <td>
                    <button type="button" onclick="assignPermissionToUser('{{ route('user.assignPermissionToUser',$user->id) }}','get')"  id="userPermission"
                        class="btn btn-primary  m-btn m-btn--icon m-btn--wide" disabled>صلاحیت</button>
                </td>
                @can('remove-user')
                    
                
                <td>
                    <button type="button" onclick="deleteUser('{{ route('user.delete', $user->id) }}','delete')"
                        id="userDelete" class="btn btn-danger m-btn m-btn--icon m-btn--wide">حذف</button>
                        
                    </td>
                    @endcan
            </tr>
        @endforeach


    </tbody>
</table>
