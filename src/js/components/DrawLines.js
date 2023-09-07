import gsap from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import { DrawSVGPlugin } from "../vendors/gsap/DrawSVGPlugin";
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(DrawSVGPlugin);

export class DrawLines {

  constructor() {
    this.DOM = {
      lines : document.querySelectorAll('[data-draw-line]')
    }
    this.init();
  }
  init(){
    if(this.DOM.lines.length == 0) return;

    this.DOM.lines.forEach((line) => {

      const path = line.querySelectorAll('path');
      const duration = line.dataset?.duration || 0.8;
      const tl = gsap.from(path, {delay: 0.2, duration: duration,stagger: 0.1, drawSVG: 0});
      gsap.set(line, {autoAlpha:1});

      ScrollTrigger.create({
        trigger: line,
        start: "top 85%",
        // markers: true,
        animation : tl,
      });
    })


  }
}
