@extends('layouts.app')
@section('title', $kementerian->nama_kementerian)
@section('content')
<section class="text-center py-20">
 <h1 class="text-4xl font-bold">{{ $kementerian->nama_kementerian }}</h1>
</section>
@endsection