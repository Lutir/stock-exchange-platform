<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Dalal Street') }}
    </a>
  </div>
  <div class="sidebar-wrapper ">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
        
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="/profile">
                        <i class="material-icons">content_paste</i>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/myStocks">
          <i class="material-icons">content_paste</i>
            <p>{{ __('My Stocks') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="/transactions">
          <i class="material-icons">library_books</i>
            <p>{{ __('Transaction Manager') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="/viewStocks">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Find Stocks') }}</p>
        </a>
      </li>
      <li class="render nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="/viewStocks">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Refresh') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
<script>
  $('.render').click(function(){
    $.ajax({
          url: 'render',
          type: "POST",
          data: {
            '_token': $("input[name='_token'").val()
          },
          success: function(data, textStatus, jqXHR) {
              location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
          }
          });
  })
</script>