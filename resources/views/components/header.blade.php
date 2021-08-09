<header>
  <nav class="navbar navbar-expand-sm navbar-light">
    <div class="container flex">
      <div class="navbar-left flex">
      <a href="{{ route('home') }}"><img src="images/top_logo.png" class="top_logo mr-2" alt=""></a>
      <a href="{{ route('home') }}" class="mr-4 site-title md-none">{{ config('app.name', 'Share-read') }}</a>
      <span>ここに検索バー</span>

        <!-- <%= form_tag(books_search_path, method: :get, class: 'flex search-form') do %>
          <%= text_field_tag :title, @title, class: 'form-control search-bar', placeholder: '本のタイトル' %>
          <%= button_tag type: "submit",class: "btn search-btn" do %>
            <i class="fas fa-search"></i>
          <% end %>
        <% end %> -->
      </div>
      <div class="navbar-right">
        <ul class="flex navbar-right-items">
          @guest
              <li class="nav-item">
                <a href="{{ route('register') }}" class="btn nav-btn register-btn txt-xxs"><i class="fas fa-user-plus"></i><span class="sm-none">会員登録</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login') }}" class="btn nav-btn login-btn txt-xxs"><i class="fas fa-sign-in-alt"></i> <span class="sm-none">ログイン</span></a>
              </li>
          @else
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user fa-lg"></i></a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item"><a href="{{ route('top') }}">マイページ</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="{{ route('top') }}">アカウント設定</a></li>
                <li class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </li>

          @endguest
        </ul>
      </div>
    </div>
  </nav>
</header>