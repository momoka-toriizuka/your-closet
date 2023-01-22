class ModalDialog {
    constructor() {
      this.wrap = document.getElementById('modal-dialog');
      this.open = document.getElementById('dialog-open');
      this.dialog = document.querySelector("[role='dialog']");
      this.yes = document.getElementById('dialog-yes');
      this.no = document.getElementById('dialog-no');
      this.close = document.getElementById('dialog-close');
      this.returnSpan = document.getElementById('return-value');
  
      // Polyfillを読み込む関数
      dialogPolyfill.registerDialog(this.dialog);
  
      this.showDialog();
      this.hideDialog();
      this.respondValue();
    }
    showDialog() {
      this.open.addEventListener('click', () => {
        this.dialog.showModal();
        this.dialog.style.visibility = 'visible';
        this.dialog.classList.remove('is-motioned');
        this.dialog.setAttribute('tabindex', '0');
        this.dialog.focus();
      });
    }
    hideDialog() {
      this.yes.addEventListener('click', () => {
        this.hideProcess('はい');
      });
      this.no.addEventListener('click', () => {
        this.hideProcess('いいえ');
      });
      this.close.addEventListener('click', () => {
        this.hideProcess('きみ、閉じるボタンを押したね...');
      });
      this.dialog.addEventListener('cancel', () => {
        this.hideProcess('Escapeボタン押しました？');
      });
      this.dialog.addEventListener('click', (event) => {
        if (event.target === this.dialog) {
          this.hideProcess('きみ、ウィンドウの外を押したね...');
        }
      });
    }
    hideProcess(resText) {
      this.dialog.close(resText);
      this.dialog.classList.add('is-motioned');
      this.wrap.setAttribute('tabindex', '0');
      this.wrap.focus();
      setTimeout(() => {
        this.dialog.style.visibility = 'hidden';
      }, 250);
    }
    respondValue() {
      this.dialog.addEventListener('close', () => {
        this.returnSpan.innerHTML = this.dialog.returnValue;
      });
    }
  }
  
  const modalDialog = new ModalDialog();