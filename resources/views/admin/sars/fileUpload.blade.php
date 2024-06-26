@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
        <h3 class="text-center mb-5">SARS-CoV-2 File Upload</h3>
        @csrf
        <div class="custom-file">
            <input type="file" name="files[]" class="custom-file-input" id="chooseFile" multiple>
            <label class="custom-file-label" for="chooseFile"></label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload File
        </button>
    </form>
</div>    

<div class="container mt-5">
    <table class="table table-striped tables">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @csrf
            @foreach($files as $file)
            <tr @if($file->trashed())class="table-danger"@endif>
                @if($file->trashed())
                    <td></td>    
                @else
                    <td>
                        @if(!isset($file->sars->file_id))
                            <input type="checkbox" name="files[]" value="{{ $file->id }}" form="form2" multiple>
                        @endif
                    </td> 
                @endif
                <td>{{ $file->name }}</td>
                <td>
                    @if($file->trashed())
                    {!! Form::open(array('route' => ['file-upload.forceDestroy', $file->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit('Permanent Delete', array('class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("You are about to PERMANENTLY delete the file.")')) !!}
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => ['file-upload.restore', $file->id], 'method'=>'POST')) !!}
                    {!! Form::submit('Restore', array('class' => 'btn btn-success btn-sm mt-1')) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(array('route' => ['file-upload.destroy', $file->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("You are about to delete the file.")')) !!}
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-2">
            <form onsubmit="return handleData()" action="{{ route('file-upload.excel') }}" method="post" id="form2">
                @csrf   
                <button form="form2" type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="col-10">
            <div class="alert alert-danger" id="chk_option_error" style="visibility: hidden">
                <strong>Please select at least one option.</strong>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });
</script>

<script>
    function handleData()
    {
        var form_data = new FormData(document.querySelector("#form2"));
        if(!form_data.has("files[]"))
        {
            document.getElementById("chk_option_error").style.visibility = "visible";
        return false;      
        }
        else
        {
            document.getElementById("chk_option_error").style.visibility = "hidden";
        return true;
        }
    }
</script>
@endsection
