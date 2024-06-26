{{ Form::label( $tag, __($space . 's.' . $tag) ) }}
@if($errors->has($tag))
@error($tag)
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control is-invalid']) }}
<div class="invalid-feedback mb-3">
    {{ $message }}
</div>  
@enderror
@else
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control mb-3']) }}
@endif