@extends('app')

@section('title', 'Lady healthcare | Контакты')

@section('content')
  <main class="contacts-content content container">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{ route('page.home') }}">
          Главная
        </a>
        <svg class="breadcrumbs__icon" width="24" height="24">
          <use xlink:href="#arrow-right" />
        </svg>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--current">Контакты</a>
      </li>
    </ul>

    <div class="wysiwyg" id="contacts-info" data-text="contacts-info">
      {!! texts()['contacts-info'] !!}
    </div>

    <section class="ae-section">
      <p>Чтобы сообщить о жалобе на продукт/нежелательном явлении, используйте приведенную ниже контактную информацию.</p>
      <dl>
        <dt>Контактный номер:</dt>
        <dd>
          <a href="tel:+77771750099">+77771750099</a>
          <strong>(по вопросам безопасности лекарств)</strong>
        </dd>
        <dt>Контактный E-mail:</dt>
        <dd>
          <a href="mailto:drugsafety@evolet.co.uk">drugsafety@evolet.co.uk</a>
          <strong>(по вопросам безопасности лекарств)</strong>
        </dd>
      </dl>
      <form class="form sample-wrapper sample-wrapper--dark" id="ae-form" action="{{ route('ae') }}" method="post">
        @csrf
        <h2 class="form__title">Форма для отправки жалобы:</h2>
        <input class="form__input" id="inititals" type="text" name="inititals" placeholder="Инициалы пациента" required>
        <input class="form__input" id="age" type="number" name="age" placeholder="Возраст (лет) (необязательный)">
        <input class="form__input" id="weight" type="number" name="weight" placeholder="Вес (кг) (необязательный)">
        <input class="form__input" id="hight" type="number" name="hight" placeholder="Рост (см) (необязательный)">
        <input class="form__input" id="event" type="text" name="event" placeholder="Нежелательная реакция" required>
        <input class="form__input" id="suspect" type="text" name="suspect" placeholder="Лекарственные средства, вызвавшие нежелательную реакцию" required>
        <input class="form__input" id="name" type="text" name="name" placeholder="Имя сообщающего лица" required>
        <input class="form__input" type="email" name="email" id="email" placeholder="Электронная почта сообщающего лица" required>
        <input class="form__input" type="tel" id="phone" name="phone" placeholder="Номер мобильного телефона сообщающего лица " required>
        <button class="form__button" type="submit">Отправить</button>
        </div>
      </form>

      <p>Нажмите, чтобы загрузить <a class="ae-link" href="/ae-form-ru.docx">форму сообщения о нежелательных явлениях</a> для детального отчета.</p>
      <p>После отправки формы онлайн вы получите подтверждение на свой адрес электронной почты. С вами свяжутся лично только в том случае, если потребуется какая-либо дополнительная информация. Если вам нужна помощь в заполнении формы, вы можете позвонить нашему менеджеру для онлайн-поддержки.</p>

      <h3>Конфиденциальность:</h3>
      <p>Вся информация и личные данные, которыми вы делитесь с нами, будут защищены и сохранены в тайне. Предоставленная вами информация может быть передана органам здравоохранения.</p>
      <p>Сообщение здесь не означает признания того, что продукт компании вызвал реакцию или способствовал ей.</p>
    </section>
  </main>
@endsection
