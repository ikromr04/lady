@extends('app')

@section('title', 'Lady healthcare | Карьера')

@section('content')
  <main class="career-content content container">
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
        <a class="breadcrumbs__link breadcrumbs__link--current">Карьера</a>
      </li>
    </ul>

    <div class="wysiwyg" id="career-info" data-text="career-info">
      {!! texts()['career-info'] !!}
    </div>

    <picture>
      <source media="(min-width:1920px)" srcset="{{ asset('images/career-content-image-fullhd.jpg') }}">
      <source media="(min-width:1280px)" srcset="{{ asset('images/career-content-image-desktop.jpg') }}">
      <source media="(min-width:744px)" srcset="{{ asset('images/career-content-image-tablet.jpg') }}">
      <img class="career-content__image" src="{{ asset('images/career-content-image-mobile.jpg') }}" width="1792" height="464" alt="Карьера в Lady Healthcare">
    </picture>

    <div class="career-content__steps wysiwyg" id="career-steps" data-text="career-steps">
      {!! texts()['career-steps'] !!}
    </div>

    <section class="career-section">
      <div class="career-section__wysiwyg">
        <div class="wysiwyg" id="career-job" data-text="career-job">
          {!! texts()['career-job'] !!}
        </div>
      </div>

      <div class="career-section__button-wrapper">
        <a class="career-section__button button" href="mailto:info@ladyhealthcare.com">
          Отправить резюме
        </a>
      </div>
    </section>
  </main>
@endsection
