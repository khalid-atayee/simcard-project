

{{-- </div> --}}
<div class="main-table">
    @include('users.fetchUsers')

</div>



{{-- <script>
    $(document).on('click', '#but', function (e) { 
        e.preventDefault();
    $.post("{{ route('user.roleAssignForm') }}", $('#test').serialize(), function(response){
        console.log(response);
    });
 });
</script> --}}
