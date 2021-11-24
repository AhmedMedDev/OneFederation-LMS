

@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('CerImport/wo') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="cerExcel" id="">
        <button type="submit">save</button>
    </form>
</div>
@endsection