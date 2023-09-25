@extends('app')

@section('title', 'Lady healthcare | О нас')

@section('content')
  <main class="content about-content">
    <ul class="breadcrumbs container">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{ route('page.home') }}">
          Главная
        </a>
        <svg class="breadcrumbs__icon" width="24" height="24">
          <use xlink:href="#arrow-right" />
        </svg>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--current">О нас</a>
      </li>
    </ul>

    <section class="about-section container">
      <div class="about-section__wysiwyg wysiwyg" data-text="about-info" id="about-info">
        {!! texts()['about-info'] !!}
      </div>

      <ul class="about-section__list">
        <li class="about-section__list-item">
          <div class="about-section__list-wysiwygs">
            <div class="wysiwyg" data-text="about-mission" id="about-mission">
              {!! texts()['about-mission'] !!}
            </div>
          </div>
          <div class="about-section__list-images" style="background-image: url('/images/about-section-mission.jpg')"></div>
        </li>

        <li class="about-section__list-item">
          <div class="about-section__list-wysiwygs">
            <div class="wysiwyg" id="about-vision" data-text="about-vision">
              {!! texts()['about-vision'] !!}
            </div>
          </div>
          <div class="about-section__list-images" style="background-image: url('/images/about-section-vision.jpg')"></div>
        </li>
      </ul>
    </section>

    <section class="values-section container">
      <div class="values-section__title wysiwyg" id="about-values-title" data-text="about-values-title">
        {!! texts()['about-values-title'] !!}
      </div>

      <ul class="values-list">
        <li class="values-list__item">
          <div class="values-list__wysiwyg wysiwyg" id="about-value-1" data-text="about-value-1">
            {!! texts()['about-value-1'] !!}
          </div>
        </li>
        <li class="values-list__item">
          <div class="values-list__wysiwyg wysiwyg" id="about-value-2" data-text="about-value-2">
            {!! texts()['about-value-2'] !!}
          </div>
        </li>
        <li class="values-list__item">
          <div class="values-list__wysiwyg wysiwyg" id="about-value-3" data-text="about-value-3">
            {!! texts()['about-value-3'] !!}
          </div>
        </li>
        <li class="values-list__item">
          <div class="values-list__wysiwyg wysiwyg" id="about-value-4" data-text="about-value-4">
            {!! texts()['about-value-4'] !!}
          </div>
        </li>
      </ul>
    </section>
  </main>
@endsection
