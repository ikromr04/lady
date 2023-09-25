import axios from 'axios';
const globalSearch = document.querySelector('.global-search');
const debounce = (callback, timeoutDelay = 500) => {
  let timeoutId;

  return (...rest) => {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => callback.apply(this, rest), timeoutDelay);
  };
};

document.querySelector('.main-navigation__toggler')
  .addEventListener('click', () =>
    document.body.classList.toggle('page__body--menu-shown')
  );

globalSearch.addEventListener('click', handleGlobalSearchClick);

function handleGlobalSearchClick() {
  document.body.classList.add('page__body--global-search-opened');
  document.addEventListener('click', handleDocumentClick);
  globalSearch.removeEventListener('click', handleGlobalSearchClick);


}

function handleDocumentClick(evt) {
  if (!evt.target.closest('.global-search')) {
    document.body.classList.remove('page__body--global-search-opened');
    document.removeEventListener('click', handleDocumentClick);
    globalSearch.addEventListener('click', handleGlobalSearchClick);
  }
}

globalSearch.addEventListener('input', debounce((evt) => {
  axios.post('/data/search', { keyword: evt.target.value })
    .then(({ data }) => document.querySelector('#global-search__result').innerHTML = data);
}));

document.querySelector('.global-search__button')
  .addEventListener('click', () => {
    if (document.querySelector('.global-search__results')) {
      document.querySelector('.global-search__results').remove();
    }
  });
