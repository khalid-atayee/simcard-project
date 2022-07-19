{{-- @foreach ($users as $user)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td><button class="btn btn-primary  m-btn--md m--margin-right-10">رول</button></td>
    <td><button class="btn btn-primary  m-btn--md m--margin-right-10">صلاحیت</button></td>
    <td><button class="btn btn-primary  m-btn--md m--margin-right-10">حذف</button></td>
</tr>
    
@endforeach --}}
<div class="fordeve">

<form id="userForm" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*اسم:</label>
            <div class="col-lg-6">
                <input type="text" name="name" class="form-control m-input" placeholder="لطفا اسم خود را بنویسید">
                {{-- <span class="m-form__help">Please enter your full name</span> --}}
                <div class="text-danger error" id="error-name"></div>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*ایمیل آدرس:</label>
            <div class="col-lg-6">
                <input type="email" name="email" class="form-control m-input" placeholder="لطفا ایمیل خود را بنویسید">
                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                <div class="text-danger error" id="error-email"></div>

            </div>
        </div>
        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*رمز :</label>
            <div class="col-lg-6">
                <input type="password" name="password" class="form-control m-input" placeholder="لطفا رمز مورد نظرتان را بنویسید">
                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                <div class="text-danger error" id="error-password"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*تاییدی رمز:</label>
            <div class="col-lg-6">
                <input type="password" name="cpassword" class="form-control m-input" placeholder="لطفا رمز خویش راتایید نماید">
                <div class="text-danger error" id="error-cpassword"></div>
               
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*نمبر تماس:</label>
            <div class="col-lg-6">
                <input type="text" name="phone" class="form-control m-input" placeholder="لطفا نمبر تماس خویش را وارد نماید">
                <div class="text-danger error" id="error-phone"></div>
               
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-lg-2 col-form-label">*تصویر خویش را اپلود نماید:</label>
            <div class="col-lg-6">
                <input type="file" name="logo" id="image" class="form-control m-input" >
                <div class="text-danger error" id="error-image"></div>
               
            </div>
        </div>



     
    </div>
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success  m-btn m-btn--icon m-btn--wide m-btn--md">ذخیره</button>
                    <button type="reset" class="btn btn-danger m-btn m-btn--icon m-btn--wide m-btn--md">کنسل</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>




