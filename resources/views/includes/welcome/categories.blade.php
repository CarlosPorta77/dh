<div class="container g-pb-30">
  <div class="text-center mx-auto g-max-width-600 g-mb-50 g-mt-20">
    <h2 class="g-color-black mb-4">Nuestros productos</h2>
    <p class="lead">Disfrutá de un verdadero sushi calidad Premium elaborado con los mejores ingredientes seleccionados por su frescura y sabor. Cada plato es preparado en el
      momento de tu pedido con la dedicación y experiencia de nuestros Sushi Masters.</p>
  </div>

  <!-- Categories -->
  <div class="row g-pt-20 g-mb-50">
    @foreach($categories as $category)
      <div class="col-6 col-lg-3 g-mb-30">
        <!-- Category -->
        <figure class="g-pos-rel g-mb-20">
          <img class="img-fluid" src="{{ $category->image_url }}" alt="{{ $category->name }}">
        </figure>

        <div class="media">
          <!-- Category Info -->
          <div class="d-flex flex-column">
            <h4 class="h6 g-color-black mb-1">
              <a class="u-link-v5 g-color-black g-color-primary--hover"
                 href="{{ route('user.search.show', ['category_id' => $category->id]) }}"
              >
                {{ $category->name }}
              </a>
            </h4>
            <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="#">{{ $category->description }}</a>
          </div>
          <!-- End Category Info -->
        </div>
        <!-- End Category -->
      </div>
    @endforeach
  </div>
  <!-- End Categories -->
</div>
