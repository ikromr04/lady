<article class="products-card">
  <h3 class="products-card__title" data-prescription="{{ $product->prescription->title }}">
    {{ $product->title }}
  </h3>

  <div class="products-card__inner">
    <img class="products-card__image" src="{{ asset($product->image_thumb) }}" alt="{{ $product->title }}" width="210" height="268">

    <p class="products-card__category">{{ $product->category->title }}</p>

    <p class="product-card__description">{!! strip_tags($product->description) !!}</p>

    <a class="button" href="{{ route('page.products.selected', $product->slug) }}">
      Подробнее
      <svg width="24" height="24">
        <use xlink:href="#arrow-right" />
      </svg>
    </a>
  </div>
</article>
