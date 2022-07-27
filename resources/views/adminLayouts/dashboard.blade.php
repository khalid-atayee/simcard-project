@extends('adminLayouts.app')

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body ">
        <h2 class="m-widget14__title">
            مجموع سیمکارت توضیع شده شرکت های مخابراتی
        </h2>
        
        <div class="row" style="display: flex">

            
            @foreach ($simcards as $simcard)
            
                    
            <div  class="m-widget14" style="margin:1em;background-color:rgb(44,46,62); width:30%">
                <div class="m-widget14__header">
                    <h3 class="m-widget14__title">
                        {{ $simcard->company_name }}
                    </h3>
                            <span class="m-widget14__desc">
                                {{ $simcard->totalSim }}
                            </span>
                        </div>
                        
                    </div>

                    <!--end:: Widgets/Profit Share-->

        @endforeach
                </div>
            {{-- <div class="col-xl-4">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14" style="margin:1em;background-color:rgb(44,46,62)">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            شرکت مخابراتی روشن
                        </h3>
                        <span class="m-widget14__desc">
                            Profit Share between customers
                        </span>
                    </div>
                    
                </div>

                <!--end:: Widgets/Profit Share-->
            </div>
            <div class="col-xl-4">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14" style="margin:1em;background-color:rgb(44,46,62)">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            شرکت مخابراتی افغان بیسیم
                        </h3>
                        <span class="m-widget14__desc">
                            Profit Share between customers
                        </span>
                    </div>
                    
                </div>

                <!--end:: Widgets/Profit Share-->
            </div> --}}


        {{-- </div> --}}

         {{-- <div class="row m-row--no-padding m-row--col-separator-xl ">
            
            <div class="col-xl-4">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14" style="margin:1em;background-color:rgb(44,46,62)">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title" >
                            شرکت مخابراتی سلام
                        </h3>
                        <span class="m-widget14__desc">
                            Profit Share between customers
                        </span>
                    </div>
                  
                </div>

                <!--end:: Widgets/Profit Share-->
            </div>
            <div class="col-xl-4">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14" style="margin:1em;background-color:rgb(44,46,62)">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            شرکت مخابراتی اریبا
                        </h3>
                        <span class="m-widget14__desc">
                            Profit Share between customers
                        </span>
                    </div>
                    
                </div>

                <!--end:: Widgets/Profit Share-->
            </div>
           

        </div> --}}
        

        

    </div>
</div>


@endsection