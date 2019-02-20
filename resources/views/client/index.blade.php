<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  <link rel="stylesheet" href="{{asset('client/css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('client/css/styles.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <script src="{{asset('js/server.js')}}"></script>
</head>

<body>
  <header class="page-header admin">
    <h1 class="page-header__title">Идём<span>в</span>кино</h1>
    <span class="page-header__subtitle">Администраторская</span>
    <div class="username hidden"></div>
    <div class="user-profile">
      <i class="fas fa-user"></i>
      <i class="far fa-user"></i>
       <ul>
         <li class="profile-action" id="login-btn">Войти</li>
         <li class="profile-action hidden" id="logout-btn">Выход</li>
         <li class="profile-action" id="register-btn">Регистрация</li>
         <li class="profile-action" id="admin-btn">Администраторская</li>
       </ul>
    </div>
  </header>

  <nav class="page-nav admin">
    <a class="page-nav__day page-nav__day_today" href="#">
      <span class="page-nav__day-week">Пн</span><span class="page-nav__day-number">31</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Вт</span><span class="page-nav__day-number">1</span>
    </a>
    <a class="page-nav__day page-nav__day_chosen" href="#">
      <span class="page-nav__day-week">Ср</span><span class="page-nav__day-number">2</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Чт</span><span class="page-nav__day-number">3</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Пт</span><span class="page-nav__day-number">4</span>
    </a>
    <a class="page-nav__day page-nav__day_weekend" href="#">
      <span class="page-nav__day-week">Сб</span><span class="page-nav__day-number">5</span>
    </a>
    <a class="page-nav__day page-nav__day_next" href="#">
    </a>
  </nav>

  <div class="modal_container hidden">
    <div class="popup">
      <div class="popup-content">
        <div class="popup-header">
          <h5 class="popup-title" id="sign-in-title">Вход</h5>
          <h5 class="popup-title" id="sign-up-title">Регистрация</h5>
          <button type="button" class="popup-btn close">&times;</button>
        </div>
        <div class="popup-body">
          {{--Login--}}
          <form  id="sign-in-form">
            <label class="conf-step__label">email</label>
            <input class="conf-step__input" type="email" name="username" placeholder="email" required>
            <label class="conf-step__label">Пароль</label>
            <input  class="conf-step__input" type="password" name="password" placeholder="Пароль" required>
            <div class="error-validation hidden" id="sign-in-error"><ul></ul></div>
            <button class="popup-btn conf-step__button conf-step__button-accent" type="submit" id="sign-in-btn">Авторизоваться</button>
          </form>
          {{--Register--}}
          <form id="sign-up-form">
            <label class="conf-step__label">Имя</label>
            <input class="conf-step__input" type="text" name="name" placeholder="Имя" required>
            <label class="conf-step__label">email</label>
            <input class="conf-step__input" type="email" name="email" placeholder="email" required>
            <label class="conf-step__label">Пароль</label>
            <input  class="conf-step__input" type="password" name="password" placeholder="Пароль" required>
            <label class="conf-step__label">Повторите пароль</label>
            <input  class="conf-step__input" type="password" name="password_confirmation" placeholder="Пароль" required>
            <input  class="conf-step__input" type="hidden" name="grant_type" value="password">
            <div class="error-validation hidden" id="sign-up-error"><ul></ul></div>
            <button class="popup-btn conf-step__button conf-step__button-accent" type="submit" id="sign-up-btn">Зарегистрироваться</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <main>
    <section class="movie">
      <div class="movie__info">
        <div class="movie__poster">
          <img class="movie__poster-image" alt="Звёздные войны постер" src="i/poster1.jpg">
        </div>
        <div class="movie__description">
          <h2 class="movie__title">Звёздные войны XXIII: Атака клонированных клонов</h2>
          <p class="movie__synopsis">Две сотни лет назад малороссийские хутора разоряла шайка нехристей-ляхов во главе с могущественным колдуном.</p>
          <p class="movie__data">
            <span class="movie__data-duration">130 минут</span>
            <span class="movie__data-origin">США</span>
          </p>
        </div>
      </div>  
      
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 1</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">10:20</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:10</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">22:00</a></li>
        </ul>
      </div>
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 2</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">11:15</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">16:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:30</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">21:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">23:30</a></li>     
        </ul>
      </div>      
    </section>
  </main>
</body>
<script src="{{asset('/js/account.js')}}"></script>
</html>