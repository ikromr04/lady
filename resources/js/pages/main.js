import axios from 'axios';
import { getDeviceName } from '../modules/device.js';

if (document.querySelector('.main-content')) {
  const productsContainer = document.querySelector('[data-container="products"]');
  const productsQuantity = {
    'mobile': 4,
    'tablet': 6,
    'desktop': 12,
    'fullhd': 18,
  };

  if (productsContainer) {
    axios.post('/data/products', { quantity: productsQuantity[getDeviceName()] })
      .then(({ data }) => productsContainer.innerHTML = data);
  }
}
