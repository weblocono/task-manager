<header>
    <div class="container">
        <div class="header_wrapper">
            <div class="logo">
                Task Manage
                <p class="sub_logo">Управляй задачами легко и просто!</p>
            </div>

            @guest()
            <div class="btn auth">
                <a href="{{ route('signin.index') }}">Войти</a>
            </div>
            @endguest

            @auth()
                <div style="display: flex">
                    <div class="btn auth" style="margin-right: 10px;">
                        <a href="{{ route('task.add') }}">Добавить задачу</a>
                    </div>
                    <div class="btn auth">
                        <a href="{{ route('logout') }}">Выйти из профиля</a>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>
