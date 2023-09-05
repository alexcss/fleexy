export class HeaderBar {
	constructor() {
		//define variables
    this.onOffcanvasOpen();
    this.headerColorSwitch();
	}
  headerColorSwitch(){
    const hero = document.querySelector('[data-section-hero]')
    const header = document.querySelector('[data-header]')
    if (!hero) return;

    const options = {
            rootMargin: '0px 0px 0px 0px',
      threshold: [ 0.2 ]
    };
    const trueCallback = function(entries, observer) {
      entries.forEach((entry) => {
        const { isIntersecting } = entry;

        if( isIntersecting ) {
          header.classList.add( 'is-white' );
        } else {
          header.classList.remove( 'is-white' );
        }
      });
    }

    const observer = new IntersectionObserver( trueCallback, options );
    observer.observe( hero );
  }
  onOffcanvasOpen(){
    const offcanvas = document.querySelectorAll('.offcanvas')
    offcanvas.forEach( el => {
      el.addEventListener('hide.bs.offcanvas', function () {
        document.body.classList.remove('offcanvas-open')
      });
      el.addEventListener('show.bs.offcanvas', function () {
        document.body.classList.add('offcanvas-open')
      })
    })
  }
}
