@if(Auth::user()->role->name != "Admin")
{!! Form::text('firstname', 'FirstName') !!}
{!! Form::text('lastname','Lastname') !!}
{!! Form::text('password','Password')->type('password') !!}
{!! Form::text('password_confirmation','Confirm Your Password')->type('password') !!}
@else
{!! Form::text('firstname', 'FirstName') !!}
{!! Form::text('lastname','Lastname') !!}
{!! Form::text('email','Email')->type('email') !!}

{!!Form::select('department', 'Department')->options([''=>'-----Choose Your Department-----' , 'blog' => 'blog' , 'school' => 'school']) !!}
<div id="education" class="d-none">
    {!! Form::select('role_id1', 'choose your role')->options($roles2)!!}
</div>
<div id="blog" class="d-none">
    {!! Form::select('role_id2', 'choose your role') ->options($roles1)!!}
</div>  
{!! Form::text('password','Password')->type('password') !!}
{!! Form::text('password_confirmation','Confirm Your Password')->type('password') !!}
@endif
@section('js')
<script>
    $(document).ready(function() {
        function roleChange(dep,val) {
            if (val != null){
                if (dep == 'blog'){
                    $('#blog').removeClass('d-none');
                    $('#education').addClass('d-none');
                    $("#inp-role_id2").val(val);
                }else{
                    $('#education').removeClass('d-none');
                    $('#blog').addClass('d-none');
                    $("#inp-role_id1").val(val);
                }
            }else{
                if (dep == 'blog'){
                    $('#blog').removeClass('d-none');
                    $('#education').addClass('d-none');
                }else{
                    $('#education').removeClass('d-none');
                    $('#blog').addClass('d-none');         
                }
            }
        }
        $('#inp-department').change(function (){
            var val = this.value;
            roleChange(val);
        });
        @if(isset($user))
        var existingRoleId = "{{ $user->role_id }}";
        var existingDepartment = "{{ $user->department }}";
        roleChange(existingDepartment,existingRoleId);
        @endif
    });
    </script>
    @endsection
