import gsap from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);
export class AdvCardShift {

  constructor() {
    this.DOM = {
      row : document.querySelector('[data-adv-row]'),
      items : document.querySelectorAll('[data-adv-item]')
    }
    this.init();
  }
  init(){
    if(this.DOM.items.length == 0) return;

    ScrollTrigger.matchMedia({

      // small
      "(min-width: 1200px)": () => {
        const tl = gsap.timeline({
          defaults: {duration: 1, ease: 'linear'},
          scrollTrigger: {
            trigger: '[data-adv-row]',
            // markers: true,
            start: `top 80%`,
            end: "100% 80%",
            scrub: 1,
          },
        })
        tl.from(this.DOM.items, {
          y: gsap.utils.wrap([200, 50, 130, 80]),
          stagger: 0
        })
      },

    });


  }
}

export class ImageScrollScale {

  constructor() {
    this.DOM = {
      images : document.querySelectorAll('[data-img-scale]')
    }
    this.init();
  }
  init(){
    if(this.DOM.images.length == 0) return;

    this.DOM.images.forEach( img => {
      const tl = gsap.timeline({
        defaults: {duration: 1, ease: 'power1.out'},
        scrollTrigger: {
          trigger: img,
          // markers: true,
          start: `top 80%`,
          end: "100% 50%",
          scrub: 1.5,
        },
      })
      tl.from(img, {
        scale: 1.3,
        transformOrigin : "50% 20%"
      })
    })


  }
}
