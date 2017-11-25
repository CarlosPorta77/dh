<!-- Order Summary -->
<div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
  <h4 class="h6 text-uppercase mb-3">Resumen</h4>

  <!-- Accordion -->
  <div id="accordion-03" class="mb-4" role="tablist" aria-multiselectable="true">
    <div id="accordion-03-heading-03" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
      <h5 class="g-font-weight-400 g-font-size-default mb-0">
        <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#accordion-03-body-03" data-toggle="collapse" data-parent="#accordion-03"
           aria-expanded="false" aria-controls="accordion-03-body-03">{{ auth()->user()->cart->details->count() }} {{ (auth()->user()->cart->details->count() > 1) ? 'items' : 'item' }} en el carrito
          <span class="ml-3 fa fa-angle-down"></span></a>
      </h5>
    </div>
    <div id="accordion-03-body-03" class="collapse" role="tabpanel" aria-labelledby="accordion-03-heading-03">
      <div class="g-py-15">
        <ul class="list-unstyled mb-3">
        @foreach(auth()->user()->cart->details as $detail)

          <!-- Product -->
            <li class="d-flex justify-content-start">
              <img class="d-inline-block g-width-120 g-height-80 mr-3" src="{{ $detail->product->featured_image_url }}" alt="{{$detail->product->name }}">
              <div class="d-block">
                <h4 class="h6 g-color-black">{{$detail->product->name }}</h4>
                <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
                  <li>{{$detail->product->category->name }}</li>
                  <li>Cantidad: {{ number_format($detail->quantity, 0) }}</li>
                </ul>
                <span class="d-block g-color-black g-font-weight-400">Precio: ${{ number_format($detail->price, 2) }}</span>
              </div>
            </li>
            <!-- End Product -->
          @endforeach

        </ul>
      </div>
    </div>
  </div>
  <!-- End Accordion -->

  <div class="d-flex justify-content-between mb-2">
    <span class="g-color-black">Subtotal</span>
    <span class="g-color-black g-font-weight-300">${{ number_format(auth()->user()->cart->total, 2) }}</span>
  </div>
  <div class="d-flex justify-content-between">
    <span class="g-color-black">Total</span>
    <span class="g-color-black g-font-weight-300">${{ number_format(auth()->user()->cart->total, 2) }}</span>
  </div>
</div>
<!-- Shipping Method -->
<div class="g-px-20 mb-5">
  <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
    <h4 class="h6 text-uppercase mb-3">Enviar a:</h4>
  </div>
  <p class="g-color-gray-dark-v4 g-font-size-15">{{auth()->user()->cart->shipping_address}}</p>
</div>
<!-- End Shipping Method -->
<!-- End Order Summary -->
