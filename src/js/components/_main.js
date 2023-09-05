export class Main {
	constructor() {
		//define variables
    this.onOffcanvasOpen();
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
