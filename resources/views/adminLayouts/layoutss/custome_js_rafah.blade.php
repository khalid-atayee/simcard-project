@php
use Illuminate\Support\Facades\session;
@endphp
<!-- Custom Scripts -->
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});



function validation(form_id)
{
  var form = document.getElementById(form_id);
  for (i=0;i<form.length;i++)
  {
    var tempobj = form.elements[i];
    if(tempobj.id)
    {
      if(($('#'+tempobj.id).hasClass('required') && $.trim(tempobj.value) == ''))
      {
        tempobj.focus();
        if($('#'+tempobj.id).attr("type") == "number" || $('#'+tempobj.id).attr("type") == "text" || $('#'+tempobj.id).attr("type") == "date"){
          $('#'+tempobj.id).css('border-bottom','1px solid #FF0000');
        }else{
          $('#div_'+tempobj.id).css('border-bottom','1px solid #FF0000');
        }
        $('.'+tempobj.id).css('display','inline');
        $('.'+tempobj.id).html('<span class="text-danger">{{trans("validation.required")}}</span>');
        return false;
      }
      else
      {
        $('#'+tempobj.id).css('border','');
        $('.'+tempobj.id).html('');
      }
    }
  }
  return true;
}

function bringDataById(url,val,method,div,target)
{
  $.ajax({
      url: url,
      data: {
        "_method" : method,
        "id"      : val,
        "target"  : target,
      },
      type: method,

      success: function(response)
      {
        $("#"+div).html(response);
      }
  });
}

intTextBox = 1;
function Add_feild(div,div2)
{
    intTextBox    = intTextBox + 1;
    var contentID = document.getElementById(div2);
    var newTBDiv  = document.createElement("div");
    newTBDiv.setAttribute("id","childDv"+intTextBox);
    var getopt = document.getElementById(div).innerHTML;
    newTBDiv.innerHTML = getopt+ "<input type='button' class='searchButton btn btn-danger' style='margin-top:5px; display:inline'   id='rmbtn' name='rmbtn' value='-' onclick="+'"'+"javascript: removeElement('"+div2+"','"+intTextBox+"');"+'"'+"/>";
    contentID.appendChild(newTBDiv);
}

function removeElement(condivId,inpId)
{
    if(intTextBox != 0)
    {
        var contentID = document.getElementById(condivId);
        contentID.removeChild(document.getElementById("childDv"+inpId));
        intTextBox = inpId-1;
    }
}



function storeRecordGuidance(url,form_id,method,response_div,redirectFunction,is_modal=false,btnID)
{
//   if(validation(form_id))
//   {
    var params = new FormData($('#'+form_id)[0]);
    serverRequestResponseGuidance(url,params,method,response_div,redirectFunction,is_modal,btnID);
  //}
}

// // Pass result to the function form server side
function serverRequestResponseGuidance(url,params,method,response_div,redirectFunction,is_modal=false,btnID='submitBtn')
{
  $('.error-div').html('');
  $('.errorDiv').css('border-bottom','');
  $.ajax({
    url: url,
    data:params,
    type:method,
    beforeSend: function()
    {
      // disable submit button
      $('#'+btnID).attr('disabled','disabled');
      if(is_modal){
         $('#'+response_div).html('<div class="col text-center" style="width:100%"><img alt="" src="{!!asset('img/loader.gif')!!}" /></div>');
      }else {
        $(".m-page-loader.m-page-loader--base").css("display","block");
      }
    },
    success: function(response)
    {
      // enable submit button
      $('#'+btnID).removeAttr('disabled');
      $(".m-page-loader.m-page-loader--base").css("display","none");
       swal({
            title: "",
            text: "{{trans('authentication.success_msg')}}",
            type: " ",
            allowOutsideClick: false
            }).then(function() {
              window.location.reload();
        });
    },
    error: function (request, status, error) {
      // enable submit button
      $('#'+btnID).removeAttr('disabled');
      $(".m-page-loader.m-page-loader--base").css("display","none");
      json = $.parseJSON(request.responseText);
      $.each(json.errors, function(key, value){
        //console.log(key)
        $('.'+key).show();
        $('.'+key).html('<span class="text-danger">'+value+'</span>');
        $('#'+key).css('border-bottom','1px solid #dc3545');
        if(key == 'guide_dr.0' )
        {
            $('.guide_dr').show();
            $('.guide_dr').html('<span class="text-danger">'+value+'</span>');
        }
        if(key == 'guide_pa.0')
        {
            $('.guide_pa').show();
            $('.guide_pa').html('<span class="text-danger">'+value+'</span>');
        }
        if(key == 'guide_en.0')
        {
            $('.guide_en').show();
            $('.guide_en').html('<span class="text-danger">'+value+'</span>');
        }
      });
    },

    cache: false,
    processData: false,
    contentType: false,
  })
}


</script>
@stack('custom-js')

