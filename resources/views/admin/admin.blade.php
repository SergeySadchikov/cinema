<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  <link rel="stylesheet" href="{{asset('public/admin/CSS/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/CSS/styles.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>

  <header class="page-header">
    <h1 class="page-header__title">Идём<span>в</span>кино</h1>
    <span class="page-header__subtitle">Администраторская</span>
  </header>

  <main class="conf-steps">
    <section class="conf-step">
      <header class="conf-step__header conf-step__header_closed">
        <h2 class="conf-step__title">Управление залами</h2>
      </header>
    </section>

    <section class="conf-step">
      <header class="conf-step__header conf-step__header_closed">
        <h2 class="conf-step__title">Конфигурация залов</h2>
      </header>
    </section>

    <section class="conf-step">
      <header class="conf-step__header conf-step__header_closed">
        <h2 class="conf-step__title">Конфигурация цен</h2>
      </header>
    </section>

    <section class="conf-step">
      <header class="conf-step__header conf-step__header_closed">
        <h2 class="conf-step__title">Сетка сеансов</h2>
      </header>
    </section>

    <section class="conf-step">
      <header class="conf-step__header conf-step__header_closed">
        <h2 class="conf-step__title">Открыть продажи</h2>
      </header>
    </section>

  </main>
  <script src="{{asset('public/admin/js/accordeon.js')}}"></script>
</body>
</html>


