    <!-- nav  -->
    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>
            @if (! auth()->check())
             <a class="nav-link ml-auto" href="/register">Register</a>
             <a class="nav-link " href="/login">Login</a>
            @endif

            @if (auth()->check())
              <a class="nav-link" href="/posts/create">New Post</a>
              <a class="nav-link ml-auto" href="#">{{ auth()->user()->name}}</a>
              <a class="nav-link" href="/logout">logout</a>
            @endif
        </nav>
      </div>
    </div>
    <!-- Header  -->
    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">The Hozz Blog</h1>
        <p class="lead blog-description">Blog built with Laravel.</p>
      </div>
    </div>