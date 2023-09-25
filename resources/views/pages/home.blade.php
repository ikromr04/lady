@extends('app')

@section('title', 'Lady healthcare | Главная')

@section('content')
  <main class="content main-content">
    <h1 class="visually-hidden">Фармацевтическая компания Lady Healthcare</h1>

    <section class="info-section">
      <div class="info-section__container container">
        <div class="info-section__wysiwyg wysiwyg" id="home-info" data-text="home-info">
          {!! texts()['home-info'] !!}
        </div>
      </div>
    </section>

    <section class="foundation-section container">
      <div class="foundation-section__wysiwyg wysiwyg" id="home-foundation" data-text="home-foundation">
        {!! texts()['home-foundation'] !!}
      </div>

      <ul class="foundation-list">
        @foreach (getFoundationItems() as $item)
          <li class="foundation-list__item">
            <div class="foundation-list__item-top">
              <h3 class="foundation-list__item-title">{{ $item['title'] }}</h3>

              <a class="text-link" href="{{ $item['route'] }}">
                Подробнее
                <svg width="24" height="24">
                  <use xlink:href="#arrow-right" />
                </svg>
              </a>
            </div>

            <div class="foundation-list__item-image" style="background-image: url({{ $item['image'] }})"></div>
          </li>
        @endforeach
      </ul>
    </section>

    <section class="career-section container">
      <div class="career-section__wysiwyg">
        <div class="wysiwyg" id="home-career" data-text="home-career">
          {!! texts()['home-career'] !!}
        </div>
      </div>

      <div class="career-section__button-wrapper">
        <a class="career-section__button button" href="mailto:info@ladyhealthcare.com">
          Присоединяйся к нам
        </a>
      </div>
    </section>

    <section class="products-section container">
      <div class="products-section__wysiwyg wysiwyg" id="home-products" data-text="home-products">
        {!! texts()['home-products'] !!}
      </div>

      <div data-container="products"></div>

      <a class="products-section__text-link text-link" href="{{ route('page.products') }}">
        Все препараты
        <svg width="24" height="24">
          <use xlink:href="#arrow-right" />
        </svg>
      </a>
    </section>
  </main>
@endsection
