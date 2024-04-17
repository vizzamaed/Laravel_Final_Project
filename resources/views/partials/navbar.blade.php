@include('partials.narvar')
<nav class= "mt-2 ml-5 fixed w-full z-20 top-0 left-0">
    <div>
        <ul class="flex justify-end mr-5">
            <li class="mr-6">
              <a class="text-sky-600 hover:text-sky-500" href="/login">Log in</a>
            </li>
            <li class="mr-6">
              <a class="text-sky-600 hover:text-sky-500" href="/register">Sign up</a>
            </li>
            <li class="mr-6">
                <form action="/logout" method="POST">
                    @csrf
                    <a class="text-sky-600 hover:text-sky-500" href="/logout">Log out</a>
                </form>
            </li>
          </ul>
    </div>
</nav>
