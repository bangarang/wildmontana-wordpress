import $ from 'jquery'

var isInViewport = function (elem) {
  var bounding = elem.getBoundingClientRect();
  return (
    bounding.top < 400
  );
};

class BlockImageGrid extends window.HTMLDivElement {
  constructor(...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init() {
    this.$ = $(this)

    const BlockImageGridScroll = (event) => {
      if (isInViewport(document.querySelector('div[is=flynt-block-image-grid]'))) {
        $('div[is=flynt-block-image-grid]').addClass('rocked')
        window.removeEventListener('scroll', BlockImageGridScroll)
      }
    }

    window.addEventListener('scroll', BlockImageGridScroll);

  }
}

window.customElements.define('flynt-block-image-grid', BlockImageGrid, {
  extends: 'div'
})
