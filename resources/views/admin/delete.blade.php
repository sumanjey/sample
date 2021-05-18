{!! Form::open()->route('user.destroy',[$user->id])->method('delete') !!}
<div>
    <h4> Are sure you want to delete?</h4>
</div>
<a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark btn-md"><i class="mdi mdi-cancel"></i>Cancel</a>
<button class="btn btn-secondary btn-md float-right"><i class="mdi mdi-delete"></i> Delete </button>
{!! Form::close() !!}
