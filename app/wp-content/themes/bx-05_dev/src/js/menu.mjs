export const menu = () => {
  let floatItem = document.querySelector('.c-bottom-float');
  let floatBtn = document.querySelector('.c-btn-float');
  let openBtn = document.querySelector('.c-menu-btn');
  let closeBtn = document.querySelector('.c-close-btn');
  let menu = document.querySelector('#menu');
  if (floatItem != null) {
    window.addEventListener('load', () => {
      if(!sessionStorage.getItem('float_close')) {
        floatItem.classList.add('c-bottom-float--is-view');
      }
    });
    window.addEventListener('resize', () => {
      if(!sessionStorage.getItem('float_close')) {
        floatItem.classList.add('c-bottom-float--is-view');
      }
    });
    window.addEventListener('scroll', () => {
      if(!sessionStorage.getItem('float_close')) {
        floatItem.classList.add('c-bottom-float--is-view');
      }
    });
    floatBtn.addEventListener('click', () => {
      floatItem.classList.remove('c-bottom-float--is-view');
      sessionStorage.setItem('float_close', 'on');
    });
  }
  function open() {
    let nowscroll = document.documentElement.scrollTop || document.body.scrollTop;
    document.body.style.top = -1 * nowscroll + 'px';
    openBtn.setAttribute('aria-expanded', 'true');
    closeBtn.setAttribute('aria-expanded', 'true');
    menu.setAttribute('aria-hidden', 'false');
    menu.classList.add('c-menu:is-open');
    document.body.classList.add('is-fixed');
  }
  function close() {
    var pos = parseInt(document.body.style.top);
    if (pos != '0') {
      pos = pos * -1;
    }
    document.body.style.top = 0;
    menu.setAttribute('aria-hidden', 'true');
    menu.classList.remove('c-menu:is-open');
    openBtn.setAttribute('aria-expanded', 'false');
    closeBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('is-fixed');
    window.scrollTo(0, pos);
  }
  openBtn.addEventListener('click', () => {
    open();
  });
  closeBtn.addEventListener('click', () => {
    close();
  });
};
