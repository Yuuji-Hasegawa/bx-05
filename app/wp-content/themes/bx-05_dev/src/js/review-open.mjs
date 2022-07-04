export const reviewOpen = () => {
  let targets = document.querySelectorAll('.c-review-body');
  let target = Array.prototype.slice.call(targets, 0);
  target.forEach((elem) => {
    if (elem.offsetHeight < elem.scrollHeight) {
      elem.style.cursor = 'pointer';
      elem.addEventListener('click', () => {
        if (elem.classList.contains('c-review-body:is-view')) {
          elem.classList.remove('c-review-body:is-view');
        } else {
          elem.classList.add('c-review-body:is-view');
        }
      });
    }
  });
};
