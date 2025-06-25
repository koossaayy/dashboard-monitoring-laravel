  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer bg-red-200 text-dark py-3 fixed-bottom border-top">
    <div class="container">
      @if (!auth()->user() || \Request::is('static-sign-up'))
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              {{ __('Copyright ©') }} <script>
                document.write(new Date().getFullYear())
              </script> {{ __('by') }}
              <a style="color: #252f40;" href="https://www.instagram.com/strypngstu" class="font-weight-bold ml-1" target="_blank">{{ __('mugni. All Rights Reserved') }}</a>
            </p>
          </div>
        </div>
      @endif
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
