
                <button id="btn-user" class="btn btn-success m-btn m-btn--icon m-btn--wide">
                    <span>
                        <i class="fa flaticon-profile-1"></i>
                        <span>ایجاد یوزر</span>
                    </span>
                </button>

            
                <br>
                <table id="main-table"  class="table table-bordered m-table">
                    <thead>
                
                        <tr>
                
                            <th scope="row">#</th>
                            <th scope="row">اسم</th>
                            <th scope="row">ایمیل</th>
                            <th scope="row">رول</th>
                            <th scope="row">صلاحیت</th>
                            <th scope="row">حذف</th>
                
                
                        </tr>
                       
                
                
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><button type="button" value="{{ $user->id }}" id="userRole" class="btn btn-success  m-btn m-btn--icon m-btn--wide">رول</button></td>
                            <td><button  type="button" value="{{ $user->id }}"  id="userPermission" class="btn btn-primary  m-btn m-btn--icon m-btn--wide">صلاحیت</button></td>

                            <td>
                                <button  type="button" onclick="deleteUser('{{ route('user.delete') }}','delete','{{ $user->id }}')"  id="userDelete" class="btn btn-danger m-btn m-btn--icon m-btn--wide">حذف</button>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>