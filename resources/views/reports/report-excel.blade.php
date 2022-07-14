<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                
        <thead>
            <tr>
            <th class="unit-name" scope="row">
                {{ $datas[0]->unit_name}}
    
                {{-- <input type="hidden" id="unit_id" value="{{ $datas[0]->unit_id }}"> --}}
             </th>
    
            </tr>
    
          <tr>
            <th scope="row">#</th>
            <th scope="row">شبکه مخابراتی</th>
            <th scope="row">تعداد سیم کارت توضیح شده</th>
            
        </tr>
    
        
        @foreach ($datas as $data)
        
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $data->company_name }}</td>
            <td>{{ $data->totalSims }}</td>
    
        </tr>
            
        @endforeach
     
    
    </div>
    
</body>
</html>