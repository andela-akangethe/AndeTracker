@if (auth()->check())
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">AndeTracker</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <img class="user-image" alt="{{ auth()->user()->first_name }}" src="{{ auth()->user()->getAvatarUrl() }}"/>
                    </li>
                    <li>
                        <a href="#">
                            {{ auth()->user()->first_name }}
                        </a>
                    </li>
                    <li><a href="{{ route('signout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endif
