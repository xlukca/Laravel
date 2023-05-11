@extends('layouts.app')
@section('content')

<style>th, td {text-align: center;}</style>
        <style>
        .form-group {
            max-width: 1300px;
            margin: 0 auto;
        }
        </style>

<h1>Database - SARS-CoV-2</h1>
    
    <div class="form-group">
    <form action="{{ route('dataTable.index') }}" method="get">
        <table class="table table-bordered yajra-datatable">
            @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sampling Date</th>
                        <th>Gene copy [number/mL of sample]</th>
                        <th>Gene copy [number/ng of RNA]</th>
                        <th>Ct #</th>
                        <th>Sampling Site/Station</th>
                        <th>Population Served</th>
                        <th>No. of people SARS-CoV-2 POSITIVE</th>
                        <th>Country</th>
                        <th>Action Edit</th>
                        <th>Action Delete</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @csrf
                        @foreach ($sarsData as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->sample_from_year }}-{{ $s->sample_from_month }}-{{ $s->sample_from_day }}</td>
                                <td>{{ $s->gene1 }}</td>
                                <td>{{ $s->gene2 }}</td>
                                <td>{{ $s->ct }}</td>
                                <td>{{ $s->station_name }}</td>
                                <td>{{ $s->population_served }}</td>
                                <td>{{ $s->people_positive }}</td>
                                <td>{{ $s->name_of_country }}</td>
                                <td><a class="btn btn-info" href="{{ route('dataTable.edit', $s->id) }}">Edit</a></td>
                                <td>
                                    {!! Form::open(array('route' => ['dataTable.destroy', $s->id], 'method'=>'DELETE')) !!}
                                    {!! Form::submit('delete', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("You are about to delete the file.")')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </form>
</div> 

<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dataTable.index') }}",
        columns: [
            {sarsData: 'id', name: 'id'},
            {sarsData: 'sample_from_year', name: 'sample_from_year'},
            {sarsData: 'gene1', name: 'gene1'},
            {sarsData: 'gene2', name: 'gene2'},
            {sarsData: 'ct', name: 'ct'},
            {sarsData: 'station_name', name: 'station_name'},
            {sarsData: 'population_served', name: 'population_served'},
            {sarsData: 'people_positive', name: 'people_positive'},
            {sarsData: 'name_of_country', name: 'name_of_country'},
            {sarsData: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
      
  });
</script>



@endsection


