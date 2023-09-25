<header class="page-header container">
  <nav class="page-header__main-navigation main-navigation">
    <a class="main-navigation__main-logo main-logo" @if (request()->segment(1)) href="{{ route('page.home') }}" @endif>
      <img class="main-logo__image" src="{{ asset('images/main-logo.svg') }}" width="96" height="36" alt="Вернуться на главную страницу">
    </a>

    <button class="main-navigation__toggler menu-button" type="button">
      <svg class="menu-button__open-icon" width="24" height="24">
        <use xlink:href="#menu" />
      </svg>
      <svg class="menu-button__close-icon" width="24" height="24">
        <use xlink:href="#close" />
      </svg>
    </button>

    <ul class="page-navigation">
      @foreach (getAppPages() as $page)
        <li class="page-navigation__item {{ isCurrentPage($page) ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" @if (!isCurrentPage($page)) href="{{ $page['route'] }}" @endif>
            {{ $page['title'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </nav>

  <form class="global-search {{ request()->segment(1) ? 'global-search--hidden' : '' }}" onsubmit="return false">
    @csrf
    <label class="global-search__label" for="global-search">
      <svg width="24" height="24">
        <use xlink:href="#search" />
      </svg>
    </label>

    <input class="global-search__input" id="global-search" name="keyword" type="search" placeholder="Введите запрос поиска" autocomplete="off">

    <div class="global-search__inner">
      <button class="global-search__button" type="reset" aria-label="Сбросить">
        <svg class="arrow-right-icon" width="24" height="24">
          <use xlink:href="#arrow-right" />
        </svg>
        <svg class="close-icon" width="24" height="24">
          <use xlink:href="#close" />
        </svg>
      </button>
    </div>

    <div id="global-search__result"></div>
  </form>
</header>
