@extends('adminLayouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img @if (Auth::user()->image) src="userImage/{{ Auth::user()->image }}"
                            @else src = "assets/app/media/img/users/user4.jpg" @endif class="m--img-rounded "  />
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">{{ Auth::user()->name }}</span>
                        <a href="" class="m-card-profile__email m-link">{{ Auth::user()->email }}</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                Update Profile
                            </a>
                        </li>
                    </ul>
                </div>
            
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">1. Personal Details</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                         
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                          
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">2. Social Links</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Linkedin</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="www.linkedin.com/{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Facebook</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="www.facebook.com/{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Twitter</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="www.twitter.com/{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Instagram</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="www.instagram.com/{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-7">
                                        <button type="reset" class="btn btn-primary m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                </div>
                <div class="tab-pane " id="m_user_profile_tab_2">
                </div>
                <div class="tab-pane " id="m_user_profile_tab_3">
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection