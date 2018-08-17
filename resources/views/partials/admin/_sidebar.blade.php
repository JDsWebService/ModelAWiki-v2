<div class="list-group">
  <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
    <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard
  </a>
</div>

<h5 class="mt-3"><i class="fab fa-blogger"></i>&nbsp;&nbsp;Blog</h5>
<div class="list-group">
  <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">
  	<i class="far fa-newspaper"></i>&nbsp;&nbsp;Posts
  </a>
  <a href="{{ route('tag.index') }}" class="list-group-item list-group-item-action">
    <i class="fas fa-tags"></i>&nbsp;&nbsp;Tags
  </a>
  <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">
    <i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Categories
  </a>

  <a href="#" class="list-group-item list-group-item-action">
  	<i class="fas fa-chart-area"></i>&nbsp;&nbsp;Analytics
  </a>
</div>

<h5 class="mt-3"><i class="fas fa-car"></i>&nbsp;&nbsp;Parts</h5>
<div class="list-group">
  <a href="{{ route('part.section.index') }}" class="list-group-item list-group-item-action">
  	<i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Sections
  </a>

  <a href="#" class="list-group-item list-group-item-action">
  	<i class="fas fa-wrench"></i>&nbsp;&nbsp;Parts
  </a>
</div>

<h5 class="mt-3"><i class="fas fa-users"></i>&nbsp;&nbsp;Users</h5>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">
  	<i class="fas fa-user-edit"></i>&nbsp;&nbsp;Editors
  </a>

  <a href="#" class="list-group-item list-group-item-action">
  	<i class="fas fa-users-cog"></i>&nbsp;&nbsp;User Management
  </a>
</div>