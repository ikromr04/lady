@extends('app')

@section('title', 'Lady healthcare | Контакты')

@section('content')
  <main class="contacts-content content container">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{ route('page.home') }}">
          Главная
        </a>
        <svg class="breadcrumbs__icon" width="24" height="24">
          <use xlink:href="#arrow-right" />
        </svg>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--current">Контакты</a>
      </li>
    </ul>

    <div class="wysiwyg" id="contacts-info" data-text="contacts-info">
      {!! texts()['contacts-info'] !!}
    </div>
  </main>
@endsection
