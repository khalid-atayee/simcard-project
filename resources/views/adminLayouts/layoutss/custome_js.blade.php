<script type="text/javascript">
 $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

function testWork(url,params,method,div)
{
    var unit_id = document.getElementById('selectUnit').value;
    // alert(id);
    $.ajax({
                url: url,
                data: params,
                type: method,
                // {
                //     'unit_id': unit_id
                // },
               
                success: function (response) 
                {
                    $('#'+div).html(response);
                    
                }
            });

}
</script>