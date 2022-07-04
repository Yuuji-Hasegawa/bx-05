export const menu = () => {
  let openBtn = document.querySelector('#openBtn');
  let closeBtn = document.querySelector('#closeBtn');
  let spMenu = document.querySelector('.c-sp-menu');
  let gnav = document.querySelector('.c-head-nav');
  window.addEventListener('load', () => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      gnav.setAttribute('aria-hidden', 'false');
      close();
    } else {
      gnav.setAttribute('aria-hidden', 'true');
    }
  });
  window.addEventListener('resize', () => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      gnav.setAttribute('aria-hidden', 'false');
      close();
    } else {
      gnav.setAttribute('aria-hidden', 'true');
    }
  });
  function open() {
    openBtn.setAttribute('aria-expanded', 'true');
    closeBtn.setAttribute('aria-expanded', 'true');
    spMenu.setAttribute('aria-hidden', 'false');
    spMenu.classList.add('c-sp-menu:is-view');
    document.body.classList.add('is-fixed');
  }
  function close() {
    spMenu.setAttribute('aria-hidden', 'true');
    spMenu.classList.remove('c-sp-menu:is-view');
    openBtn.setAttribute('aria-expanded', 'false');
    closeBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('is-fixed');
  }
  openBtn.addEventListener('click', () => {
    open();
  });
  closeBtn.addEventListener('click', () => {
    close();
  });
};
