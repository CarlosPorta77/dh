<div class="container g-pt-20">
  <div class="row">
    <div class="col-lg-6">
      <!-- Teal Alert -->
      @if(session('msgSuccess'))
        <div class="alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-check g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">{{session('msgSuccess')}}</span>
          </div>
        </div>
      @endif
    <!-- End Teal Alert -->

      <!-- Gray Dark Alert -->
      @if (session('msgWarning'))
        <div class="alert alert-dismissible fade show g-bg-gray-dark-v2 g-color-white rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span class="g-color-white" aria-hidden="true">×</span>
          </button>

          <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-question g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">{{session('msgWarning')}}</span>
          </div>
        </div>
      @endif
    <!-- End Gray Dark Alert -->

      <!-- Yellow Alert -->
      @if (session('msgInformation'))
        <div class="alert alert-dismissible fade show g-bg-yellow rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-info g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">{{session('msgInformation')}}</span>
          </div>
        </div>
        <!-- End Yellow Alert -->
      @endif

    <!-- Red Alert -->
      @if (session('msgAlert'))
        <div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-ban g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">{{session('msgAlert')}}</span>
          </div>
        </div>
        <!-- End Red Alert -->
      @endif
    </div>
  </div>
</div>