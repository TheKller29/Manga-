<!DOCTYPE html>
<html>
<head>
    <!-- custom -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- Google font -->
    <link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
</head>

<body class="book_page">
@extends('pages.base')

@section('main')
<link rel="stylesheet" type="text/css" href="style.css">
<div class="row">
  <div class="col-sm-12">
    <!-- Header -->
    <header class="header_auth">
        <a href="{{ route('admin')}}" class="header_auth">MANGA++</a>
        <a style="margin: 19px;" href="{{ route('livres.create')}}" class="new_book_button">Nouveau livre</a>
        <a href="{{ route('admin')}}" class="return">Retour à l'accueil</a>
    </header>
    <!-- End Header -->
    <h1 class="display-3">Livres</h1>

    <div class="book_container">
    @foreach($livres as $livre)
    <div class="book">
      <div class="book_image">
        <img src="../public/images/{{$livre->name}}_n1.jpg" alt="Book image">
      </div>
      <h2>{{$livre->name}}</h2>
      <h3>Genre: {{$livre->kind}}</h3>
      <h3>Auteur: {{$livre->author}}</h3>
      <h4>Date d'édition: {{$livre->dated}}</h4>
      <a href="{{ route('reservations.index',$livre->name)}}" class="btn btn-primary">Réserver</a>
      <div class="button_container">
      <form action="{{ route('livres.destroy', $livre->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="remove_button" type="submit">Supprimer</button>
      </form>
      <div class="edit_button_container">
        <a href="{{ route('livres.edit',$livre->id)}}" class="edit_button">Modifier</a>
      </div>
    </div>
    </div>
    @endforeach
    </div>
  <div>
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
  </div>
@endsection
</div>
</div>
</body>
</html>
