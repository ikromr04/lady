<?php

use App\Models\Text;

/**
 * Custom Helper functions
 *
 * @author Bobur Nuridinov <bobnuridinov@gmail.com>
 */

function getAppPages(): array
{
  $pages = [
    [
      'title' => 'О нас',
      'route' => route('page.about'),
    ],
    [
      'title' => 'Карьера',
      'route' => route('page.career'),
    ],
    [
      'title' => 'Препараты',
      'route' => route('page.products'),
    ],
    [
      'title' => 'Контакты',
      'route' => route('page.contacts'),
    ],
  ];

  return $pages;
}

function getPageTitle($name): string
{
  switch ($name) {
    case 'home':
      return 'Главная';

    case 'about':
      return 'О нас';

    case 'career':
      return 'Карьера';

    case 'products':
      return 'Препараты';

    case 'contacts':
      return 'Контакты';
  }
}

function isCurrentPage($page): bool
{
  return str_contains(url()->current(), $page['route']);
}

function getFoundationItems()
{
  $foundationItems = [
    [
      'title' => 'О компании',
      'route' => route('page.about') . '#about',
      'image' => '/images/foundation-section-about-item.jpg',
    ],
    [
      'title' => 'Миссия',
      'route' => route('page.about') . '#mission',
      'image' => '/images/foundation-section-mission-item.jpg',
    ],
    [
      'title' => 'Видение',
      'route' => route('page.about') . '#vision',
      'image' => '/images/foundation-section-vision-item.jpg',
    ],
    [
      'title' => 'Ценности',
      'route' => route('page.about') . '#values',
      'image' => '/images/foundation-section-values-item.jpg',
    ],
  ];

  return $foundationItems;
}

function texts(): array
{
  $texts = Text::where('page', request()->segment(1) ?? 'home')->get();

  foreach ($texts as $text) {
    $result[$text->slug] = $text->text;
  }

  return $result;
}

function boldKeyword($keyword, $text)
{
  return preg_replace("/" . $keyword . "/iu", "<span class='keyword-bold'>" . $keyword .  "</span>", $text);
}
