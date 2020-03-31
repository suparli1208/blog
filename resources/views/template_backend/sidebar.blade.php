<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <span class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="blank.html"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
      <li class="menu-header">Starter</li>
      <li @if(Request::segment(1) == 'post') class="dropdown active" @endif>
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i>
          <span>Post</span></a>
        <ul class="dropdown-menu">
          <li @if(Request::segment(1) == 'post')class="active" @endif><a class="nav-link active" href="{{route('post.index')}}">List Post</a></li>
        </ul>
      </li>
      <li @if(Request::segment(1) == 'category') class="dropdown active" @endif>
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Kategori</span></a>
        <ul class="dropdown-menu">
          <li @if(Request::segment(1) == 'category')class="active" @endif><a class="nav-link" href="{{route('category.index')}}">List Kategori</a></li>
        </ul>
      </li>
      <li @if(Request::segment(1) == 'tag') class="dropdown active" @endif>
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i>
          <span>Tag</span></a>
        <ul class="dropdown-menu">
          <li @if(Request::segment(1) == 'tag')class="active" @endif><a class="nav-link" href="{{route('tag.index')}}">List Tag</a></li>
        </ul>
      </li>

  </aside>
</div>
