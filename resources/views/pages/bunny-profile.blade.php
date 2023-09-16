@extends('layouts.base')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
  <h3>Profil du lapin numero {{$bunny->id}}</h3>
</div>
<!--Start code bunny profile-->
<div class="p-3 mt-4 ">
  <div class="row">
    <div class="card col-md-3">
      <!-- Premier div -->
      <div class="text-center py-4">
        <img src="{{ asset('assets/img/illustrations/bunny profile.jpg') }}" class="img-thumbnail" alt="..."
          style="max-width: 200px;max-height: 200px;">
      </div>
      <div class="p-3 m-3">
        {{-- Bunny information age--}}
        <p>Age: {{$bunny->age}}</p>
        <p>Date de naissance: {{$bunny->date_birth}}</p>
        <form action="{{ route('delete-bunny', []) }}" method="post">
          @csrf
          <input type="text" hidden value="{{$bunny->id}}" id="id" name="id">
          <button type="submit" class="btn btn-danger">Supprimer le lapin</button>
        </form>
      </div>
    </div>
    <div class="col-md-9">
      <!-- Deuxième div -->
      <div class="p-4">
        
        <ul class="nav nav-tabs nav-fill mb-3 p-3" id="ex1" role="tablist">
          <li class="nav-item m-2" role="presentation">
            <a class="nav-link active" id="ex2-tab-1" data-bs-toggle="tab" href="#ex2-tabs-1" role="tab"
              aria-controls="ex2-tabs-1" aria-selected="true">Informations générales</a>
          </li>
          <li class="nav-item m-2" role="presentation">
            <a class="nav-link" id="ex2-tab-2" data-bs-toggle="tab" href="#ex2-tabs-2" role="tab"
              aria-controls="ex2-tabs-2" aria-selected="false">Santé et alimentation</a>
          </li>
          <li class="nav-item m-2" role="presentation">
            <a class="nav-link" id="ex2-tab-3" data-bs-toggle="tab" href="#ex2-tabs-3" role="tab"
              aria-controls="ex2-tabs-3" aria-selected="false">Arbre généalogique</a>
          </li>
        </ul>
        <div class="card tab-content" id="ex2-content">
          <div class="tab-pane fade show active p-3" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
            {{-- Informations générales contenus --}}
            <form action="{{ route('edit-bunny',) }}" method="POST" class="col">
              @csrf

              <input type="text" name="idBunny" id="idBunny" value="{{$bunny->id}}" hidden>
              <div class="row">
                <div class="col mb-3">
                  <label for="uid" class="form-label">UID</label>
                  <input type="text" class="form-control @error('uid') is-invalid @enderror" id="uid" name="uid" value="{{$bunny->uid}}">
                </div>
                <div class="col mb-3">
                  <label for="genre" class="form-label">Genre</label>
                  <select class="form-select @error('genre') is-invalid @enderror" name="genre" id="genre"  aria-label="Default select example">
                    <option>Open this select menu</option>
                    <option value="male" @if ($bunny->gender=='male')selected @endif >male</option>
                    <option value="female" @if ($bunny->gender=='female')selected @endif>female</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label>Uid parent femelle </label>
                  <input type="text" @if ($femaleUid)
                      value={{$femaleUid}}
                  @endif placeholder="" class="form-control " disabled>
                </div>
                <div class="col mb-3">
                 <label>Uid parent male </label>
                  <input type="text" @if ($maleUid)
                      value={{$maleUid}}
                  @endif class="form-control " placeholder="" disabled>
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="race" class="form-label">Race lapin</label>
                  <select class="form-select @error('race') is-invalid @enderror" data-placeholder="Choose anything" multiple  name="race[]" id="select-field" >
                    @foreach (\App\Models\Race::all() as $race)
                      <option value="{{$race->id}}" >{{$race->race_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col mb-3">
                 <label>Destination</label>
                  <select class="form-select @error('destination') is-invalid @enderror"  name="destination" id="destination" aria-label="Default select example">
                    <option value="fattening" @if ($bunny->destination=="fattening")
                        @selected(true)
                    @endif>fattening</option>
                    <option value="mating" @if ($bunny->destination=="mating")
                        @selected(true)
                    @endif>mating</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 mb-3">
                  <label>Poids </label>
                  <input type="number" name="weight" id="weight" value="{{$bunny->weight}}" class="form-control @error('weight') is-invalid @enderror">
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
            </form>
          </div>
          <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2">
            Tab 2 content
          </div>
          <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
            Tab 3 content
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End code bunny profile -->



@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<Script>
$(document).ready(function() {
    $('#select-field').select2({
      theme: 'bootstrap-5'
    });
  });
</Script>
@endsection