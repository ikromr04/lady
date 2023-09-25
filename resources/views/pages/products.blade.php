@extends('app')

@section('title', 'Lady healthcare | Препараты')

@section('content')
  <main class="products-content content container">
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
        <a class="breadcrumbs__link breadcrumbs__link--current">Все препараты</a>
      </li>
    </ul>

    <div class="products-content__top">
      <div class="products-content__info wysiwyg" data-text="products-info">
        {!! texts()['products-info'] !!}
      </div>

      <div class="products-content__attention">
        <div class="wysiwyg" data-text="products-attention">
          {!! texts()['products-attention'] !!}
        </div>
      </div>
    </div>

    <div class="filter">
      <form class="filter__form">
        <label class="filter__label" for="filter-keyword">
          <svg width="24" height="24">
            <use xlink:href="#search" />
          </svg>
        </label>
        <input class="filter__input" type="search" id="filter-keyword" name="keyword" placeholder="Поиск препарата" autocomplete="off">

        <div class="filter__wrapper">
          <button class="filter__reset" type="reset">
            <svg width="24" height="24">
              <use xlink:href="#arrow-right" />
            </svg>
            <svg width="24" height="24">
              <use xlink:href="#close" />
            </svg>
          </button>

          <div class="filter__tags">
            @foreach ($data['tags'] as $tag)
              <input class="visually-hidden" type="radio" name="tag" id="{{ $tag->slug }}" value="{{ $tag->id }}" @if (request('tag') && request('tag') == $tag->slug) checked @endif>
              <label class="filter__tag" for="{{ $tag->slug }}">{{ $tag->title }}</label>
            @endforeach
          </div>
        </div>
      </form>

      <div class="filter__prescription">
        <button class="filter__prescription-button" type="button">
          <span>Рецептурность</span>
          <svg width="24" height="24">
            <use xlink:href="#arrow-right" />
          </svg>
        </button>

        <ul class="filter__prescription-list">
          <li class="filter__prescription-item" data-prescription-id="">Все</li>
          @foreach ($data['prescriptions'] as $prescription)
            <li class="filter__prescription-item" data-prescription-id="{{ $prescription->id }}">
              {{ $prescription->title }}
            </li>
          @endforeach
        </ul>
      </div>

      <div class="filter__category">
        <button class="filter__category-button" type="button">
          <span>Направления</span>
          <svg width="24" height="24">
            <use xlink:href="#arrow-right" />
          </svg>
        </button>

        <ul class="filter__category-list">
          <li class="filter__category-item" data-category-id="">Все</li>
          @foreach ($data['categories'] as $category)
            <li class="filter__category-item" data-category-id="{{ $category->id }}">
              {{ $category->title }}
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div data-container="products"></div>
  </main>
@endsection
