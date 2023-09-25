@if (count($products) == 0)
  <p>Ничего не найдено</p>
@else
  <ul class="products-list">
    @foreach ($products as $product)
      <li class="products-list__item">
        <x-products-card :product="$product" />
      </li>
    @endforeach
  </ul>

  <div class="products-list__pagination">
    @if (method_exists($products, 'links'))
      {{ $products->links('components.pagination') }}
    @endif
  </div>
@endif

