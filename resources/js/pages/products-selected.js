import axios from 'axios';
import { getDeviceName } from '../modules/device.js';

if (document.querySelector('.products-selected')) {
  const productsContainer = document.querySelector('[data-container="products"]');
  const productsQuantity = {
    'mobile': 4,
    'tablet': 4,
    'desktop': 4,
    'fullhd': 6,
  };

  if (productsContainer) {
    axios.post('/data/products', { quantity: productsQuantity[getDeviceName()] })
      .then(({ data }) => productsContainer.innerHTML = data);
  }
}
