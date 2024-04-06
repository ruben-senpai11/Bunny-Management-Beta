@extends('layouts.base')
@section('style')
<link href="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.css') }}" rel="stylesheet">
@endsection
@section('content')


<div class="row">
  <div class="col-12">
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif
    <div class="reproduction-form mt-4">
      @if (session()->has('g_message'))
      <div class="alert alert-success">
        {{ session('g_message') }}
      </div>
      @endif
      <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-4">
          <h2 class="p-0 m-0">Planifications</h2>          
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">
              <span class="input-group-text" id="topbar-addon">
                <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Rechercher un lapin (identifiant)" aria-label="Search"
                aria-describedby="topbar-addon">
            </div>
          </form>
        </div>
        <div class="col-6">
          <div id="today-mating" class="card-header d-flex align-items-center bg-success">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Accouplement du jour</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
        <div class="col-6">
          <div id="today-mating" class="card-header d-flex align-items-center bg-info">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Accouplements à venir</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
        <div class="col-6">
          <div id="today-mating" class="card-header d-flex align-items-center bg-danger">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Accouplements interdits</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
        <div class="col-6">
          <div id="today-mating" class="card-header d-flex align-items-center bg-gray-700">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Programmer un accouplement</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
@section('script')



@endsection