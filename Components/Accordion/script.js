import $ from 'jquery'
import Accordion from 'accordion-js'
import 'accordion-js/dist/accordion.min.css'

class AccordionComponent extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    // eslint-disable-next-line no-new
    // new Accordion('.accordion-container')

    const accordions = Array.from(this.$.find('.accordion-container'))
    const showMultiple = this.$.find('.accordion-container').data(
      'showmultiple'
    )
    // eslint-disable-next-line no-new
    new Accordion(accordions, { duration: 400, showMultiple })
  }
}

window.customElements.define('flynt-accordion', AccordionComponent, {
  extends: 'div'
})
