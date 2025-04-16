import $ from 'jquery'
import 'core-js/es/number'
import Swiper, { Navigation, A11y, Autoplay } from 'swiper/swiper.esm'
import 'swiper/swiper-bundle.css'

Swiper.use([Navigation, A11y, Autoplay])

class SliderImages extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.props = this.getInitialProps()
    this.resolveElements()
  }

  getInitialProps () {
    let data = {}
    try {
      data = JSON.parse($('script[type="application/json"]', this).text())
    } catch (e) {}
    return data
  }

  resolveElements () {
    this.$slider = $('[data-slider]', this)
    this.$buttonNext = $('[data-slider-button="next"]', this)
    this.$buttonPrev = $('[data-slider-button="prev"]', this)
    this.$activeIndexLabel = $('.active--index', this)
  }

  connectedCallback () {
    this.initSlider()
  }

  initSlider () {
    // const { options } = this.props
    const config = {
      navigation: {
        nextEl: this.$buttonNext.get(0),
        prevEl: this.$buttonPrev.get(0)
      },
      on: {
        activeIndexChange: (e) => {
          this.$activeIndexLabel
            .removeClass()
            .addClass('active--index index--' + this.slider.activeIndex)
        }
      }
    }
    this.slider = new Swiper(this.$slider.get(0), config)

    this.$activeIndexLabel.removeClass().addClass('active--index index--0')
  }
}

window.customElements.define('flynt-testimonial', SliderImages, {
  extends: 'div'
})
