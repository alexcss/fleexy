export class Main {
	constructor() {
		//define variables
    this.initBookingLinks();
	}
  removeBooksyWidget(){
    const overlay = document.querySelector('.booksy-widget-overlay');
    if (overlay) overlay.remove();

    const widget = document.querySelector('.booksy-widget-dialog');
    if (widget) widget.remove();
  }
  initBookingLinks(){
    let bookingLinks = [...document.querySelectorAll("a[href*='#offcanvas-booking']")];
    if (bookingLinks.length == 0) return;

    // bookingLinks.forEach(item => item.setAttribute('data-bs-toggle', 'offcanvas'));
    bookingLinks.forEach(item => item.addEventListener('click', () => {
      const booksyBtn = document.querySelector('.booksy-widget-button');
      if (booksyBtn){
        booksyBtn.dispatchEvent(new Event('click'));
      }
    }));

    document.addEventListener('click', e => {
      if (e.target.classList.contains('booksy-widget-overlay')) {
        this.removeBooksyWidget()
      }
    });

    document.addEventListener('keydown', evt => {
      evt = evt || window.event;
      if (evt.keyCode == 27) {
        this.removeBooksyWidget()
      }
    });

  }
}
