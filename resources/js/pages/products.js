import axios from 'axios';
import { getDeviceName } from '../modules/device.js';

if (document.querySelector('.products-content')) {
  const productsContainer = document.querySelector('[data-container="products"]');
  const productsQuantity = {
    'mobile': 8,
    'tablet': 12,
    'desktop': 24,
    'fullhd': 36,
  };

  const request = {
    keyword: null,
    tag_id: null,
    prescription_id: null,
    category_id: null,
    page: 1,
    quantity: productsQuantity[getDeviceName()],
  };

  const debounce = (callback, timeoutDelay = 500) => {
    let timeoutId;

    return (...rest) => {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => callback.apply(this, rest), timeoutDelay);
    };
  };

  const filter = () => axios.post('/data/products/filter', request)
    .then(({ data }) => productsContainer.innerHTML = data)
    .catch((error) => console.log(error));

  document.addEventListener('click', (evt) => {
    if (evt.target.closest('.pagination__link') && evt.target.href) {
      evt.preventDefault();
      request.page = evt.target.href.split('page=')[1];
      filter();
    }

    if (evt.target.closest('.filter__prescription-button')) {
      evt.target.parentElement.classList.toggle('shown');
    }

    if (!evt.target.closest('.filter__prescription')) {
      document.querySelector('.filter__prescription')
        .classList.remove('shown');
    }

    if (evt.target.closest('.filter__category-button')) {
      evt.target.parentElement.classList.toggle('shown');
    }

    if (!evt.target.closest('.filter__category')) {
      document.querySelector('.filter__category')
        .classList.remove('shown');
    }

    if (evt.target.classList.contains('filter__prescription-item')) {
      request.prescription_id = evt.target.dataset.prescriptionId;
      request.page = 1;
      evt.target.closest('.filter__prescription').classList.remove('shown');

      if (evt.target.dataset.prescriptionId) {
        document.querySelector('.filter__prescription-button span').textContent = evt.target.textContent;
      } else {
        document.querySelector('.filter__prescription-button span').textContent = 'Рецептурность';
      }
      filter();
    }

    if (evt.target.classList.contains('filter__category-item')) {
      request.category_id = evt.target.dataset.categoryId;
      request.page = 1;
      evt.target.closest('.filter__category').classList.remove('shown');

      if (evt.target.dataset.categoryId) {
        document.querySelector('.filter__category-button span').textContent = evt.target.textContent;
      } else {
        document.querySelector('.filter__category-button span').textContent = 'Направления';
      }
      filter();
    }
  });

  document.querySelector('.filter__form').addEventListener('click', (evt) => {
    if (evt.target.type == 'radio') {
      document.querySelector('.filter__form').classList.add('shown');
      request.tag_id = evt.target.value;
      request.page = 1;
      request.prescription_id = null;
      request.category_id = null;
      document.querySelector('.filter__category-button span').textContent = 'Направления';
      document.querySelector('.filter__prescription-button span').textContent = 'Рецептурность';
      filter();
    }

    if (evt.target.closest('.filter__reset')) {
      document.querySelector('.filter__form').classList.remove('shown');
      request.tag_id = null;
      request.keyword = null;
      filter();
    }
  });

  document.querySelector('.filter__input').addEventListener('input', debounce((evt) => {
    request.keyword = evt.target.value;
    request.tag_id = null;
    request.page = 1;
    request.prescription_id = null;
    request.category_id = null;
    document.querySelector('.filter__category-button span').textContent = 'Направления';
    document.querySelector('.filter__prescription-button span').textContent = 'Рецептурность';
    if (document.querySelector('input[type="radio"]:checked')) {
      document.querySelector('input[type="radio"]:checked').checked = false;
    }

    if (evt.target.value) {
      document.querySelector('.filter__form').classList.add('shown');
    }
    if (!evt.target.value) {
      document.querySelector('.filter__form').classList.remove('shown');
    }

    filter();
  }));

  filter();
}
