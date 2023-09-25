import axios from 'axios';

const createElement = (template) => {
  const newElement = document.createElement('div');
  newElement.innerHTML = template;

  return newElement.firstElementChild;
};

const debounce = (callback, timeoutDelay = 500) => {
  let timeoutId;

  return (...rest) => {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => callback.apply(this, rest), timeoutDelay);
  };
};

const Template = {
  EDIT_BUTTON: '<button class="action action--edit" type="button">редактировать</button>',
  SAVE_BUTTON: '<button class="action action--save" type="button">сохранить</button>',
  CANCEL_BUTTON: '<button class="action action--cancel" type="button">отмена</button>',
};

class ContentManager {
  #editButtonEl = null;
  #isEditted = false;
  #element = null;
  #textareaEl = null;
  #simditor = null;

  start = () => document.addEventListener('mouseover', this.#documentMouseOverHandler);

  init = () => {
    const contentEl = this.#editButtonEl.parentElement;
    contentEl.scrollIntoView({ block: 'center', behavior: 'smooth' });
    contentEl.removeAttribute('style');
    this.#editButtonEl.remove();
    this.#editButtonEl = null;
    document.addEventListener('mouseover', this.#documentMouseOverHandler);

    if (this.#element) {
      this.destroy();
    }

    this.#element = contentEl;
    this.#textareaEl = document.createElement('textarea');
    this.#textareaEl.value = this.#element.innerHTML;
    this.#element.replaceWith(this.#textareaEl);
    this.#simditor = new Simditor({
      textarea: this.#textareaEl,
      // placeholder: 'Поле объязательно для заполнения',
      toolbar: [
        'title',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'fontScale',
        'color',
        'ol',
        'ul',
        'blockquote',
        'table',
        'link',
        'hr',
        'indent',
        'outdent',
        'alignment',
      ]
    });
    this.#simditor.body[0].classList.add(...this.#element.classList);
    this.#simditor.body[0].setAttribute('style', 'outline: 1px solid #959595');

    const cancelButtonEl = createElement(Template.CANCEL_BUTTON);
    const saveButtonEl = createElement(Template.SAVE_BUTTON);
    saveButtonEl.setAttribute('disabled', 'disabled');
    this.#simditor.body[0].insertAdjacentElement('beforebegin', cancelButtonEl);
    this.#simditor.el[0].append(saveButtonEl);
    this.#simditor.on('valuechanged', () => {
      if (this.#simditor.getValue() === this.#element.innerHTML) {
        saveButtonEl.setAttribute('disabled', 'disabled');
        this.#simditor.body[0].setAttribute('style', 'outline: 1px solid #959595;')
        this.#isEditted = false;
      } else {
        saveButtonEl.removeAttribute('disabled');
        this.#simditor.body[0].setAttribute('style', 'outline: 1px solid #00D72F;')
        this.#isEditted = true;
      }
    });

    cancelButtonEl.addEventListener('click', () => this.destroy());
    saveButtonEl.addEventListener('click', () => {
      // if (this.#simditor.body[0].textContent.length === 0) {
      // this.shake();
      // return;
      // }
      saveButtonEl.textContent = 'Сохранение...';
      // fetch('/admin/update-content', {
      //   headers: {
      //     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      //   },
      //   method: 'post',
      //   body: JSON.stringify({
      //     slug: this.#element.dataset.text,
      //     content: this.#simditor.getValue(),
      //   }),
      // })

      axios.post('/admin/texts/update', {
        slug: this.#element.dataset.text,
        content: this.#simditor.getValue(),
      })
        .then((response) => {
          this.#element.innerHTML = response.data.text;
          this.destroy();
        });
    });
  };

  destroy = () => {
    this.#simditor.el.replaceWith(this.#element);
    this.#simditor.destroy();
    this.#element = null;
    this.#textareaEl = null;
    this.#simditor = null;
    this.#isEditted = false;
  };

  shake = () => {
    this.#simditor.body[0].scrollIntoView({ block: 'center' });
    this.#simditor.el[0].classList.add('shake');
    setTimeout(() => {
      this.#simditor.el[0].classList.remove('shake');
    }, 600);
  };


  #documentMouseOverHandler = (evt) => {
    const contentEl = evt.target.closest('[data-text]');
    if (contentEl) {
      contentEl.setAttribute('style', 'position: relative; outline: 1px solid red;');
      this.#editButtonEl = createElement(Template.EDIT_BUTTON);
      contentEl.append(this.#editButtonEl);

      document.removeEventListener('mouseover', this.#documentMouseOverHandler);
      contentEl.addEventListener('mouseleave', this.#contentElMouseLeaveHandler);
      this.#editButtonEl.addEventListener('click', this.#editButtonElClickHandler);
    }
  }

  #contentElMouseLeaveHandler = (evt) => {
    evt.target.removeAttribute('style');
    this.#editButtonEl.remove();
    this.#editButtonEl = null;

    document.addEventListener('mouseover', this.#documentMouseOverHandler);
    evt.target.removeEventListener('mouseleave', this.#contentElMouseLeaveHandler);
  };

  #editButtonElClickHandler = () => {
    if (this.#isEditted) {
      this.#editButtonEl.parentElement.removeAttribute('style');
      this.#editButtonEl.remove();
      this.#editButtonEl = null;
      document.addEventListener('mouseover', this.#documentMouseOverHandler);

      this.shake();
    } else {
      this.init();
    }
  };
}

new ContentManager().start();
