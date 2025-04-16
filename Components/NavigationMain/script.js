import $ from 'jquery'

class NavigationMain extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    // console.log($('.secondary-menu-anchor'));
    let lastActive
    $('.secondary-menu-anchor').hover(
      function () {
        lastActive = $(this).data('menu')
        $(this).addClass('active')
        $('.secondary-menu-expanded').addClass('active').addClass(lastActive)
      },
      function () {
        $(this).removeClass('active')
        $('.secondary-menu-expanded').removeClass('active').removeClass(lastActive)
      }
    )
    $('.secondary-menu-expanded').hover(
      function () {
        $(`[data-menu='${lastActive}']`).addClass('active')
        $('.secondary-menu-expanded').addClass('active').addClass(lastActive)
      },
      function () {
        $(`[data-menu='${lastActive}']`).removeClass('active')
        $('.secondary-menu-expanded').removeClass('active').removeClass(lastActive)
      }
    )
  }
}

window.customElements.define('flynt-navigation-main', NavigationMain, {
  extends: 'nav'
})
